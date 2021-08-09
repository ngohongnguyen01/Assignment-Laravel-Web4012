<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->color = $permission;
        $this->authorizeResource(Permission::class, 'permission');

    }

    public function index()
    {
        $data = Permission::paginate(6);
        return view('backend.Permission.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Permission::where('prarent_id', '=', 0)->get();
        return view('backend.Permission.add', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $data = request()->except('_token');
        if ($request->key_code == null) {
            $data['key_code'] = '';
        }
        Permission::create($data);
        return redirect()->route('permission.index')->with('Thêm thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $data = Permission::where('prarent_id', '=', 0)->get();
        return view('backend.Permission.edit', ['dataPermission' => $permission, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $data = request()->except('_token');
        if ($request->key_code == null) {
            $data['key_code'] = '';
        }
        $permission->update($data);
        return redirect()->route('permission.index')->with('Cập nhập  thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response()->json('Xóa thành công !');
    }
}
