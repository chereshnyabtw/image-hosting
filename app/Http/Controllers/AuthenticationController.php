<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $validateFields = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'email' => 'required|unique:users'
        ]);

        $validateFields['password'] = Hash::make($validateFields['password']);

        $user = User::create($validateFields);
        if($user)
        {
            Auth::login($user);
            return redirect(route('home'));
        }

        return redirect(route('register'))->withErrors(['User saving error!']);
    }

    public function login(Request $request)
    {
        $formFields = $request->only(['username', 'password']);

        if(Auth::attempt($formFields))
        {
            return redirect(route('home'));
        }

        return redirect(route('login'))->withErrors(['Invalid username or password']);
    }
}
