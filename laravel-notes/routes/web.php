<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes', [NoteController::class, 'index']);
Route::get('/notes/create', [NoteController::class, 'create']);
Route::post('/notes', [NoteController::class, 'store']);
Route::get('/notes/{note}', [NoteController::class, 'show']);

// TODO: implement login, register, and logout
// Route::get('/login', [SessionController::class, 'create']);
// Route::post('/login', [SessionController::class, 'store']);

// Route::get('/register', [RegisteredUserController::class, 'create']);
// Route::get('/register', [RegisteredUserController::class, 'store']);