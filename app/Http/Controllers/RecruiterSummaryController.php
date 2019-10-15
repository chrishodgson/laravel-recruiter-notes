<?php

namespace App\Http\Controllers;

use App\Note;
use App\Recruiter;
use Illuminate\Http\Response;

class RecruiterSummaryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $recruiters = Recruiter::addSelect(['latest_note_details' => Note::select('details')
            ->whereColumn('recruiter_id', 'recruiters.id')
            ->orderBy('updated_at', 'desc')
            ->limit(1)
        ])->addSelect(['latest_note_follow_up' => Note::select('follow_up')
            ->whereColumn('recruiter_id', 'recruiters.id')
            ->orderBy('updated_at', 'desc')
            ->limit(1)
        ])->whereNotNull('latest_note_at')->simplePaginate(10);

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
