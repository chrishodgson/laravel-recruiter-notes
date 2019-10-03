<?php

namespace App\Http\Controllers;

use App\Note;
use App\Recruiter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $notes = Note::with('recruiter')->simplePaginate(10);

        return view('note.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $recruiters = Recruiter::pluck('name', 'id')->all();

        return view('note.edit', compact('recruiter'))
            ->with('recruiters', $recruiters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'details' => 'required',
        ]);
        Note::create($validatedData);

        return redirect(route('notes.index'))
            ->with('success', 'Note is successfully saved');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Note $note
     * @return Response
     */
    public function edit(Note $note)
    {
        $recruiters = Recruiter::pluck('name', 'id')->all();

        return view('note.edit', compact('note'))
            ->with('recruiters', $recruiters);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Note $note
     * @return Response
     */
    public function update(Request $request, Note $note)
    {
        $validatedData = $request->validate([
            'details' => 'required',
        ]);
        $note->update($validatedData);

        return redirect(route('notes.index'))
            ->with('success', 'Note is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Note $note
     * @return Response
     * @throws \Exception
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect(route('notes.index'))
            ->with('success', 'Note is successfully deleted');
    }
}
