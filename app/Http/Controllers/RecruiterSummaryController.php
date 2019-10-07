<?php

namespace App\Http\Controllers;

use App\Note;
use App\Recruiter;
use Illuminate\Http\Response;

class RecruiterSummaryController extends Controller
{
    /**
     * https://laravel.com/docs/6.x/queries#joins - Sub-Query Joins
     * get recruiter ordered by latest note at and do a Sub-Query Join on the latest note
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index2()
    {
        $latestNoteQuery = Note::select(
            'recruiter_id', 'updated_at', 'details as latest_note_details', 'follow_up as latest_note_follow_up'
        )->orderBy('updated_at', 'desc')->take(1);

        $recruiters = Recruiter::joinSub($latestNoteQuery, 'latest_note', function ($join) {
            $join->on('recruiters.id', '=', 'latest_note.recruiter_id');
        })->orderBy('latest_note_at', 'desc')
          ->simplePaginate(10);

        return view('summary.index', compact('recruiters'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $recruiters = Recruiter::with('latestNote')->simplePaginate(10);

        return view('summary.index', compact('recruiters'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $recruiter = Recruiter::with('notes')->findOrFail($id);

        return view('summary.show', [
            'recruiter' => $recruiter
        ]);

    }
}
