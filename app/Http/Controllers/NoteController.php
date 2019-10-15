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
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $note = Note::with('recruiter')->findOrFail($id);

        return view('note.show', [
            'note' => $note
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $recruiters = Recruiter::pluck('name', 'id')->all();

        return view('note.create')->with('recruiters', $recruiters);
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
            'recruiter_id' => 'required|exists:recruiters,id',
            'title' => 'required|max:255',
            'details' => 'max:1000',
            'follow_up' => 'boolean',
        ]);
        $validatedData['follow_up'] = $request->input('follow_up', false);
        $this->updateRecruiter($request);
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
            'recruiter_id' => 'required|exists:recruiters,id',
            'title' => 'required|max:255',
            'details' => 'max:1000',
            'follow_up' => 'boolean',
        ]);
        $validatedData['follow_up'] = $request->input('follow_up', false);
        $note->update($validatedData);
        $this->updateRecruiter($request, $note);

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

    /**
     * @param Request $request
     * @param Note|null $note
     */
    private function updateRecruiter(Request $request, Note $note = null)
    {
        $recruiter = Recruiter::findOrFail($request->recruiter_id);
        $recruiter->latest_note_at = new \DateTime();

        if ($request->follow_up) {
            if (!$note || ($note && !$note->follow_up)) {
                $recruiter->follow_up_count++;
            }
        }
        $recruiter->save();
    }
}
