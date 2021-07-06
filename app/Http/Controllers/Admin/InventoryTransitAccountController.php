<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\InventoryTransitAccount;

class InventoryTransitAccountController extends Controller
{
    public function get(Request $request, $id){
      return InventoryTransitAccount::findOrFail($id);
    }

    public function list(Request $request){
      return InventoryTransitAccount::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $inventory_transit_account = InventoryTransitAccount::create($request->all());
        return $inventory_transit_account;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $inventory_transit_account = InventoryTransitAccount::findOrFail($id);
        $input = $request->all();
        $inventory_transit_account->fill($input)->save();
        return $inventory_transit_account;
    }

    public function delete(Request $request, $id){
        $inventory_transit_account = InventoryTransitAccount::findOrFail($id);
        $inventory_transit_account->delete();
    }
}
 ?>