<?php

namespace App\Http\Controllers\Admin;

use App\CustomerPaymentByReceipt;
use App\Http\Controllers\Controller;
use App\Model\CustomerPaymentByReceipt as ModelCustomerPaymentByReceipt;
use Illuminate\Http\Request;
use App\Model\Customerpayments;
use App\Model\CustomerStatement;
use App\Model\Invoices;
use App\Model\Receipts;
use App\Model\UniqueId;
use App\RecieptExpense;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CustomerpaymentsController extends Controller
{
    public function get(Request $request, $id)
    {
        return Customerpayments::findOrFail($id);
    }

    public function search(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        return Invoices::where('creator', Auth::user()->id)->whereBetween('date', [$start_date, $end_date])->where('status', 'unpaid')->get();
    }

    public function get_start_end_date()
    {
        $start_date = Carbon::now()->subDays(30)->format('Y-m-d');
        $end_date = Carbon::now()->format('Y-m-d');
        return response()->json([
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);
    }

    public function list(Request $request)
    {
        if ($request->status == 'paid') {
            $datas =  Customerpayments::where('status', 'paid')->orderBy('id','DESC')->paginate(10);
        } elseif ($request->status == 'unpaid') {
            $datas =  Customerpayments::where('status', 'unpaid')->orderBy('id','DESC')->paginate(10);
        } elseif ($request->status == 'cancel') {
            $datas =  Customerpayments::where('status', 'cancel')->orderBy('id','DESC')->paginate(10);
        } else {
            $datas = Customerpayments::orderBy('id','DESC')->paginate(10);
        }

        $all_count = Customerpayments::count();
        $unpaid_count = Customerpayments::where('status', 'unpaid')->count();
        $paid_count = Customerpayments::where('status', 'paid')->count();
        $cancel_count = Customerpayments::where('status', 'cancel')->count();

        return response()->json([
            'datas' => $datas,
            'all_count' => $all_count,
            'unpaid_count' => $unpaid_count,
            'paid_count' => $paid_count,
            'cancel_count' => $cancel_count,
        ]);
    }

    public function create(Request $request)
    {

        // return dd($request->all());
        $validatedData = $request->validate([
            // 'payment_method' => ['required'],
            // 'bank_reference' => ['required'],
        ], []);

        $invoice = Invoices::findOrFail($request->invoice_id);
        $payment_receipt = Receipts::findOrFail($request->receipt_id);

        $status = 'unpaid';
        $invoice->paid += $request->paid;
        $invoice->status = $status;
        $invoice->remaining = $request->remaining;

        if ($request->remaining == 0) {
            $status = 'paid';
            $invoice->status = $status;
        }

        $invoice->save();

        $requestData = $request->all();
        $requestData['invoice_code'] = $invoice->code;
        $requestData['invoice_id'] = $invoice->id;
        $requestData['receipt_code'] = $payment_receipt->code;
        $requestData['receipt_id'] = $payment_receipt->id;
        $requestData['code'] = NULL;
        $requestData['status'] = $status;
        $request->code = NULL;
        if (!isset($request->code)) {
            //business_code is not set
            $requestData['code'] = CommonController::getCodeId('customer_payment', 'IPAY');
        } else {
            //business_code is set
            $requestData['code'] = $request->code;
        }
        // create payment
        $customerpayments = Customerpayments::create($requestData);

        // create receipt expense
        RecieptExpense::insert([
            'user_id' => Auth::user()->id,
            'customer_id' => $payment_receipt->customer_id,
            'receipt_id' => $payment_receipt->id,
            'amount' => $customerpayments->paid,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        // create customer receipt payment statement
        $customer_payment_by_receipt = new ModelCustomerPaymentByReceipt();
        $customer_payment_by_receipt->customer_payment_id = $customerpayments->id;
        $customer_payment_by_receipt->receipt_id = $payment_receipt->id;
        $customer_payment_by_receipt->invoice_id = $invoice->id;
        $customer_payment_by_receipt->amount = $customerpayments->paid;
        $customer_payment_by_receipt->creator = Auth::user()->id;
        $customer_payment_by_receipt->created_at = Carbon::now()->toDateTimeString();
        $customer_payment_by_receipt->save();

        // create customer statement
        if (CustomerStatement::where('receipt_id', $payment_receipt->id)->exists()) {
            $statement = CustomerStatement::where('receipt_id', $payment_receipt->id)->first();
            $applied_to = $statement->receipt_appliedto;
            if ($applied_to) {
                $applied_to = json_decode($applied_to);
                array_push($applied_to, ['invoice_id' => $invoice->id, 'code' => $invoice->code]);
                $statement->receipt_appliedto = json_encode($applied_to);
                $statement->save();
            } else {
                $applied_to = [];
                array_push($applied_to, ['invoice_id' => $invoice->id, 'code' => $invoice->code]);
                $statement->receipt_appliedto = json_encode($applied_to);
                $statement->save();
            }
        }

        // create log
        CommonController::insert_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $customerpayments->customer_id,
            'type' => 'customerpayments',
            'type_id' => $customerpayments->id
        ]);

        return $customerpayments;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([], []);
        $customerpayments = Customerpayments::findOrFail($id);
        $input = $request->all();
        $customerpayments->fill($input)->save();
        ModelCustomerPaymentByReceipt::where('receipt_id',$id)->update([
            'amount' => $customerpayments->paid
        ]);

        CommonController::delete_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $customerpayments->customer_id,
            'type' => 'customerpayments',
            'type_id' => $customerpayments->id
        ]);

        CommonController::insert_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $customerpayments->customer_id,
            'type' => 'customerpayments',
            'type_id' => $customerpayments->id
        ]);
        return $customerpayments;
    }

    public function delete($id)
    {
        $customerpayments = Customerpayments::findOrFail($id);

        $invoice = Invoices::findOrFail($customerpayments->invoice_id);
        $invoice->paid -= $customerpayments->paid;
        $invoice->status = 'unpaid';
        $invoice->remaining += $customerpayments->paid;
        $invoice->save();

        ModelCustomerPaymentByReceipt::where('receipt_id',$id)->delete();

        CommonController::delete_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $customerpayments->customer_id,
            'type' => 'customerpayments',
            'type_id' => $customerpayments->id
        ]);

        $customerpayments->delete();
    }

    public function deleteMultiple(Request $request)
    {

        $ids = $request->checked_id;

        foreach ($ids as $id) {
            $customerpayments = Customerpayments::findOrFail($id);

            if (Invoices::where('id', $customerpayments->invoice_id)->exists()) {
                $invoice = Invoices::findOrFail($customerpayments->invoice_id);
                $invoice->paid -= $customerpayments->paid;
                $invoice->status = 'unpaid';
                $invoice->remaining += $customerpayments->paid;
                $invoice->save();
            }

            ModelCustomerPaymentByReceipt::where('receipt_id',$id)->delete();

            CommonController::delete_customer_log([
                'creator' => Auth::user()->id,
                'customer_id' => $customerpayments->customer_id,
                'type' => 'customerpayments',
                'type_id' => $customerpayments->id
            ]);

            $customerpayments->delete();

        }
    }


    public function customerpayments_sort(Request $request)
    {
        $quotes = Customerpayments::orderBy((string) 'payment_date', $request->type)->paginate(10);
        return $quotes;
    }

    public function customerpayments_by_day(Request $request)
    {
        if ($request->type == 'by_day') {
            if ($request->key == 'today') {
                return Customerpayments::whereDay('created_at', Carbon::now()->today())->paginate(10);
            }
            if ($request->key == 'this_month') {
                return Customerpayments::whereMonth('created_at', Carbon::now()->month)->paginate(10);
            }
            if ($request->key == 'this_year') {
                return Customerpayments::whereYear('created_at', Carbon::now()->year)->paginate(10);
            }
        }

        if ($request->type == 'by_sub_day') {
            if ($request->key == 'last_week') {
                $date = \Carbon\Carbon::today()->subDays(7);
                return Customerpayments::where('created_at', '>=', $date)->paginate(10);
            }
            if ($request->key == 'last_month') {
                $date = \Carbon\Carbon::today()->subDays(30);
                return Customerpayments::where('created_at', '>=', $date)->paginate(10);
            }
            if ($request->key == 'last_year') {
                $date = \Carbon\Carbon::today()->subDays(365);
                return Customerpayments::where('created_at', '>=', $date)->paginate(10);
            }
        }
        return $this->list($request);
    }

    public function customerpayments_search(Request $request)
    {
        $key = $request->key;
        $Invoices = Customerpayments::where('customer', $key)
            ->orWhere('customer', 'like', '%' . $key . '%')
            ->orWhere('code', 'like', '%' . $key . '%')
            ->orWhere('invoice_code', 'like', '%' . $key . '%')
            ->orWhere('paid', 'like', '%' . $key . '%')
            ->orWhere('remaining', 'like', '%' . $key . '%')
            ->paginate(10);
        return $Invoices;
    }
}
