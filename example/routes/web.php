<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Yo', // $greeting
        'name' => 'Lary Robot'
    ]);
});

// Index
Route::get('/jobs', [JobController::class, 'index']);

// Show
// Routes with wildcards should be near the bottom
Route::get('/jobs/{job}', [JobController::class, 'show']);

// Create
Route::get('/jobs/create', [JobController::class, 'create']);

// Store
Route::post('/jobs', [JobController::class, 'store']);

// Edit
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

// Update, from the edit view
Route::patch('/jobs/{job}', [JobController::class, 'update']);

// Destroy
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

// TODO: continue @4:21:49

Route::get('/contact', function () {
    // return "Contact Page";
    // return ['foo' => 'bar']; // returns jso
    return view('contact');
});
