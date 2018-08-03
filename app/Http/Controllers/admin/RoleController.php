<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\role;
use App\Model\admin\permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $roles = role::all();
      return view("admin.role.index",compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = permission::all();
        return view("admin.role.form",compact("permissions"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request->all();
        $this->validate($request,[
          "name"=>"required"
        ]);

        $role = new role;
        $role->name = $request->name;
        $role->save();

        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $permissions = permission::all();
      $role = role::with('permissions')->find($id);
      // return $role;
      return view("admin.role.edit",compact('role','permissions'));
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
        $this->validate($request,
        [
          'name'=>'required'
        ]);
        $role = role::find($id);
        $role->name = $request->name;
        $role->permissions()->sync($request->permission);
        $role->save();
  
        return redirect()->route('admin.role.index')->with('messages','Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $role = role::find($id);
      $role->delete();
      return redirect()->route('admin.role.index')->with("messages","Data has been deleted");
    }
}
