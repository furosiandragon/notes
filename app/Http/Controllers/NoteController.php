<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Auth;

class NoteController extends Controller
{
    /**
     * NoteController constructor
     *  sets the auth middleware
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of note resources
     * 
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::where('user_id', Auth::user()->id)->paginate(5);
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new note resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created note resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string'],
            'body' => ['required', 'string']
        ]);

        $note = new Note();
        $note->title = $request['title'];
        $note->body = $request['body'];
        $note->user_id = Auth::user()->id;

        $note->save();

        return redirect()->route('notes.index')
            ->with('flash_message', "You're note has been added successfully!");
    }

    /**
     * Show the specified note resource.
     *
     * @param int   $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::findOrFail($id);

        return view('notes.show', compact('note'));
    }
    
    /**
     * Show the form for editing the specified note resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::findOrFail($id);
        
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified note resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);

        $this->validate($request, [
            'title' => ['required', 'string'],
            'body' => ['required', 'string']
        ]);

        $note->title = $request['title'];
        $note->body = $request['body'];
        $note->save();

        return redirect()->route('notes.index')
            ->with('flash_message', "You're note has been successfully updated!");
    }

    /**
     * Remove the specified note resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->route('notes.index') ->with(
            'flash_message',
            'Note #' . $id . ' has been remove.!'
        );
    }
}
