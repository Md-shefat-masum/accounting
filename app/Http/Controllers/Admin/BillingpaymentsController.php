<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Billingpayments;

class BillingpaymentsController extends Controller
{
    public function get(Request $request, $id){
      return Billingpayments::findOrFail($id);
    }

    public function list(Request $request){
      return Billingpayments::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
        'bank' => 'required |max:255 ',
      ],[
        'bank.required' => 'bank is a required field.',
        'bank.max' => 'bank can only be 255 characters.',
      ]);

        $billingpayments = Billingpayments::create($request->all());
        return $billingpayments;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'bank' => 'required |max:255 ',
      ],[
        'bank.required' => 'bank is a required field.',
        'bank.max' => 'bank can only be 255 characters.',
      ]);

        $billingpayments = Billingpayments::findOrFail($id);
        $input = $request->all();
        $billingpayments->fill($input)->save();
        return $billingpayments;
    }

    public function delete(Request $request, $id){
        $billingpayments = Billingpayments::findOrFail($id);
        $billingpayments->delete();
    }
}
 ?>