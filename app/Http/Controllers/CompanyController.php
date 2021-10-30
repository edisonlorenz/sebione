<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use DB;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = Company::paginate(10);
        $data = Company::all();

        if($request->ajax())
            return datatables()->of($data)->make(true);

        return view('company.index',compact('data'));
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
            'create_name' => 'required',
            'create_email' => 'email',
        ]);

        $data = [
            'name' => $request->create_name,
            'email' => $request->create_email,
            'website' => $request->create_website
        ];
        if($request->hasfile('create_logo')){
          $file = $request->file('create_logo');
          $extension = $file->getClientOriginalExtension();
          $logo = date('Y-m-d').".".time().".".$extension;
          Image::make($file)->resize(100, 100)->save( storage_path('/app/public/logo/' . $logo) );
          $data['logo'] = $logo;
        } 
        Company::create($data);
        return back()->with('status', 'Company Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if($request->ajax()) {
            return response (Company::find($request->id));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {  
        $request->validate([
        'name' => 'required',
        'email' => 'email',
        ]);

        
        $data = $request->all();
    
        if($request->hasfile('logo')){
          $file = $request->file('logo');
          $extension = $file->getClientOriginalExtension();
          $logo = date('Y-m-d').".".time().".".$extension;
          Image::make($file)->resize(100, 100)->save( storage_path('/app/public/logo/' . $logo) );
          $data['logo'] = $logo;
        } 
        $company = Company::find($request->id)->update($data);
        
        return back()->with('status', 'Company Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Company::find($id);
        // $data->delete();
        return back()->with('status','Company Deleted Successfully!');
        
    }
}
