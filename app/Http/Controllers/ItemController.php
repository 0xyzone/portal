<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company)
    {
        $companyId = $company->id;
        $this->authorize('viewAny', [Item::class, $companyId]);
        $items = Item::where('company_id', $companyId)->paginate(10, ['*'], 'items');
        return view('inventory.index', compact('companyId', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        $companyId = $company->id;
        return view('inventory.items.create', compact('companyId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request, Company $company)
    {
        $formFileds = $request->validated();
        if ($request->hasFile('image')) {
            $formFileds['image'] = $request->file('image')->store('product/images', 'public');
        }

        Item::create($formFileds);

        return redirect(route('inventory.index', ['company' => $company->id]));
    }

    /**
     * Display the specified resource.
     */
    public function show($company,  Item $inventory)
    {
        $item = $inventory;
        $companyId = $company;
        return view('inventory.items.show', compact('item', 'companyId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company, Item $inventory)
    {
        $item = $inventory;
        $this->authorize('edit', Item::class);
        $companyId = $company->id;
        return view('inventory.items.edit', compact('companyId', 'item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, $company, Item $inventory)
    {
        $formFileds = $request->validated();
        $item = $inventory;
        if ($request->hasFile('image')) {
            $formFileds['image'] = $request->file('image')->store('product/images', 'public');
            if($oldImage = $item->image){
                Storage::disk('public')->delete($oldImage);
            }
        }
        $item->update($formFileds);

        return redirect( route('inventory.index', ['company' => $company]) );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $inventory)
    {
        //
    }
}
