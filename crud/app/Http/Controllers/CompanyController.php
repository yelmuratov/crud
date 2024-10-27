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
                $imageName = date('Y-m-d')."_".time().'.'.$request->logo->extension();
                $request->logo->move(public_path('images'), $imageName);

                Company::create($request->all());

                return redirect()->route('companies.index')
                    ->with('success', 'Company created successfully.');
            }else{
                return redirect()->route('companies.index')
                    ->with('error', 'Company logo is required.');
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
        $users = User::all();
        return view('Company.edit', compact('company'),['users' => $users]);
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {       
        try{
            $company->update($request->all());

            return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully');
        }catch(\Exception $e){
            dd($e);
        }
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
