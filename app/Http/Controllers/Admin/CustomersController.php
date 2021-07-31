<?php
namespace App\Http\Controllers\Admin;

use App\CustomerLog;
use App\Http\Controllers\Controller;
use App\Model\Contacts;
use App\Model\CustomerDeliveryAddress;
use App\Model\ImageFile;
use App\Model\UniqueId;
use Illuminate\Http\Request;
use App\Model\Customers;
use App\Model\CustomerStatement;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{
    public function get(Request $request, $id)
    {
        $customers = Customers::where('id', $id)->with(['delivery_address', 'country_name', 'contacts', 'files','sale_receipts','projects'])->first();
        return $customers;
    }

    public function list(Request $request)
    {
        $auth_user = Auth::user();
        $customers = Customers::where('user_id', $auth_user->id)
                    ->orderBy('id', 'DESC')
                    ->with(['country_name','contacts'])->get();
        return $customers;
    }

    public function listPaginate(Request $request)
    {
        $auth_user = Auth::user();
        if($request->has('user_name') && $request->user_name != null){
            $key = $request->user_name;
            $customers = Customers::where('business_code', $key)
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
            $customers = Customers::where('user_id', $auth_user->id)->orderBy('id', 'DESC')->with('country_name')->paginate(10);
        }
        return $customers;
    }

    public function customer_statements($id)
    {
        $statements = CustomerStatement::where('customer_id',$id)->with(['invoice_details','receipt_details'])->get();
        return $statements;
    }

    public function customer_profile($id)
    {
        $customer_logs = CustomerLog::where('customer_id',$id)->latest()->get();
        $log_details = [];
        foreach ($customer_logs as $key=>$item) {
            switch($item->type){
                case 'quotes' :
                    if(DB::table('quotes')->where('id',$item->type_id)->where('customer_id',$id)->exists())
                        array_push($log_details,DB::table('quotes')->where('id',$item->type_id)->where('customer_id',$id)->first());
                        $log_details[$key]->log_name = 'Quote';
                break;
                case 'deliverynotes' :
                    if(DB::table('deliverynotes')->where('id',$item->type_id)->where('customer_id',$id)->exists())
                        array_push($log_details,DB::table('deliverynotes')->where('id',$item->type_id)->where('customer_id',$id)->first());
                        $log_details[$key]->log_name = 'Delivery Note';
                break;
                case 'invoices' :
                    if(DB::table('invoices')->where('id',$item->type_id)->where('customer_id',$id)->exists())
                        array_push($log_details,DB::table('invoices')->where('id',$item->type_id)->where('customer_id',$id)->first());
                        $log_details[$key]->log_name = 'Invoice';
                break;
                case 'receipts' :
                    if(DB::table('receipts')->where('id',$item->type_id)->where('customer_id',$id)->exists())
                        array_push($log_details,DB::table('receipts')->where('id',$item->type_id)->where('customer_id',$id)->first());
                        $log_details[$key]->log_name = 'Receipt';
                break;
                case 'saleorders' :
                    if(DB::table('saleorders')->where('id',$item->type_id)->where('customer_id',$id)->exists())
                        array_push($log_details,DB::table('saleorders')->where('id',$item->type_id)->where('customer_id',$id)->first());
                        $log_details[$key]->log_name = 'Sales Order';
                break;
                case 'customerpayments' :
                    if(DB::table('customerpayments')->where('id',$item->type_id)->where('customer_id',$id)->exists())
                        array_push($log_details,DB::table('customerpayments')->where('id',$item->type_id)->where('customer_id',$id)->first());
                        $log_details[$key]->log_name = 'Payment';
                break;
                case 'creditmemos' :
                    if(DB::table('creditmemos')->where('id',$item->type_id)->where('customer_id',$id)->exists())
                        array_push($log_details,DB::table('creditmemos')->where('id',$item->type_id)->where('customer_id',$id)->first());
                        $log_details[$key]->log_name = 'Credit Memo';
                break;
            }
        }
        return response()->json([
            'log_details' => $log_details,
            'invoices_total' => CustomerLog::where('customer_id',$id)->where('type','invoices')->count(),
            'deliverynotes_total' => CustomerLog::where('customer_id',$id)->where('type','deliverynotes')->count(),
            'receipts_total' => CustomerLog::where('customer_id',$id)->where('type','receipts')->count(),
            'quotes_total' => CustomerLog::where('customer_id',$id)->where('type','quotes')->count(),
            'saleorders_total' => CustomerLog::where('customer_id',$id)->where('type','saleorders')->count(),
            'customer' => Customers::find($id)
        ]);
    }

    public function create(Request $request)
    {
        // return dd($request->all());
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

        $requestData = $request->except(['delivery_address', 'contacts', 'files']);
        $auth_user = Auth::user();
        $requestData['user_id'] = $auth_user->id;

        if (!isset($request->business_code)) {
            //business_code is not set
            $customer_uniqueId_count = UniqueId::where('user_id', $auth_user->id)->where('type', 'customer')->select('count')->first();

            if (!isset($customer_uniqueId_count)) {
                $saveUniqueID = [
                    'user_id' => $auth_user->id,
                    'type' => 'customer',
                    'count' => '1',
                ];
                UniqueId::create($saveUniqueID);
                $requestData['business_code'] = 'CUS-001';
            } else {
                $increment = (int)$customer_uniqueId_count->count + 1;

                UniqueId::where('user_id', $auth_user->id)->where('type', 'customer')->update([
                    'count' => $increment,
                ]);
                $increments = sprintf('%03d', $increment);
                $requestData['business_code'] = 'CUS-' . $increments;
            }
        } else {
            //business_code is set
            $requestData['business_code'] = $request->business_code;
        }
        if ($request->is_company == false){
            $requestData['company_name'] = '';
        }

        $customers = Customers::create($requestData);

        // Customer Delivery Address
        if ($request->is_same_delivery == false) {
            if (isset($request->delivery_address)) {
                foreach ($request->delivery_address as $address) {
                    if (isset($address['address'])) {
                        $saveAddress = [
                            'user_id' => $auth_user->id,
                            'customer_id' => $customers->id,
                            'country' => $address['country'],
                            'address' => $address['address'],
                            'line2' => $address['line2'],
                            'city' => $address['city'],
                            'state' => $address['state'],
                            'zip_code' => $address['zip_code'],
                        ];
                        CustomerDeliveryAddress::create($saveAddress);
                    }
                }
            }
        }

        //Customer Contact List
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
                        'customer_id' => $customers->id,
                        'first_name' => $contact['first_name'],
                        'last_name' => $contact['last_name'],
                        'email' => $contact['email'],
                        'phone' => $contact['phone'],
                        'worked_email' => $contact['email'],
                        'worked_phone' => $contact['phone'],
                    ];
                    Contacts::create($saveContact);
                }
            }
        }

        //Customer File upload option
        $requestImage = $request->all();
        if (isset($requestImage['files'])){
            $t = 1;
            foreach ($requestImage['files'] as $file){
                $name = $t++.".".time(). '.'. explode('/', explode(':', substr($file['image'], 0, strpos($file['image'], ';')))[1])[1];
                Image::make($file['image'])->save(public_path('images/').$name);

                $imageData = [
                  'user_id' => $auth_user->id,
                  'customer_id' => $customers->id,
                  'type' => 'customer',
                  'name' => $name,
                  'path' => '/images/',
                  'image' => '/images/'.$name,
                ];

                ImageFile::create($imageData);
            }
        }

        return response()->json([
            'customer' => Customers::where('user_id', Auth::user()->id)->latest()->first()
        ]);
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
            $checkUnique = Customers::where('user_id', $auth_user->id)
                ->where('business_code', $request->business_code)
                ->where('id', '!=', $request->id)->first();

            if (isset($checkUnique)) {
                $validatedData = $request->validate([
                    'business_code' => 'required|unique:customers'
                ], ['business_code.unique' => 'Business code has already been taken',]);
                return $validatedData;
            }
        }else {
            $validatedData = $request->validate([
                'business_code' => 'required|unique:suppliers'
            ], ['business_code.required' => 'Business code is required',]);
            return $validatedData;
        }

        $requestData = $request->except(['delivery_address', 'contacts', 'files']);
        $requestData['user_id'] = $auth_user->id;

        $customers = Customers::findOrFail($id);
        $customers->update($requestData);

        // Customer Delivery Address
        if ($request->is_same_delivery == true) {
            $cusAddress = CustomerDeliveryAddress::where('customer_id', $customers->id)->delete();
        } else {
            if (isset($request->delivery_address)) {
                // CustomerDeliveryAddress::where('customer_id', $customers->id)->delete();
                foreach ($request->delivery_address as $address) {
                    $saveAddress = [
                        'user_id' => $auth_user->id,
                        'customer_id' => $customers->id,
                        'country' => $address['country'],
                        'address' => $address['address'],
                        'line2' => $address['line2'],
                        'city' => $address['city'],
                        'state' => $address['state'],
                        'zip_code' => $address['zip_code'],
                    ];
                    if (isset($address['id'])) {
                        CustomerDeliveryAddress::where('id',$address['id'])->update($saveAddress);
                    }else{
                        CustomerDeliveryAddress::create($saveAddress);
                    }
                }
            }
        }

        //Customer Contact List Update
        if (isset($request->contacts)) {

            $validatedData = $request->validate([
                'contacts.*.last_name' => 'required',
            ], [
                'contacts.*.last_name.required' => 'Last name is required',
            ]);

            $cusContact = Contacts::where('customer_id', $customers->id)->delete();

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
                        'customer_id' => $customers->id,
                        'first_name' => $contact['first_name'],
                        'last_name' => $contact['last_name'],
                        'email' => $contact['email'],
                        'phone' => $contact['phone'],
                    ];
                    Contacts::create($saveContact);
                }
            }
        }

        //Customer File upload option
        $requestImage = $request->all();
        if (isset($requestImage['files'])){
            $t = 1;
            ImageFile::where('customer_id', $customers->id)->delete();
            foreach ($requestImage['files'] as $file){

                if (isset($file['customer_id'])){
                    $imageData = [
                        'user_id' => $auth_user->id,
                        'customer_id' => $customers->id,
                        'type' => 'customer',
                        'name' => $file['name'],
                        'path' => '/images/',
                        'image' => $file['image'],
                    ];
                }else{
                    $name = $t++.".".time(). '.'. explode('/', explode(':', substr($file['image'], 0, strpos($file['image'], ';')))[1])[1];
                    Image::make($file['image'])->save(public_path('images/').$name);

                    $imageData = [
                        'user_id' => $auth_user->id,
                        'customer_id' => $customers->id,
                        'type' => 'customer',
                        'name' => $name,
                        'path' => '/images/',
                        'image' => '/images/'.$name,
                    ];
                }

                ImageFile::create($imageData);
            }
        }

        return $customers;

    }

    public function delete(Request $request, $id)
    {
        $customers = Customers::findOrFail($id);
        $customers->delete();
    }

    public function get_basic_information()
    {
        $basic_information = User::where('id',Auth::user()->id)->first();
        $basic_information->logo = '/pdflogo.png';
        $basic_information->assigned_to = $basic_information->name;
        return $basic_information;
    }
}

?>
