<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class LoginCtrl extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'     =>  ['required'],
            'password'     =>  ['required']
        ]);

        if(Auth::attempt($request->only('email', 'password')))
        {
            return response()->json(Auth::user(), 200);
        }

        throw ValidationException::withMessages([
            'email'     =>  ['Credeciais incorretas']
        ]);
    }


    public function logout()
    {
        Auth::logout();
    }
}
