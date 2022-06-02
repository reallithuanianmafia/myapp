<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Notifications\CompanyCreatedNotification;
use App\Models\User;
use Notification;
class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // Middleware only applied to these methods
        $this->middleware('isAdmin')->only([
            'create',
            'update',
            'store',
            'destroy',
            'edit'
        ]);
    }

    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index', compact('companies')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->all();

        if($logo = $request->file('logo'))
        {
            $destinationPath = 'storage/logos/';
            $companyLogo = date('YmdHis') . "." .$logo->getClientOriginalExtension();
            $logo->move($destinationPath, $companyLogo);
            $data['logo'] = "$companyLogo";
        }
        Company::create($data);

        $details = [
            'greeting' => 'Hello.',
            'body' => 'You created new company called '.$data['name'],
        ];

        $user = User::all();
        Notification::send($user, new CompanyCreatedNotification($details));

        return redirect(route('company.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show', [
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {

        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');
        if($logo = $request->file('logo'))
        {
            $destinationPath = 'storage/logos/';
            $companyLogo = date('YmdHis') . "." .$logo->getClientOriginalExtension();
            $logo->move($destinationPath, $companyLogo);
            $company->logo = "$companyLogo";
        }
        $company->save();
        return redirect(route('company.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect(route('company.index'));
    }
}
