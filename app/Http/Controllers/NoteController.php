<?php

namespace App\Http\Controllers;

use App\Note;
use App\Recruiter;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // find latest note per recruiter
        $latestNoteQuery = Note::select('details', 'follow_up', 'recruiter_id', 'updated_at as note_updated_at')
            ->orderBy('updated_at', 'desc')
            ->limit(1);

        // get recruiters ordered by latest note at and do a Sub-Query Join on the latest note
        // https://laravel.com/docs/6.x/queries#joins - Sub-Query Joins
        $notes = Recruiter::joinSub($latestNoteQuery, 'latest_note', function ($join) {
                $join->on('recruiters.id', '=', 'latest_note.recruiter_id');
            })
            ->orderBy('latest_note_at', 'desc')
            ->simplePaginate(10);

        return view('notes.index', compact('notes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function old()
    {
        $requireFollowUp = false;

        // find latest note per recruiter
        $latestNoteQuery = Note::select('details')
            ->whereColumn('recruiter_id', 'recruiters.id')
            ->orderBy('updated_at', 'desc')
            ->limit(1);

        if ($requireFollowUp) {
            $latestNoteQuery->whereColumn('follow_up', DB::Raw(1)); //why do we need DB::Raw ?
        }

        // get recruiters ordered by latest note at
        $recruiterQuery = Recruiter::addSelect(['note_details' => $latestNoteQuery])
            ->orderBy('latest_note_at', 'desc');

        if ($requireFollowUp) {
            $recruiterQuery->whereColumn('follow_up_count', '>', DB::Raw(0));
        }

        $notes = $recruiterQuery->simplePaginate(10);

        return view('notes.index', compact('notes'));
    }
}
