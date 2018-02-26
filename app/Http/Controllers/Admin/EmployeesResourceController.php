<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Employee;

class EmployeesResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $employees = Employee::paginate(10);
        // dd($employees->companie);
         //dd(Employee::find(3)->company);
        // $comapnie = Companies::find()->comments()->where('title', 'foo')->first();
        return view('Employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies_list = Company::all();
        //dd($companies_list);

        return view('Employees.create', ['companies_list' => $companies_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $employee = new Employee;

        $employee->name = $request->name;
        $employee->lastname = $request->lastname;
        $employee->companies_id = $request->company;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        $employee->save();


        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Employee::find($id)){
            abort(404);
        }

        $company_id = Employee::find($id)->companies_id;

        $name = Employee::find($id)->name;
        $lastname = Employee::find($id)->lastname;
        $company = Company::find($company_id)->name;
        $email = Employee::find($id)->email;
        $phone = Employee::find($id)->phone;
        

        return view('Employees.show', ['name' => $name, 'lastname' => $lastname, 'company' => $company, 'email' => $email, 'phone' => $phone]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Employee::find($id)){
            abort(404);
        }


        $company_id = Employee::find($id)->companies_id;
        $companies_list = Company::all();

        $name = Employee::find($id)->name;
        $lastname = Employee::find($id)->lastname;
        $email = Employee::find($id)->email;
        $phone = Employee::find($id)->phone;
        

        return view('Employees.edit', ['name' => $name, 'lastname' => $lastname, 'company_selected' => $company_id, 'email' => $email, 'phone' => $phone, 'id' => $id, 'companies_list' => $companies_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Employee::where('id', $id)
          ->update(['name' => $request->name, 'lastname' => $request->lastname, 'companies_id' => $request->company, 'email' => $request->email, 'phone' => $request->phone]);

        return back()->with('status', 'Profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);

        return redirect()->route('employees.index');
    }
}
