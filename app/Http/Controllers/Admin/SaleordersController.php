<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Customers;
use App\Model\ImageFile;
use App\Model\ProductServiceLog;
use App\Model\Quotes;
use App\Model\RelatedProduct;
use App\Model\SaleOrderProduct;
use Illuminate\Http\Request;
use App\Model\Saleorders;
use App\Model\SalesLog;
use App\Model\UniqueId;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class SaleordersController extends Controller
{
    public function get(Request $request, $id)
    {
        $orders = Saleorders::where('creator',Auth::user()->id)->where('id',$id)->with('sales_log','delivery_address_info')->first();
        $selected_products = RelatedProduct::where('type_name','saleorders')->where('type_id', $id)->with('product_details')->get();
        $customer_info = Customers::where('user_id',Auth::user()->id)->where('id', $orders->customer_id)->with([
                'country_name',
                'contacts',
                'files','sale_receipts','projects'
            ])->first();

        if($request->has('convert_to_delivery_note')){
            // $last_delivery_products = $orders->sales_log;
            // $orders->last_converted_delivery_note_related_products = $last_delivery_products;
            // dd($orders->toArray());
        }

        // return dd($orders, SalesLog::where('sales_order_id',$orders->id)->first());
        return response()->json([
            'orders' => $orders,
            'selected_products' => $selected_products,
            'customer_info' => $customer_info,
        ]);
    }

    public function list(Request $request)
    {
        if ($request->status == 'delivered') {
            $datas = Saleorders::where('is_delivered', 1)->where('creator',Auth::user()->id)->with('sales_log')->latest()->paginate(10);
        } elseif ($request->status == 'not_delivered') {
            $datas = Saleorders::where('status', 'open')->where('creator',Auth::user()->id)->with('sales_log')->latest()->paginate(10);
        } elseif ($request->status == 'invoiced') {
            $datas = Saleorders::where('is_invoiced', 1)->where('creator',Auth::user()->id)->with('sales_log')->latest()->paginate(10);
        } else {
            $datas = Saleorders::latest()->where('creator',Auth::user()->id)->with('sales_log')->paginate(10);
        }

        $all_saleorders_count = Saleorders::where('creator',Auth::user()->id)->count();
        $not_delivered_count = Saleorders::where('creator',Auth::user()->id)->where('status', 'open')->count();
        $pertially_delivered_count = Saleorders::where('creator',Auth::user()->id)->where('status', 'pertially_delivered')->count();
        $delivered_count = SalesLog::where('creator',Auth::user()->id)->where('is_sales_order',1)->where('is_delivery_note',1)->count();
        $invoiced_count = SalesLog::where('creator',Auth::user()->id)->where('is_sales_order',1)->where('is_invoice',1)->count();

        return response()->json([
            'datas' => $datas,
            'all_saleorders_count' => $all_saleorders_count,
            'not_delivered_count' => $not_delivered_count,
            'pertially_delivered_count' => $pertially_delivered_count,
            'delivered_count' => $delivered_count,
            'invoiced_count' => $invoiced_count,
        ]);
    }

    public function create(Request $request)
    {
        // return dd($request->all());

        $validatedData = $request->validate([
            'customer' => 'required |max:255 ',
            'address' => 'required',
            'date' => 'required |max:255 ',
            'delivery_date' => 'required |max:255 ',
            'selected_products' => 'required'
        ], [
            'customer.required' => 'customer is a required field.',
            'customer.max' => 'customer can only be 255 characters.',
            'date.required' => 'date is a required field.',
            'date.max' => 'date can only be 255 characters.',
            'delivery_date.required' => 'expiration_date is a required field.',
            'delivery_date.max' => 'expiration_date can only be 255 characters.',
        ]);

        $products = $request->selected_products;

        $requestData = $request->except(['files', 'attachments']);

        $requestData['code'] = NULL;
        $requestData['creator'] = Auth::user()->id;
        $auth_user = Auth::user();

        if (!isset($request->code)) {
            $requestData['code'] = CommonController::getCodeId('sales_order', 'CORD');
        } else {
            //business_code is set
            $requestData['code'] = $request->code;
            CommonController::setCodeId('sales_order');
        }

        $saleorders = Saleorders::create($requestData);
        $saleorders->created_at = Carbon::now()->toDateTimeString();
        $saleorders->save();

        CommonController::related_product_insert($products,'saleorders',$saleorders->id);

        CommonController::insert_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $saleorders->customer_id,
            'type' => 'saleorders',
            'type_id' => $saleorders->id
        ]);

        $auth_user = Auth::user();
        $customers = Customers::find($request->id);
        $requestImage = $request->all();

        if($request->has('quotaion_sales_log_id')){
            $sales_log = SalesLog::find($request->quotaion_sales_log_id);
            $sales_log->is_sales_order = 1;
            $sales_log->sales_order_id = $saleorders->id;
            $sales_log->sales_order_code = $saleorders->code;
            $sales_log->sales_order_description= 'quotaion to sales order';
            $sales_log->save();

            Quotes::where('id',$sales_log->quote_id)->update([
                'status' => 'won'
            ]);
        }else{
            $sales_log_id = SalesLog::insertGetId([
                'creator' => Auth::user()->id,
                'customer_id' => $saleorders->customer_id,
                'is_sales_order' => 1,
                'sales_order_id' => $saleorders->id,
                'sales_order_code' => $saleorders->code,
                'sales_order_description' => 'new sales order creation',
            ]);
        }

        if (isset($requestImage['files'])) {
            CommonController::file_upload_to_image_files(
                [
                    'files' => $requestImage['files'],
                    'user_id' => Auth::user()->id,
                    'customer_id' => $saleorders->customer_id,
                    'type' => 'saleorders',
                    'type_id' => $saleorders->id
                ]
            );
        }

        return $saleorders;
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'customer' => 'required |max:255 ',
            'address' => 'required',
            'date' => 'required |max:255 ',
            'delivery_date' => 'required |max:255 ',
            'selected_products' => 'required'
        ], [
            'customer.required' => 'customer is a required field.',
            'customer.max' => 'customer can only be 255 characters.',
            'date.required' => 'date is a required field.',
            'date.max' => 'date can only be 255 characters.',
            'delivery_date.required' => 'expiration_date is a required field.',
            'delivery_date.max' => 'expiration_date can only be 255 characters.',
        ]);

        $saleorders = Saleorders::findOrFail($id);
        $input = $request->except(['files', 'attachments']);
        $saleorders->fill($input)->save();

        $products = $request->selected_products;
        // SaleOrderProduct::where('sale_order_id', $saleorders->id)->delete();
        ProductServiceLog::where('sale_order_id',$saleorders->id)->delete();

        RelatedProduct::where('type_name','saleorders')->where('type_id',$saleorders->id)->delete();
        CommonController::related_product_insert($products,'saleorders',$saleorders->id);

        CommonController::delete_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $saleorders->customer_id,
            'type' => 'saleorders',
            'type_id' => $saleorders->id
        ]);

        CommonController::insert_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $saleorders->customer_id,
            'type' => 'saleorders',
            'type_id' => $saleorders->id
        ]);

        $auth_user = Auth::user();
        $customers = Customers::find($request->id);
        $requestImage = $request->all();

        if (isset($requestImage['files'])) {
            ImageFile::where('type', 'saleorders')->where('type_id',$saleorders->id)->delete();

            CommonController::file_upload_to_image_files(
                [
                    'files' => $requestImage['files'],
                    'user_id' => Auth::user()->id,
                    'customer_id' => $saleorders->customer_id,
                    'type' => 'saleorders',
                    'type_id' => $saleorders->id
                ]
            );
        }

        return $saleorders;
    }

    public function delete(Request $request, $id)
    {
        $saleorders = Saleorders::findOrFail($id);

        if($saleorders->sales_log()){
            $log = $saleorders->sales_log()->first();

            if($log && ( $log->is_delivery_note != null || $log->is_invoice != null)){
                throw new ModelNotFoundException('saleorder is related to another document');
            }else{
                CommonController::delete_customer_log([
                    'creator' => Auth::user()->id,
                    'customer_id' => $saleorders->customer_id,
                    'type' => 'saleorders',
                    'type_id' => $saleorders->id
                ]);

                RelatedProduct::where('type_name','saleorders')->where('type_id',$saleorders->id)->delete();
                $saleorders->delete();
            }
        }
    }

    public function saleorders_sort(Request $request)
    {
        $quotes = Saleorders::where('creator',Auth::user()->id)->orderBy((string) $request->key, $request->type)->paginate(10);
        return $quotes;
    }

    public function saleorders_by_day(Request $request)
    {
        if ($request->type == 'by_day') {
            if ($request->key == 'today') {
                return Saleorders::where('creator',Auth::user()->id)->whereDay('created_at', Carbon::now()->today())->paginate(10);
            }
            if ($request->key == 'this_month') {
                return Saleorders::where('creator',Auth::user()->id)->whereMonth('created_at', Carbon::now()->month)->paginate(10);
            }
            if ($request->key == 'this_year') {
                return Saleorders::where('creator',Auth::user()->id)->whereYear('created_at', Carbon::now()->year)->paginate(10);
            }
        }

        if ($request->type == 'by_sub_day') {
            if ($request->key == 'last_week') {
                $date = \Carbon\Carbon::today()->subDays(7);
                return Saleorders::where('creator',Auth::user()->id)->where('created_at', '>=', $date)->paginate(10);
            }
            if ($request->key == 'last_month') {
                $date = \Carbon\Carbon::today()->subDays(30);
                return Saleorders::where('creator',Auth::user()->id)->where('created_at', '>=', $date)->paginate(10);
            }
            if ($request->key == 'last_year') {
                $date = \Carbon\Carbon::today()->subDays(365);
                return Saleorders::where('creator',Auth::user()->id)->where('created_at', '>=', $date)->paginate(10);
            }
        }
        return $this->list($request);
    }

    public function saleorders_search(Request $request)
    {
        $key = $request->key;
        $sales = Saleorders::where('creator',Auth::user()->id)
            ->where('customer', $key)
            ->orWhere('customer', 'like', '%' . $key . '%')
            ->orWhere('code', 'like', '%' . $key . '%')
            ->orWhere('total', 'like', '%' . $key . '%')
            ->orWhere('po_number', 'like', '%' . $key . '%')
            ->paginate(10);
        return $sales;
    }
}
