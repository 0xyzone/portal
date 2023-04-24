<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateLogoRequest;
use App\Models\Company;

class LogoController extends Controller
{
    public function update(UpdateLogoRequest $request){
        $company_id = $request->user()->company->id;
        $company = Company::find($company_id);
        $path = $request->file('logo')->store('logos', 'public');

        if($oldAvatar = $company->logo){
            Storage::disk('public')->delete($oldAvatar);
        }

        $company->update(['logo' => $path]);

        return back()->with('status', 'profile-updated');
    }
}
