<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view("/", "home", [
    "greeting" => "Hello",
    "name" => "Lary Robot"
]);

Route::view("/contact", "contact");

// This registers all the routes using the JobController class
Route::resource('jobs', JobController::class);

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);

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
