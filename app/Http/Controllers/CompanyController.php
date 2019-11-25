<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->simplePaginate(10);

        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('company.create');
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
            'name' => 'required|max:255|unique:companies,name',
            'details' => 'max:255',
        ]);
        Company::create($validatedData);

        return redirect(route('companies.index'))
            ->with('success', 'Company is successfully saved');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Company $company
     * @return Response
     */
    public function update(Request $request, Company $company)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:companies,name,' . $company->id,
            'details' => 'max:255',

        ]);
        $company->update($validatedData);

        return redirect(route('companies.index'))
            ->with('success', 'Company is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return Response
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect(route('companies.index'))
            ->with('success', 'Company is successfully deleted');
    }
}
