<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\CfagentsDeliveryAddress;
use App\Model\Contacts;
use App\Model\Cfagetns;
use App\Model\ImageFile;
use App\Model\UniqueId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CfagetnsController extends Controller
{
    public function get(Request $request, $id)
    {
        $cfagents = Cfagetns::where('id', $id)->with(['delivery_address', 'contacts', 'files'])->first();
        return $cfagents;
    }

    public function list(Request $request)
    {
        $auth_user = Auth::user();
        $cfagents = Cfagetns::where('user_id', $auth_user->id)->orderBy('created_at', 'asc')->with('country_name')->get();
        return $cfagents;
    }

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'company_name' => 'required',
        ], [
            'company_name.required' => 'Company name is required',
        ]);

        $requestData = $request->except(['delivery_address', 'contacts', 'files']);
        $auth_user = Auth::user();
        $requestData['user_id'] = $auth_user->id;

        if (!isset($request->business_code)) {
            //business_code is not set
            $customer_uniqueId_count = UniqueId::where('user_id', $auth_user->id)->where('type', 'cfagent')->select('count')->first();

            if (!isset($customer_uniqueId_count)) {
                $saveUniqueID = [
                    'user_id' => $auth_user->id,
                    'type' => 'cfagent',
                    'count' => '1',
                ];
                UniqueId::create($saveUniqueID);
                $requestData['business_code'] = 'C&F-001';
            } else {
                $increment = (int)$customer_uniqueId_count->count + 1;

                UniqueId::where('user_id', $auth_user->id)->where('type', 'cfagent')->update([
                    'count' => $increment,
                ]);
                $increments = sprintf('%03d', $increment);
                $requestData['business_code'] = 'C&F-' . $increments;
            }
        } else {
            //business_code is set
            $requestData['business_code'] = $request->business_code;
        }

        $cfagents = Cfagetns::create($requestData);


        // Customer Delivery Address
        if ($request->is_same_delivery == false) {
            if (isset($request->delivery_address)) {
                foreach ($request->delivery_address as $address) {
                    if (isset($address['address'])) {
                        $saveAddress = [
                            'user_id' => $auth_user->id,
                            'cfagent_id' => $cfagents->id,
                            'address' => $address['address'],
                        ];
                        CfagentsDeliveryAddress::create($saveAddress);
                    }
                }
            }
        }

        //CfAgents Contact List
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
                        'cfagent_id' => $cfagents->id,
                        'first_name' => $contact['first_name'],
                        'last_name' => $contact['last_name'],
                        'worked_email' => $contact['email'],
                        'worked_phone' => $contact['phone'],
                    ];
                    Contacts::create($saveContact);
                }
            }
        }

        //CfAgents File upload option
        $requestImage = $request->all();
        if (isset($requestImage['files'])) {
            $t = 1;
            foreach ($requestImage['files'] as $file) {
                $name = $t++ . "." . time() . '.' . explode('/', explode(':', substr($file['image'], 0, strpos($file['image'], ';')))[1])[1];
                Image::make($file['image'])->save(public_path('images/') . $name);

                $imageData = [
                    'user_id' => $auth_user->id,
                    'cfagent_id' => $cfagents->id,
                    'type' => 'cfagents',
                    'name' => $name,
                    'path' => '/images/',
                    'image' => '/images/' . $name,
                ];

                ImageFile::create($imageData);
            }
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'company_name' => 'required',
        ], [
            'company_name.required' => 'Company name is required',
        ]);

        $auth_user = Auth::user();


        if ($request->business_code != null) {
            $checkUnique = Cfagetns::where('user_id', $auth_user->id)
                ->where('business_code', $request->business_code)
                ->where('id', '!=', $request->id)->first();

            if (isset($checkUnique)) {
                $validatedData = $request->validate([
                    'business_code' => 'required|unique:cfagetns'
                ], ['business_code.unique' => 'Business code has already been taken',]);
                return $validatedData;
            }
        }else{
            $validatedData = $request->validate([
                'business_code' => 'required|unique:suppliers'
            ], ['business_code.required' => 'Business code is required',]);
            return $validatedData;
        }


        $requestData = $request->except(['delivery_address', 'contacts', 'files']);


        $requestData['user_id'] = $auth_user->id;

        $cfagents = Cfagetns::findOrFail($id);

        $cfagents->fill($requestData)->save();

        // CfAgents Delivery Address
        if ($request->is_same_delivery == true) {
            $cusAddress = CfagentsDeliveryAddress::where('cfagent_id', $cfagents->id)->delete();
        } else {
            if (isset($request->delivery_address)) {
                $cfaAddress = CfagentsDeliveryAddress::where('cfagent_id', $cfagents->id)->delete();
                foreach ($request->delivery_address as $address) {
                    if (isset($address['address'])) {
                        $saveAddress = [
                            'user_id' => $auth_user->id,
                            'cfagent_id' => $cfagents->id,
                            'address' => $address['address'],
                        ];
                        CfagentsDeliveryAddress::create($saveAddress);
                    }
                }
            }
        }

        //CfAgents Contact List Update
        if (isset($request->contacts)) {

            $validatedData = $request->validate([
                'contacts.*.last_name' => 'required',
            ], [
                'contacts.*.last_name.required' => 'Last name is required',
            ]);

            $cusContact = Contacts::where('cfagent_id', $cfagents->id)->delete();

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
                        'cfagent_id' => $cfagents->id,
                        'first_name' => $contact['first_name'],
                        'last_name' => $contact['last_name'],
                        'email' => $contact['email'],
                        'phone' => $contact['phone'],
                    ];
                    Contacts::create($saveContact);
                }
            }
        }

        //CfAgents File upload option
        $requestImage = $request->all();
        if (isset($requestImage['files'])){
            $t = 1;
            $imgFile = ImageFile::where('cfagent_id', $cfagents->id)->delete();
            foreach ($requestImage['files'] as $file){

                if (isset($file['cfagent_id'])){
                    $imageData = [
                        'user_id' => $auth_user->id,
                        'cfagent_id' => $cfagents->id,
                        'type' => 'cfagetns',
                        'name' => $file['name'],
                        'path' => '/images/',
                        'image' => $file['image'],
                    ];
                }else{
                    $name = $t++.".".time(). '.'. explode('/', explode(':', substr($file['image'], 0, strpos($file['image'], ';')))[1])[1];
                    Image::make($file['image'])->save(public_path('images/').$name);

                    $imageData = [
                        'user_id' => $auth_user->id,
                        'cfagent_id' => $cfagents->id,
                        'type' => 'cfagetns',
                        'name' => $name,
                        'path' => '/images/',
                        'image' => '/images/'.$name,
                    ];
                }

                ImageFile::create($imageData);
            }
        }
    }

    public function delete(Request $request, $id)
    {
        $cfagetns = Cfagetns::findOrFail($id);
        $cfagetns->delete();
    }
}

?>
