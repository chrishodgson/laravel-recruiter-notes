<?php

namespace App\Http\Controllers;

use App\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();
        print_r($notes);
die();
//        return view('notes.index', compact('notes'));
    }
}
