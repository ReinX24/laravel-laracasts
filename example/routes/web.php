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
    // $jobs = Job::with('employer')->get();

    // This is better than using this, which uses lazy loading and runs more
    // queries on our database.
    // $jobs = Job::all();

    // Using pagination
    // $jobs = Job::with('employer')->paginate(3); // 1, 2, 3
    // $jobs = Job::with('employer')->simplePaginate(3); // next, previous
    $jobs = Job::with('employer')->cursorPaginate(3); // most performant

    return view(
        'jobs.index',
        [
            'jobs' => $jobs
        ]
    );
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function () {
    dd('Hello from the post request');
});

// Routes with wildcards should be near the bottom
Route::get('/jobs/{id}', function ($id) {
    // Finds the first instance of the boolean being true
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::get('/contact', function () {
    // return "Contact Page";
    // return ['foo' => 'bar']; // returns json
    return view('contact');
});
