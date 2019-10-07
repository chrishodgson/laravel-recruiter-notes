<?php

namespace App\Http\Controllers;

use App\Recruiter;
use Illuminate\Http\Response;

class RecruiterSummaryController extends Controller
{
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
