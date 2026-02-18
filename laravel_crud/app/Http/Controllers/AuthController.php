<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //show register page
    public function showRegister()
    {
        return view('auth.register');
    }

    //handle register
    public function register(Request $request)
    {
        $request -> validate([
            'name'=>'required|string|min:2|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success','User Register successfully!');
    }

    //show login page
    public function showLogin()
    {
        return view('auth.login');
    }

    //login functionality
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password'=>'required',
        ]);

        if(Auth::attempt($credentials))
            {
                $request->session()->regenerate();
                return redirect()->route('students.index');
            }
         return back()->withErrors([
            'email'=>'invalid credentials',
         ])->onlyInput('email');
    }

    //logout function
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
