<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequset\AddUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');

    }

    public function index()
    {
        $data = User::paginate(3);
        return view('backend.User.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('Backend.User.add', ['role' => $role]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        $data = request()->except('_token', 'role');
        $data['date_add'] = new DateTime();
        $data['password'] = bcrypt($request->password2);
        $data['email_verified_at'] = $request->email_verified_at;
        $saveUser = User::create($data);
        foreach ($request->role as $role_id) {
            RoleUser::create([
                'user_id' => $saveUser->id,
                'role_id' => $role_id
            ]);
        }
        return redirect()->route('user.index')->with('Thêm thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = Role::all();
        $roleOffUser = $user->roles;
        return view('backend.User.edit', ['role' => $role, 'user' => $user, 'roleOfUser' => $roleOffUser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            DB::beginTransaction();
            $data = request()->except('_token', 'role');
            if ($request->password != '') {
                $data['password'] = bcrypt($request->password);
            }
            $data['password'] = $user->password;
            $user->update($data);
            $user->roles()->sync($request->role);
            DB::commit();
            return redirect()->route('user.index')->with('Cập nhập  thành công !');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . '_____Line' . $exception->getLine());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json('Bạn đã xóa thành công !');
    }

}
