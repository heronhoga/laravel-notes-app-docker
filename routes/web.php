<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

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

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
});

// Authenticated routes (only for logged-in users)
Route::middleware('auth')->group(function () {
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');

    // Route::post('/logout', function () {
    //     auth()->logout();
    //     return redirect()->route('welcome');
    // })->name('logout');
});
