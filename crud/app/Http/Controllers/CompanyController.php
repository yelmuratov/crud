<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\User;

class CompanyController extends Controller
{
    public function index()
    {   
        $companies = Company::all();
        return view('Company.index', ['companies' => $companies]);
    }

    public function create()
    {   
        $users = User::all();
        return view('Company.create',['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        Company::create($request->all());

        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully.');
    }

    public function show(Company $company)
    {
        return view('Company.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('Company.edit', compact('company'));
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {       
        $company->update($request->all());

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $companies = Company::where('name', 'like', '%'.$search.'%')->paginate(5);
        return view('Company.index', ['companies' => $companies]);
    }
}
