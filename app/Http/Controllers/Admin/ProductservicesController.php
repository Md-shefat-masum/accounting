<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Productservices;
use App\Model\UniqueId;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductservicesController extends Controller
{
    public function get(Request $request, $id)
    {
        return Productservices::findOrFail($id);
    }

    public function list()
    {
        return Productservices::where('creator', Auth::user()->id)->orderBy('id', 'DESC')->with('product_log')->paginate(10);
    }

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required |max:255 ',
        ], [
            'name.required' => 'name is a required field.',
            'name.max' => 'name can only be 255 characters.',
        ]);

        $requestData = $request->except(['files', 'attachments']);
        $requestData['code'] = NULL;
        $requestData['creator'] = Auth::user()->id;
        $auth_user = Auth::user();
        if (!isset($request->code)) {
            //business_code is not set
            $customer_uniqueId_count = UniqueId::where('user_id', $auth_user->id)
                ->where('type', 'product_service')
                ->select('count')
                ->first();

            if (!isset($customer_uniqueId_count)) {
                $saveUniqueID = [
                    'user_id' => $auth_user->id,
                    'type' => 'product_service',
                    'count' => '1',
                ];
                UniqueId::create($saveUniqueID);
                $requestData['code'] = 'PRO-001';
            } else {
                $increment = (int) $customer_uniqueId_count->count + 1;

                UniqueId::where('user_id', $auth_user->id)
                    ->where('type', 'product_service')
                    ->update([
                        'count' => $increment,
                    ]);
                $increments = sprintf('%03d', $increment);
                $requestData['code'] = 'PRO-' . $increments;
            }
        } else {
            //business_code is set
            $requestData['code'] = $request->code;
        }

        $productservices = Productservices::create($requestData);
        $productservices->save();

        return $productservices;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required |max:255 ',
        ], [
            'name.required' => 'name is a required field.',
            'name.max' => 'name can only be 255 characters.',
        ]);

        $productservices = Productservices::findOrFail($id);
        $input = $request->all();
        $productservices->fill($input);
        $productservices->save();
        return $productservices;
    }

    public function delete($id)
    {
        $productservices = Productservices::findOrFail($id);
        $productservices->delete();
    }

    public function delete_multiple(Request $request)
    {
        $ids = $request->checked_id;

        foreach ($ids as $id) {
            $productservices = Productservices::findOrFail($id);
            $productservices->delete();
        }
    }

    public function productservices_sort(Request $request)
    {
        $quotes = Productservices::orderBy((string) $request->key, $request->type)->paginate(10);
        return $quotes;
    }

    public function productservices_by_day(Request $request)
    {
        if ($request->key == 'product') {
            return Productservices::where('is_services', 0)->paginate(10);
        }

        if ($request->key == 'service') {
            return Productservices::where('is_services', '>', 0)->paginate(10);
        }

        return $this->list();
    }

    public function product_service_search(Request $request)
    {
        $key = $request->key;
        $productservices = Productservices::where('name', $key)
            ->orWhere('name', 'like', '%' . $key . '%')
            ->orWhere('description', 'like', '%' . $key . '%')
            ->orWhere('sales_price', 'like', '%' . $key . '%')
            ->orWhere('purchase_price', 'like', '%' . $key . '%')
            ->orWhere('unit', 'like', '%' . $key . '%')
            ->paginate(10);
        return $productservices;
    }
}
