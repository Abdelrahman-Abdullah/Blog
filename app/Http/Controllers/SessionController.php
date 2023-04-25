<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store()
    {
        // Validate The Request
        $attributes = request()->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Trying to log in with this information after the validation
        if (auth()->attempt($attributes)){
            // Logged in successfully so redirect it to home page with flash message
            // Regenerate The session because of the [ session fixation Attack ]
            session()->regenerate();
            return redirect('/')->with('success' , 'Welcome Again <3');
        }

        // if the validation failed so go back with the errors and old data entered
        return back()->withErrors(['email' => 'Wrong Information Please Try Again'])->withInput();

        //Another Way To back with Errors and old data entered
        // return throw ValidationException::withMessages(['email' => 'Wrong Information Please Try Again']);

    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success' , 'GoodBye!');
    }
}
