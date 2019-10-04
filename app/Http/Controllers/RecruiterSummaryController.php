<?php

namespace App\Http\Controllers;

use App\Note;
use App\Recruiter;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RecruiterSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        $requireFollowUp = false; //todo get from form post

        // find latest note per recruiter
        $latestNoteQuery = Note::select(
            'recruiter_id', 'updated_at', 'details as latest_note_details', 'follow_up as latest_note_follow_up'
        )->orderBy('updated_at', 'desc')->take(1);

//        if ($requireFollowUp) {
//            $latestNoteQuery->whereColumn('follow_up', DB::Raw(1)); //why do we need DB::Raw ?
//        }

        // get recruiter ordered by latest note at and do a Sub-Query Join on the latest note
        // https://laravel.com/docs/6.x/queries#joins - Sub-Query Joins
        $recruiterQuery = Recruiter::joinSub($latestNoteQuery, 'latest_note', function ($join) {
            $join->on('recruiters.id', '=', 'latest_note.recruiter_id');
        })->orderBy('latest_note_at', 'desc');

//        if ($requireFollowUp) {
//            $recruiterQuery->whereColumn('follow_up_count', '>', DB::Raw(0));
//        }

        $recruiters = $recruiterQuery->simplePaginate(10);

        return view('summary.index', compact('recruiters'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Recruiter  $recruiter
     * @return Response
     */
    public function show(Recruiter $recruiter)
    {
        $notes = $recruiter->notes()->get();

        return view('summary.show', [
            'recruiter' => $recruiter
        ])->with('notes', compact('notes'));
    }
}
