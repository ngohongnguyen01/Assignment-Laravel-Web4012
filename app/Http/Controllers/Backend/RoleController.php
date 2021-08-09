<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\PermissionRole;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');

    }

    public function index()
    {
        $data = Role::paginate(5);
        return view('backend.Roles.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::where('prarent_id', '=', 0)->get();
        return view('backend.Roles.add', ['permission' => $permission]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $newRole = new Role();
        $data = request()->except('_token');
        $newRole::create($data);
        $getRoleId = Role::all()->last()->id;
        foreach ($request->permission_id as $permission_id) {
            $permission_role = new PermissionRole();
            $permission_role->permissions_id = $permission_id;
            $permission_role->role_id = $getRoleId;
            $permission_role->save();
        }
        return redirect()->route('roles.index')->with('Thêm Role thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        $permission = Permission::where('prarent_id', '=', 0)->get();
        $permissionRole = $role->permissions;
        return view('backend.Roles.edit', ['data' => $role, 'permission' => $permission, 'permissionRole' => $permissionRole]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $data = request()->except('_token');
        $role->update($data);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index')->with('Cập nhập Role thành công !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json('Xóa thành công !');
    }
}
