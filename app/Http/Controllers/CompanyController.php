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
        $user = Auth::user();
        $company_id = $user->company_id;
        $company = Company::find($company_id);
        $staffs = User::where('company_id', $company_id)->paginate(9, ['*'], 'staffs');
        if ($user->company_id == null) {
            return redirect(route('create.company'));
        } else {
            return view('company.index', compact('user', 'company', 'staffs'));
        }
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

    /**
     * Display the specified resource.
     */
    public function show(Company $id)
    {
        $company = $id;
        $staffs = User::where('company_id', $company->id)->paginate(9, ['*'], 'staffs');
        return view('company.show', compact('company', 'staffs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $this->authorize('edit', $company);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyUpdateRequest $request, Company $company): RedirectResponse
    {
        $formFields = $request->validated();
        $company->update($formFields);
        return redirect(route('company.index'))->with('status', 'company-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
