<?php

namespace App\Http\Controllers\admin;

use App\Model\admin\permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $permissions = permission::all();
      return view('admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("admin.permission.form");
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
        "name"=>"required",
        'for' => 'required'
      ]);

      $permission = new permission;
      $permission->name = $request->name;
      $permission->for = $request->for;
      $permission->save();
      return redirect()->route('admin.permission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\admin\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\admin\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(permission $permission)
    {
      // $permission = permission::find($id);
      return view("admin.permission.edit",compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\admin\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, permission $permission)
    {
      $this->validate($request,
      [
        'name'=>'required',
        'for' => 'required'
      ]);
      // $permission = permission::find($id);
      $permission->name = $request->name;
      $permission->for = $request->for;
      $permission->save();

      return redirect()->route('admin.permission.index')->with('messages','Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\admin\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(permission $permission)
    {
      // $permission = permission::find($id);
      $permission->delete();
      return redirect()->route('admin.permission.index')->with("messages","Data has been deleted");
    }
}
