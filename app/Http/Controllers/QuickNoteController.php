<?php

namespace App\Http\Controllers;

use App\Company;
use App\Note;
use App\Recruiter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuickNoteController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('quicknote.create');
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
            'company_name' => 'required|unique:companies,name',
            'recruiter_name' => 'required|unique:recruiters,name',
            'title' => 'required|max:255',
            'details' => 'max:1000',
            'follow_up' => 'boolean',
        ]);
        $validatedData['follow_up'] = $request->input('follow_up', false);

        $company = Company::create([
            'name' => $validatedData['company_name']
        ]);

        $recruiter = Recruiter::create([
            'name' => $validatedData['recruiter_name'],
            'company_id' => $company['id'],
            'latest_note_at' => new \DateTime(),
            'follow_up_count' => $validatedData['follow_up'] ? 1 : 0
        ]);

        Note::create([
            'title' => $validatedData['title'],
            'details' => $validatedData['details'],
            'recruiter_id' => $recruiter['id'],
            'follow_up' => $validatedData['follow_up']
        ]);

        return redirect(route('notes.index'))
            ->with('success', 'Note is successfully saved');
    }
}
