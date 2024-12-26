<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::view("/", "home", [
    "greeting" => "Hello",
    "name" => "Lary Robot"
]);

Route::view("/contact", "contact");

//* Job routes
// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs',  'index');
//     Route::get('/jobs/{job}',  'show');
//     Route::get('/jobs/create',  'create');
//     Route::post('/jobs',  'store');
//     Route::get('/jobs/{job}/edit',  'edit');
//     Route::patch('/jobs/{job}',  'update');
//     Route::delete('/jobs/{job}',  'destroy');
// });

// This registers routes the same as above
Route::resource('jobs', JobController::class);
