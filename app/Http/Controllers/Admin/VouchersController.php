<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Vouchers;

class VouchersController extends Controller
{
    public function get(Request $request, $id){
      return Vouchers::findOrFail($id);
    }

    public function list(Request $request){
      return Vouchers::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
      ],[
      ]);

        $vouchers = Vouchers::create($request->all());
        return $vouchers;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
      ],[
      ]);

        $vouchers = Vouchers::findOrFail($id);
        $input = $request->all();
        $vouchers->fill($input)->save();
        return $vouchers;
    }

    public function delete(Request $request, $id){
        $vouchers = Vouchers::findOrFail($id);
        $vouchers->delete();
    }
}
 ?>