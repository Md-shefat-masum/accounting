<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Purchaseorders;

class PurchaseordersController extends Controller
{
    public function get(Request $request, $id){
      return Purchaseorders::findOrFail($id);
    }

    public function list(Request $request){
      return Purchaseorders::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
        'supplier' => 'required |max:255 ',
      ],[
        'supplier.required' => 'supplier is a required field.',
        'supplier.max' => 'supplier can only be 255 characters.',
      ]);

        $purchaseorders = Purchaseorders::create($request->all());
        return $purchaseorders;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'supplier' => 'required |max:255 ',
      ],[
        'supplier.required' => 'supplier is a required field.',
        'supplier.max' => 'supplier can only be 255 characters.',
      ]);

        $purchaseorders = Purchaseorders::findOrFail($id);
        $input = $request->all();
        $purchaseorders->fill($input)->save();
        return $purchaseorders;
    }

    public function delete(Request $request, $id){
        $purchaseorders = Purchaseorders::findOrFail($id);
        $purchaseorders->delete();
    }
}
 ?>
