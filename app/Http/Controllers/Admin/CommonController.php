<?php

namespace App\Http\Controllers\Admin;

use App\CustomerLog;
use App\Http\Controllers\Controller;
use App\Model\CustomerPaymentByReceipt;
use App\Model\CustomerStatement;
use App\Model\ImageFile;
use App\Model\RelatedProduct;
use App\Model\SalesLog;
use App\Model\SupplierLog;
use Illuminate\Http\Request;
use App\Model\UniqueId;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class CommonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function delete_selected_all(Request $request)
    {
        $model_name = "App\Model\\" . $request->model_name;
        $model_related = $request->model_related ? "App\Model\\" . $request->model_related : '';
        $model_related_name = $request->model_related_name;
        $ids = $request->checked_id;

        foreach ($ids as $id) {
            $model = new $model_name();
            $model_main = $model::find($id);
            if ($model_related) {
                $model_related::where($model_related_name, $model_main->id)->delete();
            }

            // delete customer log
            self::delete_customer_log([
                'creator' => $model_main->creator,
                'customer_id' => $model_main->customer_id,
                'type' => $model_main->getTable(),
                'type_id' => $model_main->id
            ]);

            // delele customer statements
            if ($model_main->getTable() == 'invoices') {
                CustomerStatement::where('invoice_id', $model_main->id)->delete();
                $temp_array = [
                    'invoice_id' => $model_main->id,
                    'code' => $model_main->code,
                ];
                $invoice_receipt_statements = CustomerStatement::where('receipt_appliedto', '!=', null)
                    ->where('receipt_appliedto', '!=', null)
                    ->where('receipt_appliedto', 'LIKE', '%' . json_encode($temp_array) . '%')
                    ->get();
                foreach ($invoice_receipt_statements as $item) {
                    $item->receipt_appliedto = str_replace(json_encode($temp_array), '', $item->receipt_appliedto);
                    $item->save();
                }
            }

            if ($model_main->getTable() == 'receipts') {
                CustomerStatement::where('receipt_id', $id)->delete();
            }

            // delete receipt payments
            if ($model_main->getTable() == 'customerpayments') {
                CustomerPaymentByReceipt::where('receipt_id', $id)->delete();
            }

            $model = $model_main->delete();
        }

        return response([
            'message' => 'successfully deleted',
        ]);
    }

    public static function getCodeId($type, $key)
    {
        $auth_user = Auth::user();
        $code = NULL;
        $customer_uniqueId_count = UniqueId::where('user_id', $auth_user->id)
            // ->where('type', 'quotation')
            ->where('type', $type)
            ->select('count')
            ->first();

        if (!isset($customer_uniqueId_count)) {
            $saveUniqueID = [
                'user_id' => $auth_user->id,
                'type' => $type,
                'count' => '1',
            ];
            UniqueId::create($saveUniqueID);
            // $requestData['code'] = "QOT-001";
            $code = "$key-001";
        } else {
            $increment = (int) ( $customer_uniqueId_count->count ) + 1;

            // save after increament
            // UniqueId::where('user_id', $auth_user->id)
            //     ->where('type', $type)
            //     ->update([
            //         'count' => $increment,
            //     ]);

            $increments = sprintf('%03d', $increment);
            // $requestData['code'] = 'QOT-' . $increments;
            $code = "$key-" . $increments;
        }

        // return dd($_REQUEST, $_GET, $_POST, explode('-', request()->get('code'))[1]);
        return $code;
    }

    public static function setCodeId($type)
    {
        if (request()->has('code') && request()->get('code') != null) {

            $new_count = explode('-', request()->get('code'))[1];
            $latest_count = 0;

            if(UniqueId::where('user_id', Auth::user()->id)->where('type', $type)->exists()){
                $latest_count = UniqueId::where('user_id', Auth::user()->id)->where('type', $type)->first();
            }

            // dd(request()->get('code'), $type , $new_count , $latest_count->count);

            // update if given code greater than latest code
            if($new_count > $latest_count->count){
                UniqueId::where('user_id', Auth::user()->id)
                        ->where('type', $type)
                        ->update([
                            'count' => explode('-', request()->get('code'))[1],
                        ]);
            }

        }
    }

    public static function insert_customer_log($info = [])
    {
        $customer_log = CustomerLog::create($info);
        $customer_log->created_at = Carbon::now()->toDateTimeString();
        $customer_log->save();
    }

    public static function insert_supplier_log($info = [])
    {
        $customer_log = SupplierLog::create($info);
        $customer_log->created_at = Carbon::now()->toDateTimeString();
        $customer_log->save();
    }

    public static function delete_customer_log($info = [])
    {
        CustomerLog::where('customer_id', $info['customer_id'])
            ->where('creator', $info['creator'])
            ->where('type', $info['type'])
            ->where('type_id', $info['type_id'])
            ->delete();

        if ($info['type'] == 'quotes') {
            SalesLog::where('quote_id', $info['type_id'],)->update([
                'is_quote' => null,
                'quote_code' => null,
                'quote_id' => null,
                'quote_description' => null,
            ]);
        }

        if ($info['type'] == 'saleorders') {
            SalesLog::where('sales_order_id', $info['type_id'],)->update([
                'is_sales_order' => null,
                'sales_order_id' => null,
                'sales_order_code' => null,
                'sales_order_description' => null,
            ]);
        }

        if ($info['type'] == 'deliverynotes') {
            SalesLog::where('delivery_note_id', $info['type_id'],)->update([
                'is_delivery_note' => null,
                'delivery_note_id' => null,
                'delivery_note_code' => null,
                'delivery_note_description' => null,
            ]);
        }

        if ($info['type'] == 'invoices') {
            SalesLog::where('invoice_id', $info['type_id'],)->update([
                'is_invoice' => null,
                'invoice_id' => null,
                'invoice_code' => null,
                'invoice_description' => null,
            ]);
        }
    }

    public static function file_upload_to_image_files($file_upload_info = [])
    {
        if (count($file_upload_info['files']) > 0) {

            $t = 1;
            $file_upload_info = (object) $file_upload_info;
            foreach ($file_upload_info->files as $file) {
                if (isset($file['type_id'])) {
                    $imageData = [
                        'user_id' => $file_upload_info->user_id,
                        'customer_id' => $file_upload_info->customer_id,
                        'type' => $file_upload_info->type,
                        'type_id' => $file_upload_info->type_id,
                        'name' => $file['name'],
                        'path' => '/images/',
                        'image' => $file['image'],
                    ];
                    ImageFile::create($imageData);
                } else {
                    $name = $t++ . "." . time() . '.' . explode('/', explode(':', substr($file['image'], 0, strpos($file['image'], ';')))[1])[1];

                    $extension = explode('/', explode(';', $file['image'])[0])[1];
                    if ($extension == "pdf") {
                        $image = str_replace('data:application/' . $extension . ';base64,', '', $file['image']);
                        $image = str_replace(' ', '+', $image);
                        \File::put(public_path() . '/images/' . $name, base64_decode($image));
                    } else {
                        Image::make($file['image'])->save(public_path('images/') . $name);
                    }

                    $imageData = [
                        'user_id' => $file_upload_info->user_id,
                        'customer_id' => $file_upload_info->customer_id,
                        'type' => $file_upload_info->type,
                        'type_id' => $file_upload_info->type_id,
                        'name' => $name,
                        'path' => '/images/',
                        'image' => '/images/' . $name,
                    ];

                    ImageFile::create($imageData);
                }
            }
        }
    }

    public static function related_product_insert($products, $type_name, $type_id)
    {
        foreach ($products as $key => $item) {
            $item = (object) $item;
            $related_product = new RelatedProduct();
            if (isset($item->product_id)) {
                $related_product->product_id = $item->product_id;
            } else {
                $related_product->product_id = $item->id;
            }
            $related_product->type_name = $type_name;
            $related_product->type_id = $type_id;
            $related_product->code = $item->code;
            $related_product->name = $item->name;
            $related_product->description = $item->description;
            $related_product->sales_price = $item->sales_price;
            $related_product->purchase_price = $item->purchase_price;
            $related_product->qty = $item->qty;
            if ($type_name == 'saleorders') {
                $related_product->ordered_qty = $item->qty;
            }
            if ($type_name == 'delivery_note' && isset($item->ordered_qty)) {
                $related_product->ordered_qty = $item->ordered_qty;
            }
            $related_product->disc = $item->disc;
            $related_product->total_price = $item->total_price;
            $related_product->vat_on_sales = $item->vat_on_sales;

            if (isset($item->selected_select2_tax_and_vat)) {
                $related_product->selected_select2_tax_and_vat = json_encode($item->selected_select2_tax_and_vat);
            }

            if (isset($item->vat_info)) {
                $related_product->vat_info = json_encode($item->vat_info);
            }

            $related_product->creator = Auth::user()->id;
            $related_product->created_at = Carbon::now()->toDateTimeString();
            $related_product->save();
            $related_product->slug = $related_product->id . uniqid(10);
            $related_product->save();
        }
    }
}
