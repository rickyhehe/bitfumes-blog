<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\admin;
use App\Model\admin\role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $admins = admin::all();
       return view('admin.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = role::all();
      return view('admin.admin.form',compact('roles'));      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        "name" => "required",
        "email" => "required|email|unique:admins",
        "role" => "required"

      ]);
      $admin = new admin();
      $admin->name = $request->name;
      $admin->email = $request->email;
      $admin->password = bcrypt($request->email);
      $admin->status = 1;
      $admin->phone ="000";

      $admin->save();
      $admin->roles()->sync($request->role);
      return redirect()->route("admin.admin.index")->with("messages","new admin has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $roles = role::all();
      $admin = admin::find($id);
      return view('admin.admin.edit',compact('admin','roles'));  
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
      $this->validate($request,[
        "name" => "required",
        "role" => "required",
        "password" => "confirmed"

      ]);
      $admin = admin::find($id);
      $admin->name = $request->name;
      $admin->password = bcrypt($request->password);
      $admin->status = $request->status;
      $admin->phone ="000";
      $admin->roles()->sync($request->role);
      
      $admin->save();
      return redirect()->route('admin.admin.index')->with("messages","admin updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
