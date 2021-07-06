<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Customers;
use App\Model\CustomerStatement;
use App\Model\ImageFile;
use App\Model\Projects;
use Illuminate\Http\Request;
use App\Model\Receipts;
use App\Model\ReceiptSplit;
use App\Model\UniqueId;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ReceiptsController extends Controller
{
    public function get($id)
    {
        return Receipts::with('receipt_splits')->where('user_id', Auth::user()->id)->findOrFail($id);
    }

    public function list(Request $request)
    {
        if ($request->status == 'deposit') {
            $datas = Receipts::where('receipt_status', 'deposit')->where('user_id', Auth::user()->id)->with('receipt_splits')->orderBy('id','DESC')->paginate(10);
        } elseif ($request->status == 'undeposit') {
            $datas = Receipts::where('receipt_status', 'undeposit')->where('user_id', Auth::user()->id)->with('receipt_splits')->orderBy('id','DESC')->paginate(10);
        } else {
            $datas = Receipts::with('receipt_splits')->where('user_id', Auth::user()->id)->orderBy('id','DESC')->paginate(10);
        }

        $all_count = Receipts::where('user_id', Auth::user()->id)->count();
        $undeposit_count = Receipts::where('user_id', Auth::user()->id)->where('receipt_status', 'undeposit')->count();
        $deposit_count = Receipts::where('user_id', Auth::user()->id)->where('receipt_status', 'deposit')->count();

        return response()->json([
            'datas' => $datas,
            'all_count' => $all_count,
            'undeposit_count' => $undeposit_count,
            'deposit_count' => $deposit_count,
        ]);
    }

    public function list_all_by_customer_id(Request $request, $customer_id)
    {
        if ($request->status == 'deposit') {
            $datas = Receipts::where('receipt_status', 'deposit')->where('customer_id', $customer_id)->where('user_id', Auth::user()->id)->with('receipt_splits')->paginate(10);
        } elseif ($request->status == 'undeposit') {
            $datas = Receipts::where('receipt_status', 'undeposit')->where('customer_id', $customer_id)->where('user_id', Auth::user()->id)->with('receipt_splits')->paginate(10);
        } else {
            $datas = Receipts::with('receipt_splits')->where('customer_id', $customer_id)->where('user_id', Auth::user()->id)->paginate(10);
        }

        $all_count = Receipts::where('user_id', Auth::user()->id)->where('customer_id', $customer_id)->count();
        $undeposit_count = Receipts::where('user_id', Auth::user()->id)->where('customer_id', $customer_id)->where('receipt_status', 'undeposit')->count();
        $deposit_count = Receipts::where('user_id', Auth::user()->id)->where('customer_id', $customer_id)->where('receipt_status', 'deposit')->count();

        return response()->json([
            'datas' => $datas,
            'all_count' => $all_count,
            'undeposit_count' => $undeposit_count,
            'deposit_count' => $deposit_count,
        ]);
    }

    public function list_all()
    {
        return Receipts::with('receipt_splits')->where('user_id', Auth::user()->id)->latest()->get();
    }

    public function create(Request $request)
    {
        // return dd($request->all());

        $validatedData = $request->validate([], []);

        $splits = $request->splits;
        $requestData = $request->except(['files', 'attachments', 'splits']);
        $auth_user = Auth::user();

        if (!isset($request->code)) {
            //business_code is not set
            $customer_uniqueId_count = UniqueId::where('user_id', $auth_user->id)
                ->where('type', 'sales_receipts')
                ->select('count')
                ->first();

            if (!isset($customer_uniqueId_count)) {
                $saveUniqueID = [
                    'user_id' => $auth_user->id,
                    'type' => 'sales_receipts',
                    'count' => '1',
                ];
                UniqueId::create($saveUniqueID);
                $requestData['code'] = 'IPAY-001';
            } else {
                $increment = (int) $customer_uniqueId_count->count + 1;

                UniqueId::where('user_id', $auth_user->id)
                    ->where('type', 'sales_receipts')
                    ->update([
                        'count' => $increment,
                    ]);
                $increments = sprintf('%03d', $increment);
                $requestData['code'] = 'IPAY-' . $increments;
            }
        } else {
            //business_code is set
            $requestData['code'] = $request->code;
        }

        $requestData['creator'] = $auth_user->id;
        $requestData['user_id'] = $auth_user->id;
        $receipts = Receipts::create($requestData);
        $receipts->amount = 0;
        $receipts->created_at = Carbon::now()->toDateTimeString();
        $receipts->save();

        foreach ($splits as $key => $item) {
            $item = (object) $item;
            $split = new ReceiptSplit();
            $split->receipt_id = $receipts->id;
            $split->category = $item->category;
            $selected_categories[] = $item->category;
            $split->before_vat = $item->before_vat;
            $split->vat = $item->vat;

            $split->amount = $item->amount;
            // sum total amount
            $receipts->amount += $item->amount;

            $split->note = $item->note;
            $split->creator = Auth::user()->id;
            $split->created_at = Carbon::now()->toDateTimeString();
            $split->save();
        }

        $receipts->save();

        $customer_statement = new CustomerStatement();
        $customer_statement->customer_id = $receipts->customer_id;
        $customer_statement->receipt_id = $receipts->id;
        $customer_statement->date = $receipts->billing_date;
        $customer_statement->amount = $receipts->amount;
        $customer_statement->creator = Auth::user()->id;
        $customer_statement->created_at = Carbon::now()->toDateTimeString();
        $customer_statement->save();

        CommonController::insert_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $receipts->customer_id,
            'type' => 'receipts',
            'type_id' => $receipts->id,
        ]);

        $customers = Customers::find($request->customer_id);
        $requestImage = $request->all();

        if (isset($requestImage['files'])) {
            CommonController::file_upload_to_image_files(
                [
                    'files' => $requestImage['files'],
                    'user_id' => Auth::user()->id,
                    'customer_id' => $receipts->customer_id,
                    'type' => 'sales_receipt',
                    'type_id' => $receipts->id
                ]
            );
        }

        return $receipts;
    }

    public function update(Request $request, $id)
    {
        // return $request->all();

        $validatedData = $request->validate([], []);

        $receipts = Receipts::findOrFail($id);

        $splits = $request->splits;
        $requestData = $request->except(['files', 'attachments', 'splits']);
        $auth_user = Auth::user();

        $receipts->fill($requestData)->save();
        $receipts->amount = 0;
        $receipts->updated_at = Carbon::now()->toDateTimeString();
        $receipts->save();

        ReceiptSplit::where('receipt_id', $id)->delete();
        foreach ($splits as $key => $item) {
            $item = (object) $item;
            $split = new ReceiptSplit();
            $split->receipt_id = $receipts->id;
            $split->category = $item->category;
            $selected_categories[] = $item->category;
            $split->before_vat = $item->before_vat;
            $split->vat = $item->vat;

            $split->amount = $item->amount;
            // sum total amount
            $receipts->amount += $item->amount;

            $split->note = $item->note;
            $split->creator = Auth::user()->id;
            $split->created_at = Carbon::now()->toDateTimeString();
            $split->save();
        }

        $receipts->save();

        $customers = Customers::find($request->customer_id);

        CommonController::delete_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $receipts->customer_id,
            'type' => 'receipts',
            'type_id' => $receipts->id
        ]);

        CommonController::insert_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $receipts->customer_id,
            'type' => 'receipts',
            'type_id' => $receipts->id
        ]);

        $requestImage = $request->all();
        if (isset($requestImage['files'])) {
            ImageFile::where('type', 'sales_receipt')->where('type_id',$receipts->id)->delete();

            CommonController::file_upload_to_image_files(
                [
                    'files' => $requestImage['files'],
                    'user_id' => Auth::user()->id,
                    'customer_id' => $receipts->customer_id,
                    'type' => 'sales_receipt',
                    'type_id' => $receipts->id
                ]
            );
        }


        return $receipts;
    }

    public function delete(Request $request, $id)
    {
        $receipts = Receipts::findOrFail($id);

        CustomerStatement::where('receipt_id', $receipts->id)->delete();

        CommonController::delete_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $receipts->customer_id,
            'type' => 'receipts',
            'type_id' => $receipts->id
        ]);

        ReceiptSplit::where('receipt_id', $id)->delete();
        $receipts->delete();
    }

    public function receipts_projects()
    {
        return Projects::get();
    }

    public function receipts_sort(Request $request)
    {
        if ($request->key == 'date') {
            $request->key = 'billing_date';
        }
        $quotes = Receipts::orderBy((string) $request->key, $request->type)->with('receipt_splits')->paginate(10);
        return $quotes;
    }

    public function receipts_by_day(Request $request)
    {
        if ($request->type == 'by_day') {
            if ($request->key == 'today') {
                return Receipts::whereDay('created_at', Carbon::now()->today())->with('receipt_splits')->paginate(10);
            }
            if ($request->key == 'this_month') {
                return Receipts::whereMonth('created_at', Carbon::now()->month)->with('receipt_splits')->paginate(10);
            }
            if ($request->key == 'this_year') {
                return Receipts::whereYear('created_at', Carbon::now()->year)->with('receipt_splits')->paginate(10);
            }
        }

        if ($request->type == 'by_sub_day') {
            if ($request->key == 'last_week') {
                $date = \Carbon\Carbon::today()->subDays(7);
                return Receipts::where('created_at', '>=', $date)->with('receipt_splits')->paginate(10);
            }
            if ($request->key == 'last_month') {
                $date = \Carbon\Carbon::today()->subDays(30);
                return Receipts::where('created_at', '>=', $date)->with('receipt_splits')->paginate(10);
            }
            if ($request->key == 'last_year') {
                $date = \Carbon\Carbon::today()->subDays(365);
                return Receipts::where('created_at', '>=', $date)->with('receipt_splits')->paginate(10);
            }
        }
        return $this->list($request);
    }

    public function receipts_search(Request $request)
    {
        $key = $request->key;
        $sales = Receipts::where('paid_by', $key)
            ->orWhere('paid_by', 'like', '%' . $key . '%')
            ->orWhere('amount', 'like', '%' . $key . '%')
            ->orWhere('code', 'like', '%' . $key . '%')
            ->orWhere('billing_date', 'like', '%' . $key . '%')
            ->orWhere('receipt_status', 'like', '%' . $key . '%')
            ->with('receipt_splits')
            ->paginate(10);
        return $sales;
    }
}
