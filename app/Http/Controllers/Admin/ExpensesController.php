<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Expenses;

class ExpensesController extends Controller
{
    public function get(Request $request, $id){
      return Expenses::findOrFail($id);
    }

    public function list(Request $request){
      return Expenses::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
        'paid_to' => 'required |max:255 ',
        'billing_date' => 'required |max:255 ',
        'category' => 'required |max:255 ',
        'currency' => 'required |max:255 ',
        'is_paid' => 'required |max:1 ',
        'payment_method' => 'required |max:255 ',
        'paid_on' => 'required |max:255 ',
        'bank' => 'required |max:255 ',
        'transaction_id' => 'required |max:255 ',
        'attachments' => 'required |max:255 ',
        'project' => 'required |max:255 ',
        'assigned' => 'required |max:255 ',
      ],[
        'paid_to.required' => 'paid_to is a required field.',
        'paid_to.max' => 'paid_to can only be 255 characters.',
        'billing_date.required' => 'billing_date is a required field.',
        'billing_date.max' => 'billing_date can only be 255 characters.',
        'category.required' => 'category is a required field.',
        'category.max' => 'category can only be 255 characters.',
        'currency.required' => 'currency is a required field.',
        'currency.max' => 'currency can only be 255 characters.',
        'is_paid.required' => 'is_paid is a required field.',
        'is_paid.max' => 'is_paid can only be 1 characters.',
        'payment_method.required' => 'payment_method is a required field.',
        'payment_method.max' => 'payment_method can only be 255 characters.',
        'paid_on.required' => 'paid_on is a required field.',
        'paid_on.max' => 'paid_on can only be 255 characters.',
        'bank.required' => 'bank is a required field.',
        'bank.max' => 'bank can only be 255 characters.',
        'transaction_id.required' => 'transaction_id is a required field.',
        'transaction_id.max' => 'transaction_id can only be 255 characters.',
        'attachments.required' => 'attachments is a required field.',
        'attachments.max' => 'attachments can only be 255 characters.',
        'project.required' => 'project is a required field.',
        'project.max' => 'project can only be 255 characters.',
        'assigned.required' => 'assigned is a required field.',
        'assigned.max' => 'assigned can only be 255 characters.',
      ]);

        $expenses = Expenses::create($request->all());
        return $expenses;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'paid_to' => 'required |max:255 ',
        'billing_date' => 'required |max:255 ',
        'category' => 'required |max:255 ',
        'currency' => 'required |max:255 ',
        'is_paid' => 'required |max:1 ',
        'payment_method' => 'required |max:255 ',
        'paid_on' => 'required |max:255 ',
        'bank' => 'required |max:255 ',
        'transaction_id' => 'required |max:255 ',
        'attachments' => 'required |max:255 ',
        'project' => 'required |max:255 ',
        'assigned' => 'required |max:255 ',
      ],[
        'paid_to.required' => 'paid_to is a required field.',
        'paid_to.max' => 'paid_to can only be 255 characters.',
        'billing_date.required' => 'billing_date is a required field.',
        'billing_date.max' => 'billing_date can only be 255 characters.',
        'category.required' => 'category is a required field.',
        'category.max' => 'category can only be 255 characters.',
        'currency.required' => 'currency is a required field.',
        'currency.max' => 'currency can only be 255 characters.',
        'is_paid.required' => 'is_paid is a required field.',
        'is_paid.max' => 'is_paid can only be 1 characters.',
        'payment_method.required' => 'payment_method is a required field.',
        'payment_method.max' => 'payment_method can only be 255 characters.',
        'paid_on.required' => 'paid_on is a required field.',
        'paid_on.max' => 'paid_on can only be 255 characters.',
        'bank.required' => 'bank is a required field.',
        'bank.max' => 'bank can only be 255 characters.',
        'transaction_id.required' => 'transaction_id is a required field.',
        'transaction_id.max' => 'transaction_id can only be 255 characters.',
        'attachments.required' => 'attachments is a required field.',
        'attachments.max' => 'attachments can only be 255 characters.',
        'project.required' => 'project is a required field.',
        'project.max' => 'project can only be 255 characters.',
        'assigned.required' => 'assigned is a required field.',
        'assigned.max' => 'assigned can only be 255 characters.',
      ]);

        $expenses = Expenses::findOrFail($id);
        $input = $request->all();
        $expenses->fill($input)->save();
        return $expenses;
    }

    public function delete(Request $request, $id){
        $expenses = Expenses::findOrFail($id);
        $expenses->delete();
    }
}
 ?>
