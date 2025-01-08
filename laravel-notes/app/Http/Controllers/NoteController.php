<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        // Get the notes from our database
        $notes = Note::with(['user'])->latest()->simplePaginate(5);

        return view('notes.index', ['notes' => $notes]);
    }

    public function show(Note $note)
    {
        return view('notes.show', ['note' => $note]);
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store()
    {
        request()->validate([
            'title' => ['required'],
            'content' => ['required', 'min:8']
        ]);

        // TODO: create login and store user_id as logged in user
        Note::create([
            'user_id' => 1,
            'title' => request('title'),
            'content' => request('content'),
        ]);

        // Store in database and redirect to notes index
        dd('store note');
        // redirect('/notes');
    }

    public function delete()
    {
        // Delete note and redirect to notes index
        dd('delete note');
        // redirect('/notes');
    }
}
