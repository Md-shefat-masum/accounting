<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Productrecivingloaction;
use Carbon\Carbon;

class ProductrecivinglocationController extends Controller
{
    public function get(Request $request, $id){
      return Productrecivingloaction::findOrFail($id);
    }

    public function list(Request $request){
      return Productrecivingloaction::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $productrecivingloaction = Productrecivingloaction::create($request->all());
        $productrecivingloaction->created_at = Carbon::now()->toDateTimeString();
        $productrecivingloaction->slug = Carbon::now()->year.$productrecivingloaction->id;
        $productrecivingloaction->save();

        return $productrecivingloaction;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $productrecivingloaction = Productrecivingloaction::findOrFail($id);
        $input = $request->all();
        $productrecivingloaction->fill($input)->save();
        return $productrecivingloaction;
    }

    public function delete(Request $request, $id){
        $productrecivingloaction = Productrecivingloaction::findOrFail($id);
        $productrecivingloaction->delete();
    }
}
 ?>