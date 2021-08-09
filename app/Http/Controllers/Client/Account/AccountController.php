<?php

namespace App\Http\Controllers\Client\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest\AddAccountRequest;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use DateTime;
class AccountController extends Controller
{
    protected $user;
    protected $roleUser;

    public function __construct(User $user, RoleUser $roleUser)
    {
        $this->user = $user;
        $this->roleUser = $roleUser;

    }

    public function formDangKy()
    {
        return view('Login.signup');
    }

    public function Postsingup(AddAccountRequest $request)
    {
        $data = request()->except('_token');
        $image = $request->image;
        $path = "";
        if ($image != "") {
            $path = 'image-users/' . time() . '-' . $image->getClientOriginalName();
            $file_name = time() . '-' . $image->getClientOriginalName();
            $url_image = public_path('/image-users');
            $image->move($url_image, $file_name);
        }
        $data['date_add'] = new DateTime();
        $data['password'] = bcrypt($request->password);
        $data['image'] = $path;
        $data['status'] = config('common.users.status.Active');
        $saveUser = $this->user::create($data);
        $saveRoleUser = $this->roleUser::create([
            'user_id' => $saveUser->id,
            'role_id' => 2
        ]);

        return redirect()->route('login')->with('msg','Bạn đã tạo tài khoản thành công');
    }
}
