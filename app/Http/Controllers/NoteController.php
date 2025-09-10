<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;              

class NoteController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $userName = Auth::user()->name;

            $notes = Note::where('user_id', $userId)->get();

            return view('notes.index', compact('notes', 'userName'));
        }

        return redirect()->route('login')->with('error', 'Please login first.');
    }

    public function createIndex(Request $request) {
       if (Auth::check()) {
            return view('notes.create');
        }

        return redirect()->route('login')->with('error', 'Please login first.');
    }
}
