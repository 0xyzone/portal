<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StaffStoreRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //View create form for Company
        if ($request->user()->company_id == null) {
            return view('company.create', [
                'user' => $request->user(),
            ]);
        } else {
            return Redirect::route('company');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyCreateRequest $request)
    {
        $test = ($request->validated());
        // dd($test);
        Company::create($test);
        $company = Company::where('user_id', $request->user_id)->first();
        $user['company_id'] = $company->id;
        $user['role'] = 1;
        $admin = User::find($request->user_id);
        $admin->update($user);
        return Redirect::route('company')->with('status', 'company-updated');
    }

    public function store_staff(StaffStoreRequest $request)
    {
        $formFields = $request->validated();

        $formFields['password'] = Hash::make($request->password);

        $staff = User::create($formFields);

        return redirect(route('company'));
    }


    public function create_staff()
    {
        $user = Auth::user();
        return view('company.staff.create', compact('user'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $id)
    {   
        $company = $id;
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $id)
    {
        $this->authorize('edit', $id);
        $company = $id;
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyUpdateRequest $request, Company $id): RedirectResponse
    {
        $formFields = $request->validated();
        $id->update($formFields);   
        return redirect(route('company'))->with('status', 'company-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
