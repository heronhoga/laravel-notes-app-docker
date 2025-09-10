<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use SweetAlert2\Laravel\Swal;              

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

    public function createNote(Request $request)
    {
        // Validate request
        $newNoteData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Add user_id to the data array
        $newNoteData['user_id'] = Auth::id();

        // Save the note
        Note::create($newNoteData);
        
        Swal::fire([
            'title' => 'New note added!',
            'text' => 'New note successfully stored',
            'icon' => 'success',
            'confirmButtonText' => 'Close'
            ]);

        // Redirect back with success message
        return redirect()->route('notes.index')->with('success', 'Note created successfully!');
    }

    public function editIndex($id) {
        $note = Note::findOrFail($id);

        return view('notes.edit', compact('note'));
    }

    public function editNote(Request $request, $id) {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        
        $note = Note::findOrFail($id);

        $note->update([
            'title'       => $request->title,
            'description' => $request->description,
        ]);

        Swal::fire([
            'title' => 'Note updated!',
            'text' => 'Your note successfully updated',
            'icon' => 'success',
            'confirmButtonText' => 'Close'
        ]);

        return redirect()->route('notes.editIndex', $id);
    }
}
