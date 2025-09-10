<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Auth as Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Guest routes (only for not-logged-in users)
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    // login process
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');



    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
    // register process
    Route::post('/register', action: [AuthController::class, 'register'])->name('register.process');
});

// Authenticated routes (only for logged-in users)
Route::middleware('auth')->group(function () {
    //notes
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    //create
    Route::get('/notes/create', [NoteController::class, 'createIndex'])->name('notes.createIndex');
    Route::post('/notes/create', [NoteController::class, 'createNote'])->name('notes.create');
    //edit
    Route::get('notes/edit/{id}', [NoteController::class, 'editIndex'])->name('notes.editIndex');
    Route::put('/notes/edit/{id}', [NoteController::class, 'editNote'])->name('notes.edit');
    //delete
    Route::post('/notes/delete/{id}', [NoteController::class, 'deleteNote'])->name('notes.delete');

    //auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
