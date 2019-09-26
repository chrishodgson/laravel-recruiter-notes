<?php

namespace App\Http\Controllers;

use App\Note;
use App\Recruiter;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $notes = Notes::all();

        $notes = Recruiter::addSelect(['note_details' => Note::select('details')
            ->whereColumn('recruiter_id', 'recruiters.id')
            //->orderBy('arrived_at', 'desc')
            ->limit(1)
        ])->get();

//        print('<pre>'); print_r($notes); print('</pre>');

        return view('notes.index', compact('notes'));
    }
}
