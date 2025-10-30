<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class LoginController
{
    public function showRegistrationForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'username'=> 'required|string|max:255',
            'email'=> 'required|string|email|max:255',
            'password'=> 'required|string|min:8|confirmed',
        ]);
        User::create([
            'name'=>$request->input('username'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password')  
        ]);
return redirect()->back()->with('success', 'Registered successfully!');


    }
    public function showLoginForm()
    {
        return view('login');
    }
    

    public function login(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // // For demonstration, let's assume any username/password is valid
        // if ($credentials['username'] === 'sajin' && $credentials['password'] === 'sajin123') {
        //     // Authentication passed
        //     return redirect()->intended('/about'); // Redirect to a dashboard or home page
        // }
        if(Auth::attempt(['name' => $credentials['username'], 'password' => $credentials['password']])){
            // Authentication passed
            return redirect()->intended('/dashboard'); // Redirect to a dashboard or home page
        }

        // Authentication failed
        return back()->withErrors([
            'username' => 'The provided credentials do not match.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully!');
    }


}
