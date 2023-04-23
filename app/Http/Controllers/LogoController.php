<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateLogoRequest;

class LogoController extends Controller
{
    public function update(UpdateLogoRequest $request){

        dd($request->company());
        $path = $request->file('avatar')->store('logos', 'public');

        if($oldAvatar = $request->company()->avatar){
            Storage::disk('public')->delete($oldAvatar);
        }

        auth()->user()->update(['avatar' => $path]);

        return back()->with('status', 'profile-updated');
    }
}
