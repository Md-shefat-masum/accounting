<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contacts;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    public function get(Request $request, $id)
    {
        if(Contacts::where('id',$id)->exists()){
            return Contacts::findOrFail($id);
        }else{
            return false;
        }
    }

    public function list(Request $request)
    {
        return Contacts::select('id', 'position', 'first_name', 'last_name', 'company_name', 'phone', 'email')->get();
    }

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ], [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
        ]);



        $requestData = $request->all();

        $auth_user = Auth::user();
        $requestData['user_id'] = $auth_user->id;

        $contacts = Contacts::create($requestData);
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ], [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
        ]);

        $contacts = Contacts::findOrFail($id);
        $input = $request->all();

        $auth_user = Auth::user();
        $input['user_id'] = $auth_user->id;

        $contacts->fill($input)->save();
    }

    public function delete(Request $request, $id)
    {
        $contacts = Contacts::findOrFail($id);
        $contacts->delete();
    }
}

?>
