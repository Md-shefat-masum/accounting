<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Bills;

class BillsController extends Controller
{
    public function get(Request $request, $id){
      return Bills::findOrFail($id);
    }

    public function list(Request $request){
      return Bills::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
        'supplier' => 'required |max:255 ',
        'ref_number' => 'required |max:255 ',
        'address' => 'required |max:255 ',
      ],[
        'supplier.required' => 'supplier is a required field.',
        'supplier.max' => 'supplier can only be 255 characters.',
        'ref_number.required' => 'ref_number is a required field.',
        'ref_number.max' => 'ref_number can only be 255 characters.',
        'address.required' => 'address is a required field.',
        'address.max' => 'address can only be 255 characters.',
      ]);

        $bills = Bills::create($request->all());
        return $bills;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'supplier' => 'required |max:255 ',
        'ref_number' => 'required |max:255 ',
        'address' => 'required |max:255 ',
      ],[
        'supplier.required' => 'supplier is a required field.',
        'supplier.max' => 'supplier can only be 255 characters.',
        'ref_number.required' => 'ref_number is a required field.',
        'ref_number.max' => 'ref_number can only be 255 characters.',
        'address.required' => 'address is a required field.',
        'address.max' => 'address can only be 255 characters.',
      ]);

        $bills = Bills::findOrFail($id);
        $input = $request->all();
        $bills->fill($input)->save();
        return $bills;
    }

    public function delete(Request $request, $id){
        $bills = Bills::findOrFail($id);
        $bills->delete();
    }
}
 ?>