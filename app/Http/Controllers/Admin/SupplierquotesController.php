<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Admin\CommonController;
use App\Model\PurchaseLog;
use App\Model\SupplierQuoteProduct;
use Illuminate\Http\Request;
use App\Model\Supplierquotes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SupplierquotesController extends Controller
{
    public function get(Request $request, $id){
      return Supplierquotes::findOrFail($id);
    }

    public function list(Request $request){
      return Supplierquotes::orderBy('id','DESC')->paginate(10);
    }

    public function create(Request $request)
    {
        // return dd($request->all());
        $validatedData = $request->validate([
            'supplier' => 'required |max:255 ',
            'address' => 'required',
            'date' => 'required |max:255 ',
            'expiration_date' => 'required |max:255 ',
            'selected_products' => 'required'
        ], [
            'customer.required' => 'customer is a required field.',
            'customer.max' => 'customer can only be 255 characters.',
            'date.required' => 'date is a required field.',
            'date.max' => 'date can only be 255 characters.',
            'expiration_date.required' => 'expiration_date is a required field.',
            'expiration_date.max' => 'expiration_date can only be 255 characters.',
        ]);

        // echo "<pre>";

        $products = $request->selected_products;

        $requestData = $request->except(['files', 'attachments']);
        // $requestData['code'] = NULL;
        // $requestData['creator'] = Auth::user()->id;
        $auth_user = Auth::user();
        if (!isset($request->code)) {
            CommonController::getCodeId('supplier_quotation', 'SQOT');
        } else {
            //business_code is set
            $requestData['code'] = $request->code;
        }

        $quotes = Supplierquotes::create($requestData);
        $quotes->creator = Auth::user()->id;
        $quotes->created_at = Carbon::now()->toDateTimeString();
        $quotes->save();

        $purchase_log_id = PurchaseLog::insertGetId([
            'creator' => Auth::user()->id,
            'supplier_id' => $quotes->supplier_id,
            'is_quote' => 1,
            'quote_id' => $quotes->id,
            'quote_code' => $quotes->code,
            'quote_description' => 'new supplier quote creation',
        ]);

        $quotes->purchase_log_id = $purchase_log_id;
        $quotes->save();

        foreach ($products as $key => $item) {
            $item = (object) $item;
            // var_dump($item);
            $quote_product = new SupplierQuoteProduct();
            $quote_product->product_id = $item->id;
            $quote_product->quote_id = $quotes->id;
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
        }

        CommonController::insert_supplier_log([
            'creator' => Auth::user()->id,
            'supplier_id' => $quotes->supplier_id,
            'type' => 'quotes',
            'type_id' => $quotes->id
        ]);

        return $quotes;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'supplier' => 'required |max:255 ',
      ],[
        'supplier.required' => 'supplier is a required field.',
        'supplier.max' => 'supplier can only be 255 characters.',
      ]);

        $supplierquotes = Supplierquotes::findOrFail($id);
        $input = $request->all();
        $supplierquotes->fill($input)->save();
        return $supplierquotes;
    }

    public function delete(Request $request, $id){
        $supplierquotes = Supplierquotes::findOrFail($id);
        $supplierquotes->delete();
    }
}
 ?>
