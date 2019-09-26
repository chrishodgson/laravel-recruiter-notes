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
//        $latestNoteQuery = Note::select('details', 'updated_at')
//            ->whereColumn('recruiter_id', 'recruiters.id')
//            ->orderBy('updated_at', 'desc')
//            ->limit(1);
//
//        // find latest note for each recruiter
//        $notes = Recruiter::addSelect(['note_details' => $latestNoteQuery])
//            ->orderBy('latest_note_at', 'desc')
//            ->simplePaginate(10);


        // to add ->company()

        $notes = DB::table('notes')
            ->orderBy('updated_at', 'desc')
            ->groupBy('recruiter_id')
//            ->recruiter()
            ->simplePaginate(10);
        //->get();

        return view('notes.index', compact('notes'));
    }
}
