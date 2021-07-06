<?php

namespace App\Http\Controllers\Admin;

use App\CustomerStatement;
use App\Http\Controllers\Controller;
use App\Model\InvoiceProduct;
use App\Model\Customers;
use App\Model\CustomerStatement as ModelCustomerStatement;
use App\Model\Deliverynote;
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

class InvoicesController extends Controller
{
    public function get(Request $request, $id)
    {
        $invoice = Invoices::where('creator', Auth::user()->id)->where('id', $id)->with('sales_log', 'delivery_address_info')->first();
        $selected_products = RelatedProduct::where('type_name','invoices')->where('type_id', $id)->with('product_details')->get();
        $customer_info = Customers::where('id', $invoice->customer_id)->with([
            'country_name',
            'contacts',
            'files', 'sale_receipts', 'projects'
        ])->first();

        return response()->json([
            'invoice' => $invoice,
            'selected_products' => $selected_products,
            'customer_info' => $customer_info
        ]);
    }

    public function list(Request $request)
    {
        if ($request->status == 'paid') {
            $datas = Invoices::where('status', 'paid')->where('creator', Auth::user()->id)->with('sales_log')->latest()->paginate(10);
        } elseif ($request->status == 'unpaid') {
            $datas = Invoices::where('status', 'unpaid')->where('creator', Auth::user()->id)->with('sales_log')->latest()->paginate(10);
        } elseif ($request->status == 'cancel') {
            $datas = Invoices::where('status', 'cancel')->where('creator', Auth::user()->id)->with('sales_log')->latest()->paginate(10);
        } else {
            $datas = Invoices::where('creator', Auth::user()->id)->with('sales_log')->latest()->paginate(10);
        }

        $all_invoices_count = Invoices::where('creator', Auth::user()->id)->count();
        $unpaid_invoices_count = Invoices::where('creator', Auth::user()->id)->where('status', 'unpaid')->count();
        $paid_invoices_count = Invoices::where('creator', Auth::user()->id)->where('status', 'paid')->count();
        $cancel_invoices_count = Invoices::where('creator', Auth::user()->id)->where('status', 'cancel')->count();

        return response()->json([
            'datas' => $datas,
            'all_invoices_count' => $all_invoices_count,
            'unpaid_invoices_count' => $unpaid_invoices_count,
            'paid_invoices_count' => $paid_invoices_count,
            'cancel_invoices_count' => $cancel_invoices_count,
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'customer' => 'required |max:255 ',
            'selected_products' => 'required',
        ], [
            'customer.required' => 'customer is a required field.',
            'customer.max' => 'customer can only be 255 characters.',
        ]);

        // echo "<pre>";
        // var_dump($request->request);

        $products = $request->selected_products;

        $requestData = $request->except(['files', 'attachments']);
        $requestData['creator'] = Auth::user()->id;
        $auth_user = Auth::user();
        if (!isset($request->code)) {
            CommonController::getCodeId('invoice', 'INV');
        } else {
            //business_code is set
            $requestData['code'] = $request->code;
        }

        $invoices = Invoices::create($requestData);
        $invoices->invoice_no = $invoices->code;
        $invoices->created_at = Carbon::now()->toDateTimeString();
        $invoices->save();

        CommonController::related_product_insert($products,'invoices',$invoices->id);

        $auth_user = Auth::user();
        $customers = Customers::find($request->customer_id);

        $customer_statement = new ModelCustomerStatement();
        $customer_statement->customer_id = $customers->id;
        $customer_statement->invoice_id = $invoices->id;
        $customer_statement->date = $invoices->date;
        $customer_statement->amount = $invoices->total;
        $customer_statement->creator = Auth::user()->id;
        $customer_statement->created_at = Carbon::now()->toDateTimeString();
        $customer_statement->save();

        if ( $request->has('selected_select2_delivery_notes') && count($request->selected_select2_delivery_notes) > 0) {
            foreach ($request->selected_select2_delivery_notes as $delivery_note_id) {
                if (SalesLog::where('delivery_note_id', (int) $delivery_note_id)->exists()) {
                    $sales_log = SalesLog::where('delivery_note_id', (int) $delivery_note_id)->first();
                    $this->update_sales_log((int) $sales_log->id, $invoices->id, $invoices->code, 'delivery note to invoice', 'delivery_notes');
                }
            }
        }else if ($request->has('quotaion_sales_log_id')) {
            $this->update_sales_log($request->quotaion_sales_log_id, $invoices->id, $invoices->code, 'quotation to invoice', 'quotation');
        } else if ($request->has('delivery_note_sales_log_id')) {
            $this->update_sales_log($request->delivery_note_sales_log_id, $invoices->id, $invoices->code, 'delivery note to invoice', 'delivery_notes');
        } else if ($request->has('sales_order_sales_log_id')) {
            $this->update_sales_log($request->sales_order_sales_log_id, $invoices->id, $invoices->code, 'sales order to invoice', 'sales_order');
        } else {
            SalesLog::insertGetId([
                'creator' => Auth::user()->id,
                'customer_id' => $invoices->customer_id,
                'is_invoice' => 1,
                'invoice_id' => $invoices->id,
                'invoice_code' => $invoices->code,
                'invoice_description' => 'new sales invoice creation',
            ]);
        }

        CommonController::insert_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $invoices->customer_id,
            'type' => 'invoices',
            'type_id' => $invoices->id
        ]);

        $requestImage = $request->all();
        if (isset($requestImage['files'])) {
            CommonController::file_upload_to_image_files(
                [
                    'files' => $requestImage['files'],
                    'user_id' => Auth::user()->id,
                    'customer_id' => $invoices->customer_id,
                    'type' => 'invoices',
                    'type_id' => $invoices->id
                ]
            );
        }

        return $invoices;
    }

    public function update_sales_log($log_info_id, $invoice_id, $invoice_code, $description, $model)
    {
        $sales_log = SalesLog::find($log_info_id);
        $sales_log->is_invoice = 1;
        $sales_log->invoice_id = $invoice_id;
        $sales_log->invoice_code = $invoice_code;
        $sales_log->invoice_description = $description;
        $sales_log->save();

        if ($model == 'quotation') {
            Quotes::where('id', $sales_log->quote_id)->update([
                'status' => 'won'
            ]);
        }

        if ($model == 'delivery_notes') {
            Deliverynote::where('id', $sales_log->delivery_note_id)->update([
                'status' => 'invoiced'
            ]);
        }

        if ($model == 'sales_order') {
            Saleorders::where('id', $sales_log->sales_order_id)->update([
                'status' => 'invoiced',
                'is_invoiced' => 1,
            ]);
        }
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

        $invoices = Invoices::findOrFail($id);
        $input = $request->except(['files', 'attachments']);
        $invoices->fill($input)->save();

        $products = $request->selected_products;
        RelatedProduct::where('type_name','invoices')->where('type_id', $invoices->id)->delete();
        CommonController::related_product_insert($products,'invoices',$invoices->id);

        CommonController::delete_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $invoices->customer_id,
            'type' => 'invoices',
            'type_id' => $invoices->id
        ]);

        CommonController::insert_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $invoices->customer_id,
            'type' => 'invoices',
            'type_id' => $invoices->id
        ]);

        $auth_user = Auth::user();
        $customers = Customers::find($invoices->customer_id);
        $customer_statement = new ModelCustomerStatement();
        $customer_statement->customer_id = $customers->id;
        $customer_statement->invoice_id = $invoices->id;
        $customer_statement->date = $invoices->date;
        $customer_statement->amount = $invoices->total;
        $customer_statement->creator = Auth::user()->id;
        $customer_statement->created_at = Carbon::now()->toDateTimeString();
        $customer_statement->save();

        $requestImage = $request->all();
        if (isset($requestImage['files'])) {
            ImageFile::where('type', 'invoices')->where('type_id', $invoices->id)->delete();

            CommonController::file_upload_to_image_files(
                [
                    'files' => $requestImage['files'],
                    'user_id' => Auth::user()->id,
                    'customer_id' => $invoices->customer_id,
                    'type' => 'invoices',
                    'type_id' => $invoices->id
                ]
            );
        }

        return $invoices;
    }

    public function delete(Request $request, $id)
    {
        $invoices = Invoices::findOrFail($id);
        RelatedProduct::where('type_name','invoices')->where('type_id', $invoices->id)->delete();

        ModelCustomerStatement::where('invoice_id', $invoices->id)->delete();
        $temp_array = [
            'invoice_id' => $invoices->id,
            'code' => $invoices->code,
        ];
        $invoice_receipt_statements = ModelCustomerStatement::where('receipt_appliedto', '!=', null)
            ->where('receipt_appliedto', '!=', null)
            ->where('receipt_appliedto', 'LIKE', '%' . json_encode($temp_array) . '%')
            ->get();
        foreach ($invoice_receipt_statements as $item) {
            $item->receipt_appliedto = str_replace(json_encode($temp_array), '', $item->receipt_appliedto);
            $item->save();
        }

        CommonController::delete_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $invoices->customer_id,
            'type' => 'invoices',
            'type_id' => $invoices->id
        ]);

        $invoices->delete();
    }


    public function invoices_sort(Request $request)
    {
        $quotes = Invoices::orderBy((string) $request->key, $request->type)->paginate(10);
        return $quotes;
    }

    public function invoices_by_day(Request $request)
    {
        if ($request->type == 'by_day') {
            if ($request->key == 'today') {
                return Invoices::whereDay('created_at', Carbon::now()->today())->paginate(10);
            }
            if ($request->key == 'this_month') {
                return Invoices::whereMonth('created_at', Carbon::now()->month)->paginate(10);
            }
            if ($request->key == 'this_year') {
                return Invoices::whereYear('created_at', Carbon::now()->year)->paginate(10);
            }
        }

        if ($request->type == 'by_sub_day') {
            if ($request->key == 'last_week') {
                $date = \Carbon\Carbon::today()->subDays(7);
                return Invoices::where('created_at', '>=', $date)->paginate(10);
            }
            if ($request->key == 'last_month') {
                $date = \Carbon\Carbon::today()->subDays(30);
                return Invoices::where('created_at', '>=', $date)->paginate(10);
            }
            if ($request->key == 'last_year') {
                $date = \Carbon\Carbon::today()->subDays(365);
                return Invoices::where('created_at', '>=', $date)->paginate(10);
            }
        }
        return $this->list($request);
    }

    public function invoices_search(Request $request)
    {
        $key = $request->key;
        $Invoices = Invoices::where('customer', $key)
            ->orWhere('customer', 'like', '%' . $key . '%')
            ->orWhere('code', 'like', '%' . $key . '%')
            ->orWhere('total', 'like', '%' . $key . '%')
            ->paginate(10);
        return $Invoices;
    }
}
