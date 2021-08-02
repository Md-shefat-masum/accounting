<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRoleController extends Controller
{
    public function all_roles()
    {
        $roles = UserRole::where('status', 1)->where('user_id',Auth::user()->id)->get();
        return $roles;
    }

    public function roles()
    {
        $roles = UserRole::where('status', 1)->where('user_id',Auth::user()->id)->paginate(10);
        return $roles;
    }

    public function get_role(UserRole $role)
    {
        return $role;
    }

    public function store(Request $request)
    {
        // return dd($request->all());

        $this->validate($request, [
            'role_name' => ['required'],
            'code' => ['required'],
        ]);

        // return dd($request->all());

        $user_role = UserRole::create($request->all());
        $user_role->user_id = Auth::user()->id;
        $user_role->save();

        return response()->json('success');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'role_name' => ['required'],
            'code' => ['required'],
        ]);

        $user_role = UserRole::find($request->id);

        $user_role->fill($request->all())->save();

        return response()->json('success');
    }

    public function delete(Request $request)
    {
        $user_role = UserRole::find($request->id);
        $user_role->delete();
        return 'success';
    }
}
