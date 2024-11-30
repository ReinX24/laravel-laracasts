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
    // Using eager loading for our database, gets records and their employers
    // in a single query rather than multiple queries.
    // This query gets the Job records along with their employers
    $jobs = Job::with('employer')->paginate();
    // This is better than using this, which uses lazy loading and runs more
    // queries on our database.
    // $jobs = Job::all();

    return view(
        'jobs',
        [
            'jobs' => $jobs
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
