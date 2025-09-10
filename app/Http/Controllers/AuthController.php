<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request) {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        
        // dd($request->all());


        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('notes.index');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

    // Attempt to log in
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('notes.index');
    }

    // Login fails
    return back()->withErrors([
        'email' => 'Invalid email or password.',
    ])->onlyInput('email');
    }

    public function logout() {
            Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}
