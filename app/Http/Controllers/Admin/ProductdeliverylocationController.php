<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Productdeliveryloaction;

class ProductdeliverylocationController extends Controller
{
    public function get(Request $request, $id){
      return Productdeliveryloaction::findOrFail($id);
    }

    public function list(Request $request){
      return Productdeliveryloaction::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $productrecivingloaction = Productdeliveryloaction::create($request->all());
        return $productrecivingloaction;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $productrecivingloaction = Productdeliveryloaction::findOrFail($id);
        $input = $request->all();
        $productrecivingloaction->fill($input)->save();
        return $productrecivingloaction;
    }

    public function delete(Request $request, $id){
        $productrecivingloaction = Productdeliveryloaction::findOrFail($id);
        $productrecivingloaction->delete();
    }
}
 ?>