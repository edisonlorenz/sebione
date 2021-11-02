<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $data =   DB::table('employees')
                    ->join('companies', 'employees.company_id', '=', 'companies.id')
                    ->select('companies.id as  company_id',
                            'companies.name',
                            'employees.id as user_id',
                            'employees.first_name',
                            'employees.last_name',
                            'employees.email',
                            'employees.phone')->get();
                            // dd($data);
        if($request->ajax()){
            return datatables()->of($data)->make(true);
        }
             
        $companies = Company::select('id','name')->get();             
        return view('employee.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'create_companyname' => 'required',
            'create_firstname' => 'required',
            'create_lastname' => 'required',
            'create_email' => 'email',
        ]);
        $data = [
            'first_name' => $request->create_firstname,
            'last_name' =>$request->create_lastname,
            'email' => $request->create_email,
            'phone' => $request->create_phone,
            'company_id' =>$request->create_companyname
        ];

        Employee::create($data);
        return back()->with('status', 'Employee Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request){
    $data =   DB::table('employees')
    ->join('companies', 'employees.company_id', '=', 'companies.id')
    ->select('companies.id as  company_id',
            'companies.name',
            'employees.id as user_id',
            'employees.first_name',
            'employees.last_name',
            'employees.email',
            'employees.phone')->get();
        if($request->ajax()) {
            return response (Employee::find($request->id));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'edit_firstname' => 'required',
            'edit_lastname' => 'required',
            'edit_email' => 'email'
            ]);
            $data = [
                'first_name' => $request->edit_firstname,
                'last_name' =>$request->edit_lastname,
                'email' => $request->edit_email,
                'phone' => $request->edit_phone,
                'company_id' =>$request->edit_companyname,
            ];
            $data = Employee::find($request->edit_employeeId)->update($data);
  
            return back()->with('status','Employee Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employee::find($id);
        $data->delete();

        return back()->with('status','Employee Deleted Successfully!');
    }
}
