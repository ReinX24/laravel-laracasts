<?php

namespace App\Http\Controllers;

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
        dd(request()->all()); // shows all post data
    }
}
