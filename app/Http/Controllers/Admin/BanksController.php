<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\UniqueId;
use Illuminate\Http\Request;
use App\Model\Banks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BanksController extends Controller
{
    public function get(Request $request, $id)
    {
        return Banks::findOrFail($id);
    }

    public function list(Request $request)
    {
        $auth_user = Auth::user();
        $banks = Banks::where('user_id', $auth_user->id)->orderBy('created_at', 'asc')->get();
        return $banks;
    }

    public function list_with_amounts(Request $request)
    {
        $auth_user = Auth::user();
        $banks = Banks::where('user_id', $auth_user->id)->orderBy('created_at', 'asc')
                        ->get();
        return $banks;
    }

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'bank_name' => 'required',
        ], [
            'bank_name.required' => 'bank name is a required field.',
        ]);

        $requestData = $request->all();
        $auth_user = Auth::user();
        $requestData['user_id'] = $auth_user->id;

        if (!isset($request->business_code)) {
            //business_code is not set
            $customer_uniqueId_count = UniqueId::where('user_id', $auth_user->id)->where('type', 'bank')->select('count')->first();

            if (!isset($customer_uniqueId_count)) {
                $saveUniqueID = [
                    'user_id' => $auth_user->id,
                    'type' => 'bank',
                    'count' => '1',
                ];
                UniqueId::create($saveUniqueID);
                $requestData['bank_number'] = 'BNK-001';
            } else {
                $increment = (int)$customer_uniqueId_count->count + 1;

                UniqueId::where('user_id', $auth_user->id)->where('type', 'bank')->update([
                    'count' => $increment,
                ]);
                $increments = sprintf('%03d', $increment);
                $requestData['bank_number'] = 'BNK-' . $increments;
            }
        } else {
            //business_code is set
            $requestData['bank_number'] = $request->business_code;
        }


        $banks = Banks::create($requestData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'bank_name' => 'required',
        ], [
            'bank_name.required' => 'bank name is a required field.',
        ]);

        $auth_user = Auth::user();

        if ($request->bank_number != null) {
            $checkUnique = Banks::where('user_id', $auth_user->id)
                ->where('bank_number', $request->business_code)
                ->where('id', '!=', $request->id)->first();

            if (isset($checkUnique)) {
                $validatedData = $request->validate([
                    'bank_number' => 'required|unique:banks'
                ], ['bank_number.unique' => 'Business code has already been taken ss',]);
                return $validatedData;
            }
        }else{
            $validatedData = $request->validate([
                'bank_number' => 'required|unique:suppliers'
            ], ['bank_number.required' => 'Business code is required t',]);
            return $validatedData;
        }


        $banks = Banks::findOrFail($id);
        $input = $request->all();
        $banks->fill($input)->save();
        return $banks;
    }

    public function delete(Request $request, $id)
    {
        $banks = Banks::findOrFail($id);
        $banks->delete();
    }
}

?>
