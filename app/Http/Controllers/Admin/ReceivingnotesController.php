<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Admin\CommonController;
use App\Model\ProductServiceLog;
use App\Model\PurchaseLog;
use App\Model\ReceivingnoteProduct;
use Illuminate\Http\Request;
use App\Model\Receivingnotes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReceivingnotesController extends Controller
{
    public function get(Request $request, $id)
    {
        $notes = Receivingnotes::where("id",$id)->with('purchase_log')->first();
        $selected_products = ReceivingnoteProduct::where('receivingnote_id',$notes->id)->get();
        return response()->json([
            'notes' => $notes,
            'selected_products' => $selected_products,
        ]);
    }

    public function list(Request $request)
    {
        if ($request->status == 'billed') {
            $datas = Receivingnotes::orderBy('id','DESC')->where('status', 'billed')->with('purchase_log')->paginate(10);
        } elseif ($request->status == 'not billed') {
            $datas = Receivingnotes::orderBy('id','DESC')->where('status', 'not billed')->with('purchase_log')->paginate(10);
        } else {
            $datas = Receivingnotes::orderBy('id','DESC')->with('purchase_log')->paginate(10);
        }

        $note_count = Receivingnotes::count();
        $billed_note_count = Receivingnotes::where('status', 'billed')->count();
        $not_billed_note_count = Receivingnotes::where('status', 'not billed')->count();

        return response()->json([
            'datas' => $datas,
            'note_count' => $note_count,
            'billed_note_count' => $billed_note_count,
            'not_billed_note_count' => $not_billed_note_count,
        ]);
        // return Receivingnotes::get();
    }

    public function create(Request $request)
    {

        // return dd($request->all());
        $validatedData = $request->validate([
            'supplier' => 'required |max:255 ',
        ], [
            'supplier.required' => 'supplier is a required field.',
            'supplier.max' => 'supplier can only be 255 characters.',
            'address.required' => 'address is a required field.',
            'address.max' => 'address can only be 255 characters.',
            'recipient.required' => 'recipient is a required field.',
            'recipient.max' => 'recipient can only be 255 characters.',
            'ref_number.required' => 'ref_number is a required field.',
            'ref_number.max' => 'ref_number can only be 255 characters.',
            'date.required' => 'date is a required field.',
            'date.max' => 'date can only be 255 characters.',
            'payment_terms.required' => 'payment_terms is a required field.',
            'payment_terms.max' => 'payment_terms can only be 255 characters.',
            'currency.required' => 'currency is a required field.',
            'currency.max' => 'currency can only be 255 characters.',
            'is_product.required' => 'is_product is a required field.',
            'is_product.max' => 'is_product can only be 255 characters.',
            'document_note.required' => 'document_note is a required field.',
            'document_note.max' => 'document_note can only be 255 characters.',
            'subtotal.required' => 'subtotal is a required field.',
            'subtotal.max' => 'subtotal can only be 255 characters.',
            'discount_rate.required' => 'discount_rate is a required field.',
            'discount_rate.max' => 'discount_rate can only be 255 characters.',
            'discount_amount.required' => 'discount_amount is a required field.',
            'discount_amount.max' => 'discount_amount can only be 255 characters.',
            'vat.required' => 'vat is a required field.',
            'vat.max' => 'vat can only be 255 characters.',
            'total.required' => 'total is a required field.',
            'total.max' => 'total can only be 255 characters.',
            'delivery_date.required' => 'delivery_date is a required field.',
            'delivery_date.max' => 'delivery_date can only be 255 characters.',
            'expected_delivery.required' => 'expected_delivery is a required field.',
            'expected_delivery.max' => 'expected_delivery can only be 255 characters.',
            'type.required' => 'type is a required field.',
            'type.max' => 'type can only be 255 characters.',
            'delivery_address.required' => 'delivery_address is a required field.',
            'delivery_address.max' => 'delivery_address can only be 255 characters.',
            'project.required' => 'project is a required field.',
            'project.max' => 'project can only be 255 characters.',
            'delivery_status.required' => 'delivery_status is a required field.',
            'delivery_status.max' => 'delivery_status can only be 255 characters.',
            'invoicing_status.required' => 'invoicing_status is a required field.',
            'invoicing_status.max' => 'invoicing_status can only be 255 characters.',
            'assigned_to.required' => 'assigned_to is a required field.',
            'assigned_to.max' => 'assigned_to can only be 255 characters.',
            'private_note.required' => 'private_note is a required field.',
            'private_note.max' => 'private_note can only be 255 characters.',
            'attachments.required' => 'attachments is a required field.',
            'attachments.max' => 'attachments can only be 255 characters.',
        ]);

        $products = $request->selected_products;

        $requestData = $request->except(['files', 'attachments']);
        // $requestData['code'] = NULL;
        // $requestData['creator'] = Auth::user()->id;
        $auth_user = Auth::user();
        if (!isset($request->code)) {
            CommonController::getCodeId('receiving_notes', 'Rec');
        } else {
            //business_code is set
            $requestData['code'] = $request->code;
        }

        $receiveNote = Receivingnotes::create($requestData);
        $receiveNote->creator = Auth::user()->id;
        $receiveNote->created_at = Carbon::now()->toDateTimeString();
        $receiveNote->save();

        $purchase_log_id = PurchaseLog::insertGetId([
            'creator' => Auth::user()->id,
            'supplier_id' => $receiveNote->supplier_id,
            'is_order' => 1,
            'order_id' => $receiveNote->id,
            'order_code' => $receiveNote->code,
            'order_description' => 'new supplier order creation',
        ]);

        $receiveNote->purchase_log_id = $purchase_log_id;
        $receiveNote->save();

        foreach ($products as $key => $item) {
            $item = (object) $item;
            // var_dump($item);
            $quote_product = new ReceivingnoteProduct();
            $quote_product->product_id = $item->id;
            $quote_product->receivingnote_id = $receiveNote->id;
            $quote_product->code = $item->code;
            $quote_product->name = $item->name;
            $quote_product->description = $item->description;
            $quote_product->sales_price = $item->sales_price;
            $quote_product->purchase_price = $item->purchase_price;
            $quote_product->qty = $item->qty;
            $quote_product->disc = $item->disc;
            $quote_product->total_price = $item->total_price;
            $quote_product->vat_on_sales = $item->vat_on_sales;
            $quote_product->creator = Auth::user()->id;
            $quote_product->created_at = Carbon::now()->toDateTimeString();
            $quote_product->save();
            $quote_product->slug = $quote_product->id . uniqid(10);
            $quote_product->save();

            ProductServiceLog::insert([
                'creator' => Auth::user()->id,
                'product_id' => $item->id,
                'qty' => $item->qty,
                'location' => $item->receiving_location,
                'is_purchase' => 1,
                'receiving_note_id' => $receiveNote->id,
                'supplier_id' => $receiveNote->supplier_id,
                'receive_description' => 'product receive note created.'
            ]);
        }

        CommonController::insert_supplier_log([
            'creator' => Auth::user()->id,
            'supplier_id' => $receiveNote->supplier_id,
            'type' => 'receivingnote',
            'type_id' => $receiveNote->id
        ]);

        return $receiveNote;

        // $receivingnotes = Receivingnotes::create($request->all());
        // return $receivingnotes;
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'supplier' => 'required |max:255 ',
        ], [
            'supplier.required' => 'supplier is a required field.',
            'supplier.max' => 'supplier can only be 255 characters.',
            'address.required' => 'address is a required field.',
            'address.max' => 'address can only be 255 characters.',
            'recipient.required' => 'recipient is a required field.',
            'recipient.max' => 'recipient can only be 255 characters.',
            'ref_number.required' => 'ref_number is a required field.',
            'ref_number.max' => 'ref_number can only be 255 characters.',
            'date.required' => 'date is a required field.',
            'date.max' => 'date can only be 255 characters.',
            'payment_terms.required' => 'payment_terms is a required field.',
            'payment_terms.max' => 'payment_terms can only be 255 characters.',
            'currency.required' => 'currency is a required field.',
            'currency.max' => 'currency can only be 255 characters.',
            'is_product.required' => 'is_product is a required field.',
            'is_product.max' => 'is_product can only be 255 characters.',
            'document_note.required' => 'document_note is a required field.',
            'document_note.max' => 'document_note can only be 255 characters.',
            'subtotal.required' => 'subtotal is a required field.',
            'subtotal.max' => 'subtotal can only be 255 characters.',
            'discount_rate.required' => 'discount_rate is a required field.',
            'discount_rate.max' => 'discount_rate can only be 255 characters.',
            'discount_amount.required' => 'discount_amount is a required field.',
            'discount_amount.max' => 'discount_amount can only be 255 characters.',
            'vat.required' => 'vat is a required field.',
            'vat.max' => 'vat can only be 255 characters.',
            'total.required' => 'total is a required field.',
            'total.max' => 'total can only be 255 characters.',
            'delivery_date.required' => 'delivery_date is a required field.',
            'delivery_date.max' => 'delivery_date can only be 255 characters.',
            'expected_delivery.required' => 'expected_delivery is a required field.',
            'expected_delivery.max' => 'expected_delivery can only be 255 characters.',
            'type.required' => 'type is a required field.',
            'type.max' => 'type can only be 255 characters.',
            'delivery_address.required' => 'delivery_address is a required field.',
            'delivery_address.max' => 'delivery_address can only be 255 characters.',
            'project.required' => 'project is a required field.',
            'project.max' => 'project can only be 255 characters.',
            'delivery_status.required' => 'delivery_status is a required field.',
            'delivery_status.max' => 'delivery_status can only be 255 characters.',
            'invoicing_status.required' => 'invoicing_status is a required field.',
            'invoicing_status.max' => 'invoicing_status can only be 255 characters.',
            'assigned_to.required' => 'assigned_to is a required field.',
            'assigned_to.max' => 'assigned_to can only be 255 characters.',
            'private_note.required' => 'private_note is a required field.',
            'private_note.max' => 'private_note can only be 255 characters.',
            'attachments.required' => 'attachments is a required field.',
            'attachments.max' => 'attachments can only be 255 characters.',
        ]);

        $products = $request->selected_products;

        $requestData = $request->except(['files', 'attachments']);
        // $requestData['code'] = NULL;
        // $requestData['creator'] = Auth::user()->id;
        $auth_user = Auth::user();
        if (!isset($request->code)) {
            CommonController::getCodeId('receiving_notes', 'Rec');
        } else {
            //business_code is set
            $requestData['code'] = $request->code;
        }

        $receiveNote = Receivingnotes::findOrFail($id);
        $input = $request->all();
        $receiveNote->fill($input)->save();

        $receiveNote->creator = Auth::user()->id;
        $receiveNote->updated_at = Carbon::now()->toDateTimeString();
        $receiveNote->save();

        ReceivingnoteProduct::where('receivingnote_id',$receiveNote->id)->delete();
        ProductServiceLog::where('receiving_note_id',$receiveNote->id)->delete();

        foreach ($products as $key => $item) {
            $item = (object) $item;
            // var_dump($item);
            $quote_product = new ReceivingnoteProduct();
            $quote_product->product_id = $item->id;
            $quote_product->receivingnote_id = $receiveNote->id;
            $quote_product->code = $item->code;
            $quote_product->name = $item->name;
            $quote_product->description = $item->description;
            $quote_product->sales_price = $item->sales_price;
            $quote_product->purchase_price = $item->purchase_price;
            $quote_product->qty = $item->qty;
            $quote_product->disc = $item->disc;
            $quote_product->total_price = $item->total_price;
            $quote_product->vat_on_sales = $item->vat_on_sales;
            $quote_product->creator = Auth::user()->id;
            $quote_product->created_at = Carbon::now()->toDateTimeString();
            $quote_product->save();
            $quote_product->slug = $quote_product->id . uniqid(10);
            $quote_product->save();

            ProductServiceLog::insert([
                'creator' => Auth::user()->id,
                'product_id' => $item->id,
                'qty' => $item->qty,
                'location' => $item->receiving_location,
                'is_purchase' => 1,
                'receiving_note_id' => $receiveNote->id,
                'supplier_id' => $receiveNote->supplier_id,
                'receive_description' => 'product receive note created.'
            ]);
        }

        return $receiveNote;
    }

    public function delete(Request $request, $id)
    {
        return 'found';
        // $receivingnotes = Receivingnotes::findOrFail($id);
        // $receivingnotes->delete();
    }
}
