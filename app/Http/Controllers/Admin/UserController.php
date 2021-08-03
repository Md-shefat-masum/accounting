<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function profile_pic_update(Request $request)
    {
        if($request->hasFile('profile_image')){
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $temp_name  = uniqid(10) . time();
            $image = Image::make($file);
            $image->resize(400,400,function($constraint){
                $constraint->aspectRatio();
            });
            $path = 'uploads/users/user_400x400_' . $temp_name . '.' . $extension;
            $image->save($path);

            $user = User::find(Auth::user()->id);
            $user->image = $path;
            $user->save();

            return response()->json('success');
        }

        return 'not sucess';
    }

    public function logo_pic_update(Request $request)
    {
        if($request->hasFile('logo_image')){
            $file = $request->file('logo_image');
            $extension = $file->getClientOriginalExtension();
            $temp_name  = uniqid(10) . time();
            $image = Image::make($file);
            // $image->resize(136,27,function($constraint){
            //     $constraint->aspectRatio();
            // });
            $path = 'uploads/users/logo_136x27_' . $temp_name . '.' . $extension;
            $image->save($path);

            $user = User::find(Auth::user()->id);
            $user->logo = $path;
            $user->save();

            return response()->json('success');
        }

        return 'not sucess';
    }

    public function get_user_info()
    {
        return Auth::user();
    }

    public function email_update(Request $request)
    {
        $this->validate($request,[
            'email' => ['required','email','unique:users'],
        ]);

        User::where('id',Auth::user()->id)->update([
            'email' => $request->email,
        ]);

        return 'success';
    }

    public function password_update(Request $request)
    {
        $this->validate($request,[
            'old_pass' => ['required'],
            'new_pass' => ['required','confirmed'],
        ]);

        if(Hash::check($request->old_pass, Auth::user()->password)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->new_pass);
            $user->save();
        }

        return 'success';
    }

    public function preference_update(Request $request)
    {
        //function_body
        // return dd($request->all());
        $user = User::find(Auth::user()->id);
        $user->date_format = $request->date_format;
        $user->language = $request->language;
        $user->start_week_on = $request->start_week_on;
        $user->export_as = $request->export_as;
        $user->shorter_amount = $request->shorter_amount;
        $user->contact_info_preview = $request->contact_info_preview;
        $user->accountant_mode = $request->accountant_mode;
        $user->save();

        return 'success';
    }
}
