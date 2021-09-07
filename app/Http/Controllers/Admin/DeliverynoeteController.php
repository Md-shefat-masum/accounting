<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\InvoiceProduct;
use App\Model\Customers;
use App\Model\Deliverynote;
use App\Model\DeliveryNoteProduct;
use Illuminate\Http\Request;
use App\Model\Invoices;
use App\Model\ImageFile;
use App\Model\Quotes;
use App\Model\RelatedProduct;
use App\Model\Saleorders;
use App\Model\SalesLog;
use App\Model\UniqueId;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class DeliverynoeteController extends Controller
{
    public function get(Request $request, $id)
    {
        $delivery_note = Deliverynote::where('creator', Auth::user()->id)->where('id', $id)->with('sales_log', 'delivery_address_info')->first();
        $selected_products = RelatedProduct::where('type_name', 'delivery_note')->where('type_id', $id)->with('product_details')->get();
        $customer_info = Customers::where('user_id', Auth::user()->id)->where('id', $delivery_note->customer_id)->with([
            'country_name',
            'contacts',
            'files', 'sale_receipts', 'projects'
        ])->first();
        return response()->json([
            'delivery_note' => $delivery_note,
            'selected_products' => $selected_products,
            'customer_info' => $customer_info
        ]);
    }

    public function list(Request $request)
    {

        if ($request->status == 'not invoiced') {
            $datas = Deliverynote::where('creator', Auth::user()->id)->where('status', 'not invoiced')->where('creator', Auth::user()->id)->with('sales_log')->orderBy('id', 'DESC')->paginate(10);
        } elseif ($request->status == 'invoiced') {
            $datas = Deliverynote::where('creator', Auth::user()->id)->where('status', 'invoiced')->where('creator', Auth::user()->id)->with('sales_log')->orderBy('id', 'DESC')->paginate(10);
        } else {
            $datas = Deliverynote::where('creator', Auth::user()->id)->orderBy('id', 'DESC')->where('creator', Auth::user()->id)->with('sales_log')->orderBy('id', 'DESC')->paginate(10);
        }

        $all_count = Deliverynote::where('creator', Auth::user()->id)->where('creator', Auth::user()->id)->count();
        $not_invoiced_count = Deliverynote::where('creator', Auth::user()->id)->where('status', 'not invoiced')->where('creator', Auth::user()->id)->count();
        $invoiced_count = Deliverynote::where('creator', Auth::user()->id)->where('status', 'invoiced')->where('creator', Auth::user()->id)->count();

        return response()->json([
            'datas' => $datas,
            'all_count' => $all_count,
            'not_invoiced_count' => $not_invoiced_count,
            'invoiced_count' => $invoiced_count,
        ]);
    }

    public function not_invoiced_delivery_notes(Request $request, $customer_id)
    {
        if ($request->has('delivery_address_id')) {
            $invoices = Deliverynote::where('creator', Auth::user()->id)
                ->where('status', 'not invoiced')
                ->where('creator', Auth::user()->id)
                ->where('customer_id', $customer_id)
                ->where('delivery_address_id', $request->delivery_address_id)
                ->select('id', 'code')
                ->orderBy('id', 'DESC')
                ->get();
        } else {
            $invoices = Deliverynote::where('creator', Auth::user()->id)
                ->where('status', 'not invoiced')
                ->where('creator', Auth::user()->id)
                ->where('customer_id', $customer_id)
                ->select('id', 'code')
                ->orderBy('id', 'DESC')
                ->get();
        }

        return $invoices;
    }

    public function create(Request $request)
    {
        // return dd($request->all());
        $validatedData = $request->validate([
            'customer' => 'required |max:255 ',
            'selected_products' => 'required',
            'delivery_address' => 'required',
            'code' => 'required|unique:deliverynotes',
            'date' => 'required',
        ],[
            'selected_products.required' => 'empty product list',
            'code.unique' => 'The code has already been taken. you may try '.CommonController::getCodeId('delivery_note', 'DEN'),
        ]);

        if($request->has('delivery_method')
            &&  ( $request->delivery_method == "vehicle" || $request->delivery_method == "truck" ) ){
            $validatedData = $request->validate([
                'vehicle_number' => 'required',
            ]);
        }

        $products = $request->selected_products;

        $requestData = $request->except(['files', 'attachments', 'status']);
        $requestData['status'] = 'not invoiced';
        $requestData['creator'] = Auth::user()->id;

        if (!isset($request->code)) {
            $requestData['code'] = CommonController::getCodeId('delivery_note', 'DEN');
        } else {
            //business_code is set
            $requestData['code'] = $request->code;
            CommonController::setCodeId('delivery_note');
        }

        $delivery_note = Deliverynote::create($requestData);
        $delivery_note->save();

        // save delivery note related products
        CommonController::related_product_insert($products, 'delivery_note', $delivery_note->id);

        CommonController::insert_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $delivery_note->customer_id,
            'type' => 'deliverynotes',
            'type_id' => $delivery_note->id
        ]);

        if ($request->has('sales_order_sales_log_id')) {
            $sales_log = SalesLog::find($request->sales_order_sales_log_id);
            $sales_log->is_delivery_note = 1;
            $sales_log->delivery_note_id = $delivery_note->id;
            $sales_log->delivery_note_code = $delivery_note->code;
            $sales_log->delivery_note_description = 'sales order to delivery note';

            if($sales_log->sales_order_to_deliver_note_list){
                $deliver_note_list = json_decode($sales_log->sales_order_to_deliver_note_list);
            }else{
                $deliver_note_list = [];
            }
            array_push($deliver_note_list, $delivery_note->id);
            $sales_log->sales_order_to_deliver_note_list = json_encode($deliver_note_list);

            $sales_log->save();

            $sales_order = Saleorders::where('id', $sales_log->sales_order_id)->first();
            $delivery_list_info = $sales_order->delivery_list_info != "" ? json_decode($sales_order->delivery_list_info) : [];
            $delivery_note_info = [
                "id" => $delivery_note->id,
                "code" => $delivery_note->code,
                "related_product" => $request->edited_sales_order_related_product_qty,
            ];
            array_push($delivery_list_info, $delivery_note_info);

            if($request->check_all_product_converted_to_note){
                $sales_order->status = 'delivered';
                $sales_order->is_delivered = 1;
            }else{
                $sales_order->delivery_list_info = json_encode($delivery_list_info);
                $sales_order->is_delivered = 0;
                $sales_order->status = 'pertially delivered';
            }

            $sales_order->save();

        } else if ($request->has('invoice_sales_log_id')) {
            $sales_log = SalesLog::find($request->invoice_sales_log_id);
            $sales_log->is_delivery_note = 1;
            $sales_log->delivery_note_id = $delivery_note->id;
            $sales_log->delivery_note_code = $delivery_note->code;
            $sales_log->delivery_note_description = 'invoice to delivery note';
            $sales_log->save();

            $delivery_note->status = 'invoiced';
            $delivery_note->save();
        } else {
            $fields = [
                'creator' => Auth::user()->id,
                'customer_id' => $delivery_note->customer_id,
                'is_delivery_note' => 1,
                'delivery_note_id' => $delivery_note->id,
                'delivery_note_code' => $delivery_note->code,
                'delivery_note_description' => 'new delivery note creation',
            ];
            $sales_log_id = SalesLog::insertGetId($fields);
        }

        $requestImage = $request->all();
        if (isset($requestImage['files'])) {
            CommonController::file_upload_to_image_files(
                [
                    'files' => $requestImage['files'],
                    'user_id' => Auth::user()->id,
                    'customer_id' => $delivery_note->customer_id,
                    'type' => 'delivery_note',
                    'type_id' => $delivery_note->id
                ]
            );
        }

        return $delivery_note;
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'customer' => 'required |max:255 ',
            'selected_products' => 'required',
        ], [
            'customer.required' => 'customer is a required field.',
            'customer.max' => 'customer can only be 255 characters.',
        ]);

        $delivery_note = Deliverynote::findOrFail($id);

        $input = $request->except(['files', 'attachments', 'status']);
        if (!isset($request->code)) {
            $input['code'] = CommonController::getCodeId('delivery_note', 'DEN');
        } else {
            //business_code is set
            $input['code'] = $request->code;
            CommonController::setCodeId('delivery_note');
        }

        $delivery_note->fill($input)->save();

        $products = $request->selected_products;
        RelatedProduct::where('type_name', 'delivery_note')->where('type_id', $delivery_note->id)->delete();
        CommonController::related_product_insert($products, 'delivery_note', $delivery_note->id);

        // CommonController::delete_customer_log([
        //     'creator' => Auth::user()->id,
        //     'customer_id' => $delivery_note->customer_id,
        //     'type' => 'deliverynotes',
        //     'type_id' => $delivery_note->id
        // ]);

        // CommonController::insert_customer_log([
        //     'creator' => Auth::user()->id,
        //     'customer_id' => $delivery_note->customer_id,
        //     'type' => 'deliverynotes',
        //     'type_id' => $delivery_note->id
        // ]);

        $requestImage = $request->all();
        if (isset($requestImage['files'])) {
            ImageFile::where('type', 'delivery_note')->where('type_id', $delivery_note->id)->delete();

            CommonController::file_upload_to_image_files(
                [
                    'files' => $requestImage['files'],
                    'user_id' => Auth::user()->id,
                    'customer_id' => $delivery_note->customer_id,
                    'type' => 'delivery_note',
                    'type_id' => $delivery_note->id
                ]
            );
        }
        return $delivery_note;
    }

    public function delete(Request $request, $id)
    {
        $delivery_note = Deliverynote::findOrFail($id);
        RelatedProduct::where('type_name', 'delivery_note')->where('type_id', $delivery_note->id)->delete();

        CommonController::delete_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $delivery_note->customer_id,
            'type' => 'deliverynotes',
            'type_id' => $delivery_note->id
        ]);

        $delivery_note->delete();
    }

    public function delivery_notes_products($id)
    {
        return RelatedProduct::where('type_name', 'delivery_note')->where('type_id', $id)->get();
    }

    public function delivery_sort(Request $request)
    {
        $quotes = Deliverynote::orderBy((string) $request->key, $request->type)->paginate(10);
        return $quotes;
    }

    public function delivery_by_day(Request $request)
    {
        if ($request->type == 'by_day') {
            if ($request->key == 'today') {
                return Deliverynote::whereDay('created_at', Carbon::now()->today())->paginate(10);
            }
            if ($request->key == 'this_month') {
                return Deliverynote::whereMonth('created_at', Carbon::now()->month)->paginate(10);
            }
            if ($request->key == 'this_year') {
                return Deliverynote::whereYear('created_at', Carbon::now()->year)->paginate(10);
            }
        }

        if ($request->type == 'by_sub_day') {
            if ($request->key == 'last_week') {
                $date = \Carbon\Carbon::today()->subDays(7);
                return Deliverynote::where('created_at', '>=', $date)->paginate(10);
            }
            if ($request->key == 'last_month') {
                $date = \Carbon\Carbon::today()->subDays(30);
                return Deliverynote::where('created_at', '>=', $date)->paginate(10);
            }
            if ($request->key == 'last_year') {
                $date = \Carbon\Carbon::today()->subDays(365);
                return Deliverynote::where('created_at', '>=', $date)->paginate(10);
            }
        }
        return $this->list($request);
    }

    public function delivery_notes_search(Request $request)
    {
        $key = $request->key;
        $Deliverynote = Deliverynote::where('customer', $key)
            ->orWhere('customer', 'like', '%' . $key . '%')
            ->orWhere('code', 'like', '%' . $key . '%')
            ->orWhere('total', 'like', '%' . $key . '%')
            ->paginate(10);
        return $Deliverynote;
    }
}
