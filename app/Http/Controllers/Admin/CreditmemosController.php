<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Creditmemos;
use App\Model\creditMemosProduct;
use App\Model\Customers;
use App\Model\ImageFile;
use App\Model\UniqueId;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CreditmemosController extends Controller
{
    public function get(Request $request, $id)
    {
		$memo = Creditmemos::find($id);
		$selected_products = creditMemosProduct::where('credit_memo_id',$id)->with('product_details')->get();
		return response()->json([
			'memo' => $memo,
			'selected_products' => $selected_products
		]);
    }

    public function list(Request $request)
    {
        if($request->status == 'cancel'){
			$datas = Creditmemos::where('memo_status','cancel')->paginate(10);
		}else{
			$datas = Creditmemos::paginate(10);
		}

		$memo_count = Creditmemos::count();
		$cancel_count = Creditmemos::where('memo_status','cancel')->count();

		  return response()->json([
			'datas' => $datas,
			'memo_count' => $memo_count,
			'cancel_count' => $cancel_count,
		  ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate(
            [
                'customer' => 'required |max:255 ',
            ],
            [
                'customer.required' => 'customer is a required field.',
                'customer.max' => 'customer can only be 255 characters.',
            ]
        );

        // $creditmemos = Creditmemos::create($request->all());
		$products = $request->selected_products;
		$auth_user = Auth::user();

        $requestData = $request->except(['files', 'attachments','selected_products']);

        if (!isset($request->code)) {
            //business_code is not set
            $customer_uniqueId_count = UniqueId::where('user_id', $auth_user->id)
                ->where('type', 'credit_memo')
                ->select('count')
                ->first();

            if (!isset($customer_uniqueId_count)) {
                $saveUniqueID = [
                    'user_id' => $auth_user->id,
                    'type' => 'credit_memo',
                    'count' => '1',
                ];
                UniqueId::create($saveUniqueID);
                $requestData['code'] = 'CCN-001';
            } else {
                $increment = (int) $customer_uniqueId_count->count + 1;

                UniqueId::where('user_id', $auth_user->id)
                    ->where('type', 'credit_memo')
                    ->update([
                        'count' => $increment,
                    ]);
                $increments = sprintf('%03d', $increment);
                $requestData['code'] = 'CNN-' . $increments;
            }
        } else {
            //business_code is set
            $requestData['code'] = $request->code;
		}

        $requestData['creator'] = $auth_user->id;
		$creditmemos = Creditmemos::create($requestData);

        $creditmemos->created_at = Carbon::now()->toDateTimeString();
        $creditmemos->save();

        foreach ($products as $key => $item) {
            $item = (object) $item;
            // var_dump($item);
            $creditMemosProduct = new creditMemosProduct();
            $creditMemosProduct->product_id = $item->id;
            $creditMemosProduct->credit_memo_id = $creditmemos->id;
            $creditMemosProduct->description = $item->description;
            $creditMemosProduct->sales_price = $item->sales_price;
            $creditMemosProduct->purchase_price = $item->purchase_price;
            $creditMemosProduct->qty = $item->qty;
            $creditMemosProduct->disc = $item->disc;
            $creditMemosProduct->total_price = $item->total_price;
            $creditMemosProduct->vat_on_sales = $item->vat_on_sales;
            $creditMemosProduct->creator = Auth::user()->id;
            $creditMemosProduct->created_at = Carbon::now()->toDateTimeString();
            $creditMemosProduct->save();
            $creditMemosProduct->slug = $creditMemosProduct->id . uniqid(10);
            $creditMemosProduct->save();
        }

        CommonController::insert_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $creditmemos->customer_id,
            'type' => 'creditmemos',
            'type_id' => $creditmemos->id
        ]);

        $auth_user = Auth::user();
        $customers = Customers::find($request->id);
        $requestImage = $request->all();
        if (isset($requestImage['files'])) {
            $t = 1;
            foreach ($requestImage['files'] as $file) {
                $name = $t++ . "." . time() . '.' . explode('/', explode(':', substr($file['image'], 0, strpos($file['image'], ';')))[1])[1];
                Image::make($file['image'])->save(public_path('images/') . $name);

                $imageData = [
                    'user_id' => $auth_user->id,
                    'customer_id' => $customers->id,
                    'type' => 'customer',
                    'name' => $name,
                    'path' => '/images/',
                    'image' => '/images/' . $name,
                ];

                ImageFile::create($imageData);
            }
        }

        return $creditmemos;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'customer' => 'required |max:255 ',
            ],
            [
                'customer.required' => 'customer is a required field.',
                'customer.max' => 'customer can only be 255 characters.',
            ]
        );

        $products = $request->selected_products;
        $requestData = $request->except(['files', 'attachments','selected_products']);

        $creditmemos = Creditmemos::findOrFail($id);
        $creditmemos->fill($requestData)->save();
        $creditmemos->updated_at = Carbon::now()->toDateTimeString();
        $creditmemos->save();

        creditMemosProduct::where('credit_memo_id',$id)->delete();
        foreach ($products as $key => $item) {
            $item = (object) $item;
            // var_dump($item);
            $creditMemosProduct = new creditMemosProduct();
            $creditMemosProduct->product_id = $item->id;
            $creditMemosProduct->credit_memo_id = $creditmemos->id;
            $creditMemosProduct->description = $item->description;
            $creditMemosProduct->sales_price = $item->sales_price;
            $creditMemosProduct->purchase_price = $item->purchase_price;
            $creditMemosProduct->qty = $item->qty;
            $creditMemosProduct->disc = $item->disc;
            $creditMemosProduct->total_price = $item->total_price;
            $creditMemosProduct->vat_on_sales = $item->vat_on_sales;
            $creditMemosProduct->creator = Auth::user()->id;
            $creditMemosProduct->created_at = Carbon::now()->toDateTimeString();
            $creditMemosProduct->save();
            $creditMemosProduct->slug = $creditMemosProduct->id . uniqid(10);
            $creditMemosProduct->save();
        }

        CommonController::delete_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $creditmemos->customer_id,
            'type' => 'creditmemos',
            'type_id' => $creditmemos->id
        ]);

        CommonController::insert_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $creditmemos->customer_id,
            'type' => 'creditmemos',
            'type_id' => $creditmemos->id
        ]);

        $auth_user = Auth::user();
        $customers = Customers::find($request->id);
        $requestImage = $request->all();
        if (isset($requestImage['files'])) {
            $t = 1;
            foreach ($requestImage['files'] as $file) {
                $name = $t++ . "." . time() . '.' . explode('/', explode(':', substr($file['image'], 0, strpos($file['image'], ';')))[1])[1];
                Image::make($file['image'])->save(public_path('images/') . $name);

                $imageData = [
                    'user_id' => $auth_user->id,
                    'customer_id' => $customers->id,
                    'type' => 'customer',
                    'name' => $name,
                    'path' => '/images/',
                    'image' => '/images/' . $name,
                ];

                ImageFile::create($imageData);
            }
        }

        return $creditmemos;
    }

    public function delete(Request $request, $id)
    {
        $creditmemos = Creditmemos::findOrFail($id);
        creditMemosProduct::where('credit_memo_id',$id)->delete();
        CommonController::delete_customer_log([
            'creator' => Auth::user()->id,
            'customer_id' => $creditmemos->customer_id,
            'type' => 'creditmemos',
            'type_id' => $creditmemos->id
        ]);
        $creditmemos->delete();
    }

    public function creditmemos_sort(Request $request)
    {
        $quotes = Creditmemos::orderBy((string) $request->key,$request->type)->paginate(10);
        return $quotes;
    }

    public function creditmemos_by_day(Request $request)
    {
        if($request->type == 'by_day'){
            if($request->key == 'today'){
                return Creditmemos::whereDay('created_at',Carbon::now()->today())->paginate(10);
            }
            if($request->key == 'this_month'){
              return Creditmemos::whereMonth('created_at',Carbon::now()->month)->paginate(10);
            }
            if($request->key == 'this_year'){
              return Creditmemos::whereYear('created_at',Carbon::now()->year)->paginate(10);
            }
        }

        if($request->type == 'by_sub_day'){
            if($request->key == 'last_week'){
              $date = \Carbon\Carbon::today()->subDays(7);
              return Creditmemos::where('created_at','>=',$date)->paginate(10);
            }
            if($request->key == 'last_month'){
              $date = \Carbon\Carbon::today()->subDays(30);
              return Creditmemos::where('created_at','>=',$date)->paginate(10);
            }
            if($request->key == 'last_year'){
              $date = \Carbon\Carbon::today()->subDays(365);
              return Creditmemos::where('created_at','>=',$date)->paginate(10);
            }
        }
        return $this->list($request);
    }

    public function creditmemos_search(Request $request)
    {
      $key = $request->key;
      $projects = Creditmemos::where('customer', $key)
                ->orWhere('customer', 'like', '%' . $key . '%')
                ->orWhere('memo_status', 'like', '%' . $key . '%')
                ->orWhere('total', 'like', '%' . $key . '%')
                ->orWhere('date', 'like', '%' . $key . '%')
                ->orWhere('payment_terms', 'like', '%' . $key . '%')
                ->paginate(10);
      return $projects;
    }
}
?>
