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
        $notes = Note::where('user_id', Auth::user()->id)->latest()->simplePaginate(5);

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

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'content' => ['required', 'min:8']
        ]);

        Note::create([
            'user_id' => Auth::user()->id,
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);

        // Store in database and redirect to notes index
        // dd('store note');
        return redirect('/notes');
    }

    public function edit(Note $note)
    {
        return view('notes.edit', ['note' => $note]);
    }

    public function update(Note $note)
    {
        request()->validate([
            'title' => ['required'],
            'content' => ['required', 'min:8']
        ]);

        $note->update([
            'title' => request('title'),
            'content' => request('content')
        ]);

        return redirect('/notes/' . $note->id);
    }

    public function destroy(Note $note)
    {
        // Delete note and redirect to notes index
        $note->delete();
        return redirect('/notes');
    }
}
