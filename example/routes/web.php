<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Yo', // $greeting
        'name' => 'Lary Robot'
    ]);
});

Route::get('/jobs', function () {
    return view(
        'jobs',
        [
            'jobs' => Job::all()
        ]
    );
});

Route::get('/jobs/{id}', function ($id) {
    // Finds the first instance of the boolean being true
    $job = Job::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    // return "Contact Page";
    // return ['foo' => 'bar']; // returns json
    return view('contact');
});
