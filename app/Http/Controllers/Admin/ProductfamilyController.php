<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Productfamily;
use Carbon\Carbon;

class ProductfamilyController extends Controller
{
    public function get(Request $request, $id){
      return Productfamily::findOrFail($id);
    }

    public function list(Request $request){
      return Productfamily::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $product_family = Productfamily::create($request->all());
        $product_family->created_at = Carbon::now()->toDateTimeString();
        $product_family->slug = Carbon::now()->year.$product_family->id;
        return $product_family;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $product_family = Productfamily::findOrFail($id);
        $input = $request->all();
        $product_family->fill($input)->save();
        return $product_family;
    }

    public function delete(Request $request, $id){
        $product_family = Productfamily::findOrFail($id);
        $product_family->delete();
    }
}
?>
