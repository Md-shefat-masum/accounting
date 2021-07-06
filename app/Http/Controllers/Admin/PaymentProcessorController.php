<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\UniqueId;
use Illuminate\Http\Request;
use App\Model\Banks;
use App\Model\PaymentProcessor;
use Illuminate\Support\Facades\Auth;

class PaymentProcessorController extends Controller
{
    public function get(Request $request, $id)
    {
        return PaymentProcessor::findOrFail($id);
    }

    public function list(Request $request)
    {
        $auth_user = Auth::user();
        $banks = PaymentProcessor::where('user_id', $auth_user->id)->orderBy('created_at', 'asc')->get();
        return $banks;
    }

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $requestData = $request->all();
        $auth_user = Auth::user();
        $requestData['user_id'] = $auth_user->id;

        return PaymentProcessor::create($requestData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'bank_name' => 'required',
        ], [
            'bank_name.required' => 'bank name is a required field.',
        ]);

        $banks = Banks::findOrFail($id);
        $input = $request->all();
        $banks->fill($input)->save();
        return $banks;
    }

    public function delete(Request $request, $id)
    {
        $banks = PaymentProcessor::findOrFail($id);
        $banks->delete();
    }
}

?>
