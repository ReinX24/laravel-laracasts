<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        // Validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Attempt to login
        if (! Auth::attempt($attributes)) {
            // Return an error the the login page
            throw ValidationException::withMessages([
                'email' => 'Sorry, those  credentials do not match.'
            ]);
        }

        // Regenerate the session token when the user logs in 
        request()->session()->regenerate();

        // Redirect
        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout(); // logs out the currently authenticated user

        return redirect("/");
    }
}
