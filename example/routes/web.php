<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Symfony\Component\VarDumper\Caster\RedisCaster;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Yo', // $greeting
        'name' => 'Lary Robot'
    ]);
});

// Index
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
    $jobs = Job::with('employer')->latest()->cursorPaginate(3); // most performant

    return view(
        'jobs.index',
        [
            'jobs' => $jobs
        ]
    );
});

// Show
// Routes with wildcards should be near the bottom
Route::get('/jobs/{id}', function ($id) {
    // Finds the first instance of the boolean being true
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Store
Route::post('/jobs', function () {
    // Adding validation for our request data
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect("/jobs");
});

// Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

// Update, from the edit view
Route::patch('/jobs/{id}', function ($id) {
    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // authorize (on hold...)

    // find and update the job
    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    // redirect to the job page
    return redirect('/jobs/' . $job->id);
});

// Destroy
Route::delete('/jobs/{id}', function ($id) {
    // authorize (on hold...)

    // delete the job
    Job::findOrFail($id)->delete();

    // redirect
    return redirect("/jobs");
});

Route::get('/contact', function () {
    // return "Contact Page";
    // return ['foo' => 'bar']; // returns json
    return view('contact');
});
