<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'name'     => ['required', 'max:255', 'min:4'],
            'username' => ['required', 'max:255', 'min:4' , 'unique:users,username'],
            'email'    => ['required', 'max:255', 'email' , 'unique:users,email'],
            'password' => ['required', 'max:255', 'min:8']
        ]);

       $user =  User::create($attributes);

        // Logging User In After Create His Account
        auth()->login($user);

        // Go Home Page With Flash Message To the Session
        return redirect('/')->with('success' , 'Your Account Was Created Successfully');

    }
}
