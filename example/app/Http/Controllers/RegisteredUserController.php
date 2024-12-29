<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function index()
    {
        echo "INDEX";
    }

    public function create()
    {
        return view("auth.register");
    }

    public function store()
    {
        // Validate
        // Returns the attributes if they are valid
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'], // password_confirmation
            // confirmed makes sure that password and password_confirmation are the same
        ]);

        // Create the user
        $user = User::create($attributes);

        // Log in 
        Auth::login($user);

        // Redirect somewhere
        return redirect("/jobs");
    }
}
