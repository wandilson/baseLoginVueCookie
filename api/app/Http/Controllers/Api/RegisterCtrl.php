<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class RegisterCtrl extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'  =>  ['required'],
            'email' =>  ['required', 'email', 'unique:users'],
            'password'  =>  ['required', 'min:8', 'confirmed']
        ]);

        User::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'password'  =>  Hash::make($request->password)
        ]);
    }
}
