<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            $this->image_save_to_db($path);

            return response()->json('success');
        }

        return 'not sucess';
    }
}
