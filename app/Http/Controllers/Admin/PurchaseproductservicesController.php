<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Purchaseproductservices;

class PurchaseproductservicesController extends Controller
{
    public function get(Request $request, $id){
      return Purchaseproductservices::findOrFail($id);
    }

    public function list(Request $request){
      return Purchaseproductservices::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $purchaseproductservices = Purchaseproductservices::create($request->all());
        return $purchaseproductservices;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $purchaseproductservices = Purchaseproductservices::findOrFail($id);
        $input = $request->all();
        $purchaseproductservices->fill($input)->save();
        return $purchaseproductservices;
    }

    public function delete(Request $request, $id){
        $purchaseproductservices = Purchaseproductservices::findOrFail($id);
        $purchaseproductservices->delete();
    }
}
 ?>