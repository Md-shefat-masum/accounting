<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Customers;
use App\Model\ImageFile;
use App\Model\QuoteProduct;
use Illuminate\Http\Request;
use App\Model\Quotes;
use App\Model\RelatedProduct;
use App\Model\SalesLog;
use App\Model\UniqueId;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class QuotesController extends Controller
{
    public function get(Request $request, $id)
    {
        $quotes = Quotes::where('id',$id)->with('sales_log','delivery_address_info','creator_info')->first();
        $selected_products = RelatedProduct::where('type_name','quotes')->where('type_id', $id)->with('product_details')->get();
        $customer_info = Customers::where('id', $quotes->customer_id)->with([
                                    'country_name',
                                    'contacts',
                                    'files','sale_receipts','projects'
                                ])->first();

        return response()->json([
            'quotes' => $quotes,
            'selected_products' => $selected_products,
            'customer_info' => $customer_info,
        ]);
    }

    public function list(Request $request)
    {
        Quotes::where('expiration_date','<',Carbon::now()->toDateString())->update([
            'status' => 'lost'
        ]);

        if ($request->status == 'open') {
            $datas = Quotes::latest()->where('status', 'open')->with('sales_log')->orderBy('id','DESC')->paginate(10);
        } elseif ($request->status == 'won') {
            $datas = Quotes::latest()->where('status', 'won')->with('sales_log')->orderBy('id','DESC')->paginate(10);
        } elseif ($request->status == 'lost') {
            $datas = Quotes::latest()->where('status', 'lost')->with('sales_log')->orderBy('id','DESC')->paginate(10);
        } else {
            $datas = Quotes::latest()->with('sales_log')->orderBy('id','DESC')->paginate(10);
        }

        $quotes_count = Quotes::count();
        $open_quotes_count = Quotes::where('status', 'open')->count();
        $won_quotes_count = Quotes::where('status', 'won')->count();
        $lost_quotes_count = Quotes::where('status', 'lost')->count();

        return response()->json([
            'datas' => $datas,
            'quotes_count' => $quotes_count,
            'open_quotes_count' => $open_quotes_count,
            'won_quotes_count' => $won_quotes_count,
            'lost_quotes_count' => $lost_quotes_count,
        ]);
    }

    public function create(Request $request)
    {
        // return dd($request->all());

        $validatedData = $request->validate([
            'customer' => 'required |max:255 ',
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

        $products = $request->selected_products;

        $requestData = $request->except(['files', 'attachments']);
        // $requestData['code'] = NULL;
        // $requestData['creator'] = Auth::user()->id;
        $auth_user = Auth::user();
        if (!isset($request->code)) {
            CommonController::getCodeId('quotation', 'QOT');
        } else {
            //business_code is set
            $requestData['code'] = $request->code;
        }

        $quotes = Quotes::create($requestData);
        $quotes->creator = Auth::user()->id;
        $quotes->created_at = Carbon::now()->toDateTimeString();
        $quotes->save();

        $sales_log_id = SalesLog::insertGetId([
            'creator' => Auth::user()->id,
            'customer_id' => $quotes->customer_id,
            'is_quote' => 1,
            'quote_id' => $quotes->id,
            'quote_code' => $quotes->code,
            'quote_description' => 'new quote creation',
        ]);

        $quotes->sales_log_id = $sales_log_id;
        $quotes->save();

        CommonController::related_product_insert($products,'quotes',$quotes->id);

        $requestImage = $request->all();

        if (isset($requestImage['files'])) {
            CommonController::file_upload_to_image_files(
                [
                    'files' => $requestImage['files'],
                    'user_id' => Auth::user()->id,
                    'customer_id' => $quotes->customer_id,
                    'type' => 'quotes',
                    'type_id' => $quotes->id
                ]
            );
        }

        CommonController::insert_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $quotes->customer_id,
            'type' => 'quotes',
            'type_id' => $quotes->id
        ]);

        return $quotes;
    }

    public function update(Request $request, $id)
    {
        // return dd($request->all());

        $validatedData = $request->validate([
            'customer' => 'required |max:255 ',
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

        $quotes = Quotes::findOrFail($id);

        $products = $request->selected_products;

        $requestData = $request->except(['files', 'attachments']);
        $auth_user = Auth::user();
        if (!isset($request->code)) {
            //business_code is not set
            $customer_uniqueId_count = UniqueId::where('user_id', $auth_user->id)
                ->where('type', 'quotation')
                ->select('count')
                ->first();

            if (!isset($customer_uniqueId_count)) {
                $saveUniqueID = [
                    'user_id' => $auth_user->id,
                    'type' => 'quotation',
                    'count' => '1',
                ];
                UniqueId::create($saveUniqueID);
                $requestData['code'] = 'QOT-001';
            } else {
                $increment = (int) $customer_uniqueId_count->count + 1;

                UniqueId::where('user_id', $auth_user->id)
                    ->where('type', 'quotation')
                    ->update([
                        'count' => $increment,
                    ]);
                $increments = sprintf('%03d', $increment);
                $requestData['code'] = 'QOT-' . $increments;
            }
        } else {
            //business_code is set
            $requestData['code'] = $request->code;
        }

        $quotes->fill($requestData)->save();
        $quotes->updated_at = Carbon::now()->toDateTimeString();
        $quotes->save();

        RelatedProduct::where('type_name','quotes')->where('type_id', $quotes->id)->delete();
        CommonController::related_product_insert($products,'quotes',$quotes->id);

        // CommonController::delete_customer_log([
        //     'creator' => Auth::user()->id,
        //     'customer_id' => $quotes->customer_id,
        //     'type' => 'quotes',
        //     'type_id' => $quotes->id
        // ]);

        // CommonController::insert_customer_log([
        //     'creator' => Auth::user()->id,
        //     'customer_id' => $quotes->customer_id,
        //     'type' => 'quotes',
        //     'type_id' => $quotes->id
        // ]);

        $requestImage = $request->all();
        if (isset($requestImage['files'])) {
            ImageFile::where('type', 'quotes')->where('type_id',$quotes->id)->delete();

            CommonController::file_upload_to_image_files(
                [
                    'files' => $requestImage['files'],
                    'user_id' => Auth::user()->id,
                    'customer_id' => $quotes->customer_id,
                    'type' => 'quotes',
                    'type_id' => $quotes->id
                ]
            );
        }

        return $quotes;
    }

    public function delete($id)
    {
        $quotes = Quotes::findOrFail($id);

        if($quotes->sales_log()){
            $log = $quotes->sales_log()->first();

            if($log && ( $log->is_sales_order != null || $log->is_delivery_note != null || $log->is_invoice != null ) ){
                throw new ModelNotFoundException('quotation is related to another document');
            }else{
                CommonController::delete_customer_log([
                    'creator' => Auth::user()->id,
                    'customer_id' => $quotes->customer_id,
                    'type' => 'quotes',
                    'type_id' => $quotes->id
                ]);

                RelatedProduct::where('type_id', $quotes->id)->delete();

                $quotes->delete();
            }
        }
    }

    public function qutation_sort(Request $request)
    {
        $quotes = Quotes::orderBy((string) $request->key, $request->type)->paginate(10);
        return $quotes;
    }

    public function qutation_by_day(Request $request)
    {

        if ($request->type == 'by_day') {
            if ($request->key == 'today') {
                return Quotes::whereDay('created_at', Carbon::now()->today())->paginate(10);
            }
            if ($request->key == 'this_month') {
                return Quotes::whereMonth('created_at', Carbon::now()->month)->paginate(10);
            }
            if ($request->key == 'this_year') {
                return Quotes::whereYear('created_at', Carbon::now()->year)->paginate(10);
            }
        }

        if ($request->type == 'by_sub_day') {
            if ($request->key == 'last_week') {
                $date = \Carbon\Carbon::today()->subDays(7);
                return Quotes::where('created_at', '>=', $date)->paginate(10);
            }
            if ($request->key == 'last_month') {
                $date = \Carbon\Carbon::today()->subDays(30);
                return Quotes::where('created_at', '>=', $date)->paginate(10);
            }
            if ($request->key == 'last_year') {
                $date = \Carbon\Carbon::today()->subDays(365);
                return Quotes::where('created_at', '>=', $date)->paginate(10);
            }
        }
        return $this->list($request);
    }

    public function quotes_search(Request $request)
    {
        $key = $request->key;
        $quotes = Quotes::where('customer', $key)
            ->orWhere('customer', 'like', '%' . $key . '%')
            ->orWhere('code', 'like', '%' . $key . '%')
            ->orWhere('total', 'like', '%' . $key . '%')
            ->paginate(10);
        return $quotes;
    }

    public function update_qutation_status(Request $request)
    {
        $quotes = Quotes::find($request->id);
        $quotes->status = $request->status;
        $quotes->save();
        return $quotes;
    }
}
