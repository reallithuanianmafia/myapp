<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Company;

class EmployeesController extends Controller
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
        $employees = Employee::paginate(10);
        return view('employee.index', [
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all('id', 'name');
        return view('employee.create', [
            'companies' => $companies
        ]);
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company_id' => 'required',
        ]);
        $data = $request->all();
        
        // Checking if company id exists
        $compid = Company::where('id', $data['company_id'])->first();
        if($compid) 
        { 
            Employee::create($data);
            return redirect(route('employee.index'));
        }
        return redirect(route('employee.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employee.show', [
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all('id','name');
        return view('employee.edit', [
            'employee' => $employee,
            'companies' => $companies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company_id' => 'required',
        ]);

        $compid = Company::where('id', $request->company_id)->first();
        if(!$compid) 
        { 
            return 'does not exist';
        }

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->company_id = $request->input('company_id');
        $employee->save();
        return redirect(route('employee.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee = Employee::find($employee);
        if($employee)
        {
            $destroy = Employee::destroy($employee);
            return redirect(route('employee.index'));
        }
            return 'something went wrong';
        //$employee = Employee::find($employee);
        //print_r($employee);
        //if($user){
        //    $destroy = User::destroy(2);
        //}
        //Employee::destroy($employee);
    }
}
