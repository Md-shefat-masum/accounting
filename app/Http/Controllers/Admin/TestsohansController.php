<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Testsohans;

class TestsohansController extends Controller
{
    public function get(Request $request, $id){
      return Testsohans::findOrFail($id);
    }

    public function list(Request $request){
      return Testsohans::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
      ],[
      ]);

        $testsohans = Testsohans::create($request->all());
        return $testsohans;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
      ],[
      ]);

        $testsohans = Testsohans::findOrFail($id);
        $input = $request->all();
        $testsohans->fill($input)->save();
        return $testsohans;
    }

    public function delete(Request $request, $id){
        $testsohans = Testsohans::findOrFail($id);
        $testsohans->delete();
    }
}
 ?>