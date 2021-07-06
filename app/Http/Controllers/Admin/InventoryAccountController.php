<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\InventoryAccount;

class InventoryAccountController extends Controller
{
    public function get(Request $request, $id){
      return InventoryAccount::findOrFail($id);
    }

    public function list(Request $request){
      return InventoryAccount::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $inventory_account = InventoryAccount::create($request->all());
        return $inventory_account;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $inventory_account = InventoryAccount::findOrFail($id);
        $input = $request->all();
        $inventory_account->fill($input)->save();
        return $inventory_account;
    }

    public function delete(Request $request, $id){
        $inventory_account = InventoryAccount::findOrFail($id);
        $inventory_account->delete();
    }
}
 ?>