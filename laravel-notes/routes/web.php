<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes', [NoteController::class, 'index'])->middleware('auth');

Route::get('/notes/create', [NoteController::class, 'create'])->middleware('auth');
Route::get('/notes/{note}', [NoteController::class, 'show'])->middleware('auth');
Route::post('/notes', [NoteController::class, 'store'])->middleware('auth');
Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->middleware('auth');
Route::patch('/notes/{note}', [NoteController::class, 'update'])->middleware('auth');
Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->middleware('auth');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
