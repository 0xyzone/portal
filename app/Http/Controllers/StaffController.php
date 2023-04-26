<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StaffStoreRequest;
use App\Http\Requests\StaffUpdateRequest;

class StaffController extends Controller
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
    public function create()
    {
        $user = Auth::user();
        return view('company.staff.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffStoreRequest $request)
    {
        $formFields = $request->validated();

        $formFields['password'] = Hash::make($request->password);

        $staff = User::create($formFields);

        return redirect(route('company'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $staff)
    {
        $user = $staff;
        return view('company.staff.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $staff)
    {
        $company = $staff->company_id;
        $user = $staff;
        $this->authorize('updateStaff', [User::class, $company]);
        return view('company.staff.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaffUpdateRequest $request, User $staff)
    {
        $formFields = $request->validated();
        $staff->update($formFields);

        return back()->with('status', 'staff-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
