<?php

namespace App\Http\Controllers;

use App\Company;
use App\Recruiter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecruiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $recruiters = Recruiter::simplePaginate(10);

        return view('recruiter.index', compact('recruiters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $companies = Company::pluck('name', 'id')->all();

        return view('recruiter.create')->with('companies', $companies);
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
            'name' => 'required|max:255|unique:recruiters,name',
            'company_id' => 'required|exists:companies,id',
        ]);
        Recruiter::create($validatedData);

        return redirect(route('recruiters.index'))
            ->with('success', 'Recruiter is successfully saved');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Recruiter $recruiter
     * @return Response
     */
    public function edit(Recruiter $recruiter)
    {
        $companies = Company::pluck('name', 'id')->all();

        return view('recruiter.edit', compact('recruiter'))
            ->with('companies', $companies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Recruiter $recruiter
     * @return Response
     */
    public function update(Request $request, Recruiter $recruiter)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:recruiters,name,' . $recruiter->id,

        ]);
        $recruiter->update($validatedData);

        return redirect(route('recruiters.index'))
            ->with('success', 'Recruiter is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Recruiter $recruiter
     * @return Response
     * @throws \Exception
     */
    public function destroy(Recruiter $recruiter)
    {
        $recruiter->delete();

        return redirect(route('recruiters.index'))
            ->with('success', 'Recruiter is successfully deleted');
    }
}
