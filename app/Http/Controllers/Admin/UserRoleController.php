<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function roles()
    {
        $roles = UserRole::where('status',1)->paginate(10);
        return $roles;
    }

    public function get_role(UserRole $role)
    {
        return $role;
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'role_name' => ['required'],
            'code' => ['required'],
        ]);

        UserRole::create($request->all());

        return response()->json('success');
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'role_name' => ['required'],
            'code' => ['required'],
        ]);

        $user_role = UserRole::find($request->id);

        $user_role->fill($request->all())->save();

        return response()->json('success');
    }

}
