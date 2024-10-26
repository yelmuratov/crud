<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyUpdateRequest;
use App\Http\Requests\CompanyStoreRequest;
use App\Models\User;

class CompanyController extends Controller
{
    public function index()
    {   
        $companies = Company::paginate(10);
        return view('Company.index', ['companies' => $companies]);
    }

    public function create()
    {   
        $users = User::all();
        return view('Company.create',['users' => $users]);
    }

    public function store(CompanyStoreRequest $request)
    {
        try{
            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $fileName = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);
                $request->merge(['logo' => $fileName]);
                
                Company::create($request->all());
                return redirect()->route('companies.index')
                    ->with('success', 'Company created successfully.');
            }
        }catch(\Exception $e){
            dd($e);
        }
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
