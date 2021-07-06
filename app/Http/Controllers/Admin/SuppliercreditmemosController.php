<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Suppliercreditmemos;

class SuppliercreditmemosController extends Controller
{
    public function get(Request $request, $id){
      return Suppliercreditmemos::findOrFail($id);
    }

    public function list(Request $request){
      return Suppliercreditmemos::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
        'supplier' => 'required |max:255 ',
        'address' => 'required ',
        'recipient' => 'required |max:255 ',
        'ref_number' => 'required |max:255 ',
        'date' => 'required |max:255 ',
        'payment_terms' => 'required |max:255 ',
        'currency' => 'required |max:255 ',
        'is_product' => 'required |max:255 ',
        'is_expenses' => 'required |max:255 ',
        'document_note' => 'required |max:255 ',
        'subtotal' => 'required |max:255 ',
        'discount_rate' => 'required |max:255 ',
        'discount_amount' => 'required |max:255 ',
        'vat_amount' => 'required |max:255 ',
        'total' => 'required |max:255 ',
        'delivery_date' => 'required |max:255 ',
        'type' => 'required |max:255 ',
        'delivery_address' => 'required |max:255 ',
        'project' => 'required |max:255 ',
        'delivery_status' => 'required |max:255 ',
        'billing_status' => 'required |max:255 ',
        'assigned_to' => 'required |max:255 ',
        'private_note' => 'required |max:255 ',
        'attachments' => 'required |max:255 ',
      ],[
        'supplier.required' => 'supplier is a required field.',
        'supplier.max' => 'supplier can only be 255 characters.',
        'address.required' => 'address is a required field.',
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
        'is_expenses.required' => 'is_expenses is a required field.',
        'is_expenses.max' => 'is_expenses can only be 255 characters.',
        'document_note.required' => 'document_note is a required field.',
        'document_note.max' => 'document_note can only be 255 characters.',
        'subtotal.required' => 'subtotal is a required field.',
        'subtotal.max' => 'subtotal can only be 255 characters.',
        'discount_rate.required' => 'discount_rate is a required field.',
        'discount_rate.max' => 'discount_rate can only be 255 characters.',
        'discount_amount.required' => 'discount_amount is a required field.',
        'discount_amount.max' => 'discount_amount can only be 255 characters.',
        'vat_amount.required' => 'vat_amount is a required field.',
        'vat_amount.max' => 'vat_amount can only be 255 characters.',
        'total.required' => 'total is a required field.',
        'total.max' => 'total can only be 255 characters.',
        'delivery_date.required' => 'delivery_date is a required field.',
        'delivery_date.max' => 'delivery_date can only be 255 characters.',
        'type.required' => 'type is a required field.',
        'type.max' => 'type can only be 255 characters.',
        'delivery_address.required' => 'delivery_address is a required field.',
        'delivery_address.max' => 'delivery_address can only be 255 characters.',
        'project.required' => 'project is a required field.',
        'project.max' => 'project can only be 255 characters.',
        'delivery_status.required' => 'delivery_status is a required field.',
        'delivery_status.max' => 'delivery_status can only be 255 characters.',
        'billing_status.required' => 'billing_status is a required field.',
        'billing_status.max' => 'billing_status can only be 255 characters.',
        'assigned_to.required' => 'assigned_to is a required field.',
        'assigned_to.max' => 'assigned_to can only be 255 characters.',
        'private_note.required' => 'private_note is a required field.',
        'private_note.max' => 'private_note can only be 255 characters.',
        'attachments.required' => 'attachments is a required field.',
        'attachments.max' => 'attachments can only be 255 characters.',
      ]);

        $suppliercreditmemos = Suppliercreditmemos::create($request->all());
        return $suppliercreditmemos;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'supplier' => 'required |max:255 ',
        'address' => 'required ',
        'recipient' => 'required |max:255 ',
        'ref_number' => 'required |max:255 ',
        'date' => 'required |max:255 ',
        'payment_terms' => 'required |max:255 ',
        'currency' => 'required |max:255 ',
        'is_product' => 'required |max:255 ',
        'is_expenses' => 'required |max:255 ',
        'document_note' => 'required |max:255 ',
        'subtotal' => 'required |max:255 ',
        'discount_rate' => 'required |max:255 ',
        'discount_amount' => 'required |max:255 ',
        'vat_amount' => 'required |max:255 ',
        'total' => 'required |max:255 ',
        'delivery_date' => 'required |max:255 ',
        'type' => 'required |max:255 ',
        'delivery_address' => 'required |max:255 ',
        'project' => 'required |max:255 ',
        'delivery_status' => 'required |max:255 ',
        'billing_status' => 'required |max:255 ',
        'assigned_to' => 'required |max:255 ',
        'private_note' => 'required |max:255 ',
        'attachments' => 'required |max:255 ',
      ],[
        'supplier.required' => 'supplier is a required field.',
        'supplier.max' => 'supplier can only be 255 characters.',
        'address.required' => 'address is a required field.',
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
        'is_expenses.required' => 'is_expenses is a required field.',
        'is_expenses.max' => 'is_expenses can only be 255 characters.',
        'document_note.required' => 'document_note is a required field.',
        'document_note.max' => 'document_note can only be 255 characters.',
        'subtotal.required' => 'subtotal is a required field.',
        'subtotal.max' => 'subtotal can only be 255 characters.',
        'discount_rate.required' => 'discount_rate is a required field.',
        'discount_rate.max' => 'discount_rate can only be 255 characters.',
        'discount_amount.required' => 'discount_amount is a required field.',
        'discount_amount.max' => 'discount_amount can only be 255 characters.',
        'vat_amount.required' => 'vat_amount is a required field.',
        'vat_amount.max' => 'vat_amount can only be 255 characters.',
        'total.required' => 'total is a required field.',
        'total.max' => 'total can only be 255 characters.',
        'delivery_date.required' => 'delivery_date is a required field.',
        'delivery_date.max' => 'delivery_date can only be 255 characters.',
        'type.required' => 'type is a required field.',
        'type.max' => 'type can only be 255 characters.',
        'delivery_address.required' => 'delivery_address is a required field.',
        'delivery_address.max' => 'delivery_address can only be 255 characters.',
        'project.required' => 'project is a required field.',
        'project.max' => 'project can only be 255 characters.',
        'delivery_status.required' => 'delivery_status is a required field.',
        'delivery_status.max' => 'delivery_status can only be 255 characters.',
        'billing_status.required' => 'billing_status is a required field.',
        'billing_status.max' => 'billing_status can only be 255 characters.',
        'assigned_to.required' => 'assigned_to is a required field.',
        'assigned_to.max' => 'assigned_to can only be 255 characters.',
        'private_note.required' => 'private_note is a required field.',
        'private_note.max' => 'private_note can only be 255 characters.',
        'attachments.required' => 'attachments is a required field.',
        'attachments.max' => 'attachments can only be 255 characters.',
      ]);

        $suppliercreditmemos = Suppliercreditmemos::findOrFail($id);
        $input = $request->all();
        $suppliercreditmemos->fill($input)->save();
        return $suppliercreditmemos;
    }

    public function delete(Request $request, $id){
        $suppliercreditmemos = Suppliercreditmemos::findOrFail($id);
        $suppliercreditmemos->delete();
    }
}
 ?>