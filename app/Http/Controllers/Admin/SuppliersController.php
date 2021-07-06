<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Contacts;
use App\Model\UniqueId;
use Illuminate\Http\Request;
use App\Model\Suppliers;
use Illuminate\Support\Facades\Auth;

class SuppliersController extends Controller
{
    public function get(Request $request, $id)
    {
        $suppliers = Suppliers::where('id', $id)->with(['contacts'])->first();
        return $suppliers;
    }

    public function list(Request $request)
    {
        $auth_user = Auth::user();
        $suppliers = Suppliers::where('user_id', $auth_user->id)->orderBy('id', 'desc')->with('country_name')->get();
        return $suppliers;
    }

    public function listPaginate(Request $request)
    {
        $auth_user = Auth::user();
        if($request->has('user_name') && $request->user_name != null){
            $key = $request->user_name;
            $Suppliers = Suppliers::where('business_code', $key)
                                    ->orWhere('phone', $key)
                                    ->orWhere('email', $key)
                                    ->orWhere('first_name', $key)
                                    ->orWhere('last_name', $key)
                                    ->orWhere('company_name', $key)
                                    ->orwhere('business_code', 'LIKE', '%'.$key.'%')
                                    ->orWhere('phone','LIKE', '%'.$key.'%')
                                    ->orWhere('billing_address','LIKE', '%'.$key.'%')
                                    ->orWhere('email', 'LIKE', '%'.$key.'%')
                                    ->orWhere('first_name', 'LIKE', '%'.$key.'%')
                                    ->orWhere('last_name', 'LIKE', '%'.$key.'%')
                                    ->orWhere('company_name', 'LIKE', '%'.$key.'%')
                                    ->with('country_name')->paginate(10);
        }else{
            $Suppliers = Suppliers::where('user_id', $auth_user->id)->orderBy('id', 'DESC')->with('country_name')->paginate(10);
        }
        return $Suppliers;
    }

    public function create(Request $request)
    {

        if ($request->is_company == true) {
            $validatedData = $request->validate([
                'company_name' => 'required',
            ], [
                'company_name.required' => 'Company name is required',
            ]);
        } else {
            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
            ], [
                'first_name.required' => 'First name is required',
                'last_name.required' => 'Last name is required',
            ]);
        }
        $requestData = $request->except(['contacts']);
        $auth_user = Auth::user();
        $requestData['user_id'] = $auth_user->id;

        if (!isset($request->business_code)) {
            //business_code is not set
            $supplier_uniqueId_count = UniqueId::where('user_id', $auth_user->id)->where('type', 'supplier')->select('count')->first();

            if (!isset($supplier_uniqueId_count)) {
                $saveUniqueID = [
                    'user_id' => $auth_user->id,
                    'type' => 'supplier',
                    'count' => '1',
                ];
                UniqueId::create($saveUniqueID);
                $requestData['business_code'] = 'SUP-001';
            } else {
                $increment = (int)$supplier_uniqueId_count->count + 1;

                UniqueId::where('user_id', $auth_user->id)->where('type', 'supplier')->update([
                    'count' => $increment,
                ]);
                $increments = sprintf('%03d', $increment);
                $requestData['business_code'] = 'SUP-' . $increments;
            }
        } else {
            //business_code is set
            $requestData['business_code'] = $request->business_code;
        }

        if ($request->is_company == false){
            $requestData['company_name'] = '';
        }

        $supplier = Suppliers::create($requestData);

        //Supplier Contact List
        if (isset($request->contacts)) {
            $validatedData = $request->validate([
                'contacts.*.last_name' => 'required',
            ], [
                'contacts.*.last_name.required' => 'Last name is required',
            ]);
            foreach ($request->contacts as $contact) {
                if (isset($contact['last_name'])) {
                    $saveContact = [
                        'user_id' => $auth_user->id,
                        'supplier_id' => $supplier->id,
                        'first_name' => $contact['first_name'],
                        'last_name' => $contact['last_name'],
                        'worked_email' => $contact['email'],
                        'worked_phone' => $contact['phone'],
                    ];
                    Contacts::create($saveContact);
                }
            }
        }

    }

    public function update(Request $request, $id)
    {

        if ($request->is_company == true) {
            $validatedData = $request->validate([
                'company_name' => 'required',
            ], [
                'company_name.required' => 'Company name is required',
            ]);
        } else {
            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
            ], [
                'first_name.required' => 'First name is required',
                'last_name.required' => 'Last name is required',
            ]);
        }
        $auth_user = Auth::user();

        if ($request->business_code != null) {
            $checkUnique = Suppliers::where('user_id', $auth_user->id)
                ->where('business_code', $request->business_code)
                ->where('id', '!=', $request->id)->first();

            if (isset($checkUnique)) {
                $validatedData = $request->validate([
                    'business_code' => 'required|unique:suppliers'
                ], ['business_code.unique' => 'Business code has already been taken',]);
                return $validatedData;
            }
        }else{

            $validatedData = $request->validate([
                'business_code' => 'required|unique:suppliers'
            ], ['business_code.required' => 'Business code is required',]);
            return $validatedData;
        }

        $requestData = $request->except(['contacts']);

        $requestData['user_id'] = $auth_user->id;

        $suppliers = Suppliers::findOrFail($id);

        $suppliers->fill($requestData)->save();


        //Supplier Contact List Update
        if (isset($request->contacts)) {

            $validatedData = $request->validate([
                'contacts.*.last_name' => 'required',
            ], [
                'contacts.*.last_name.required' => 'Last name is required',
            ]);

            $supContact = Contacts::where('supplier_id', $suppliers->id)->delete();

            foreach ($request->contacts as $contact) {
                if (!isset($contact['first_name'])) {
                    $contact['first_name'] = '';
                }
                if (!isset($contact['email'])) {
                    $contact['email'] = '';
                }
                if (!isset($contact['phone'])) {
                    $contact['phone'] = '';
                }
                if (isset($contact['last_name'])) {
                    $saveContact = [
                        'user_id' => $auth_user->id,
                        'supplier_id' => $suppliers->id,
                        'first_name' => $contact['first_name'],
                        'last_name' => $contact['last_name'],
                        'email' => $contact['email'],
                        'phone' => $contact['phone'],
                    ];
                    Contacts::create($saveContact);
                }
            }
        }
    }

    public function delete(Request $request, $id)
    {
        $suppliers = Suppliers::findOrFail($id);
        $suppliers->delete();
    }
}

?>
