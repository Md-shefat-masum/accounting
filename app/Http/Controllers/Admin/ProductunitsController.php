<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Productunits;

class ProductunitsController extends Controller
{
    public function get(Request $request, $id){
      return Productunits::findOrFail($id);
    }

    public function list(Request $request){
      return Productunits::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $productunites = Productunits::create($request->all());
        return $productunites;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $productunites = Productunits::findOrFail($id);
        $input = $request->all();
        $productunites->fill($input)->save();
        return $productunites;
    }

    public function delete(Request $request, $id){
        $productunites = Productunits::findOrFail($id);
        $productunites->delete();
    }
}
 ?>
