<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Designations;
use App\Classes\PublicConstants;
use File;
use Illuminate\Http\Request;
use App\Mail\InfoMail;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Designations=Designations::all();
        $Employee=Employee::orderBy('id', 'desc')->get();
        return view('Employee.index',compact('Employee','Designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Designations=Designations::all();
        return view('Employee.create',compact('Designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate(
            [
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            'designation_id'=>'required',
            ]
        );
     
            $p=strlen($request->email);
            $a=strrev($request->name);
            $s=$request->designation_id;
          
            $date=strtotime(date('y-m-d h:i:m'));
            
            $w=substr($date, -3);
           
            $request['password']=$p.$a.$s."pWd".$w;
        $Employee=Employee::create($request->all());

        if($request->hasFile('photo')) 
        {
            $Image=$request->file('photo');
            $FileExtesion=$Image->getClientOriginalExtension();
            $imageFileName=$Employee->name.$Employee->id.".".$FileExtesion;
            $Image->move(PublicConstants::DIRECTORY_EMPLOYEE_PHOTO,$imageFileName);
            $Employee->update(["photo"=>$imageFileName]);  
        }

        $details=[
                'title'=> $Employee->name,
                'body'=> 'Your account has been created. and your password is '." ".$Employee->password,
        ];
        Mail::to($Employee->email)->send(new InfoMail($details));
        return redirect(route('Employee.index'))->with('success','Succesfully added new employee and Successfully sent password to his/her email');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $Employee)
    {
        return view('Employee.show',compact('Employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $Employee)
    {
        $Designations=Designations::all();
        return view('Employee.edit',compact('Employee','Designations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $Employee)
    {
        $request->validate(
            [
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,'.$Employee->id,
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            'designation_id'=>'required',
            ]
        );
        if($request->hasFile('photo')) 
        {
            File::delete(PublicConstants::DIRECTORY_EMPLOYEE_PHOTO."/".$Employee->photo);
        }
        $Employee->update($request->all());
        if($request->hasFile('photo')) 
        {
            $Image=$request->file('photo');
            $FileExtesion=$Image->getClientOriginalExtension();
            $imageFileName=$Employee->name.$Employee->id.".".$FileExtesion;
            $Image->move(PublicConstants::DIRECTORY_EMPLOYEE_PHOTO,$imageFileName);
            $Employee->update(["photo"=>$imageFileName]);  
        }
        
        return redirect(route('Employee.index'))->with('success','Succesfully Updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $Employee)
    {
        if($Employee->photo) 
        {
            File::delete(PublicConstants::DIRECTORY_EMPLOYEE_PHOTO."/".$Employee->photo);
        }
        $Employee->delete();
        return redirect(route('Employee.index'))->with('success','Deleted Successfully');;
        
    }
    public function search(Request $request)
    {
        $search=$request->search;
        $Employee=Employee::where('name','like', '%'.$search.'%')->orWhere('email','like', '%'.$search.'%')->orderBy('id', 'desc')->get();
        return view('Employee.search',compact('Employee'));
    }


    public function designation(Request $request)
    {
        $designation=$request->designation;
        if($designation >0)
        {
            $Employee=Employee::where('designation_id',$designation)->orderBy('id', 'desc')->get();
            
        }
        else{
            $Employee=Employee::all();
        }
        return view('Employee.search',compact('Employee'));
    }
}
