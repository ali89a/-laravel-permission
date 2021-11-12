<?php

namespace App\Http\Controllers\AccessControl;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    protected function path(string $suffix)
    {
        return "admin.access_control.role.{$suffix}";
    }

    public function index()
    {
        $data = [
            'roles' => Role::all(),

        ];
        return view($this->path('index'), $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'model' => new Role,
            'all_permissions' => Permission::all(),
            'permission_groups' =>  User::getpermissionGroups(),
        ];
        return view($this->path('create'), $data);
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
            'name' => 'required|unique:roles'
        ]);

        $role = Role::create($request->all());
        $role->syncPermissions($request->input('permission'));

        Toastr::success('Role Information crated Successfully!.', '', ["progressbar" => true]);
        return back();
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
        $data = [
           
            'role' => Role::find($id),
            'all_permissions' => Permission::all(),
            'permission_groups' => User::getpermissionGroups(),
           

        ];
        return view($this->path('edit'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id
        ]);

        $permissions = $request->input('permissions');
        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }

        Toastr::success('Role Information Update Successfully!.', '', ["progressbar" => true]);
        return redirect()->route('user.roles.index');
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
