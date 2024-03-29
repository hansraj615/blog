<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::all();
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions=Permission::all();
        return view('admin.role.create',compact('permissions'));
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
            'rolename'=>'required|min:4|max:15',
            'displayname'=>'required',
            'permission'=>'required',
            'description'=>'required|max:255',
             ]);

        $role= new Role();
        $role->name=$request->rolename;
        $role->display_name=$request->displayname;
        $role->description=$request->description;     
        $role->save();
        foreach($request->permission as $key=>$value)
        {
            $role->attachPermission($value);
        }
        Toastr::success('Role Added Successfully :)' ,'Success');
        return redirect()->route('role.index');

        

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
        $role=Role::findOrFail($id);
        $permissions=Permission::all();
        $role_permissions = $role->perms()->pluck('id','id')->toArray();
        return view('admin.role.edit',compact('role','role_permissions','permissions'));
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
            'rolename'=>'required|min:4|max:15',
            'displayname'=>'required',
            'permission'=>'required',
            'description'=>'required|max:255',
             ]);

        $role=Role::find($id);
        $role->name=$request->rolename;
        $role->display_name=$request->displayname;
        $role->description=$request->description;     
        $role->save();

        DB::table('permission_role')->where('role_id',$id)->delete();
        foreach($request->permission as $key=>$value)
        {
            $role->attachPermission($value);
        }
        Toastr::success('Role Updated Successfully :)' ,'Success');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=Role::find($id);
        $role->delete();
        DB::table('permission_role')->where('role_id',$id)->delete();
        Toastr::Warning('Role Successfully Deleted :)','Success');
        return redirect()->route('role.index');
    }
}
