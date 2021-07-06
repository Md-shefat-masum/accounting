<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ReceiptCategory;
use Illuminate\Http\Request;
use App\Model\Receipts;
use App\Model\ReceiptSubCategory;
use Illuminate\Support\Facades\Auth;

class ReceiptsSubCategoryController extends Controller
{
    public function get($id){
      return ReceiptSubCategory::findOrFail($id);
    }

    public function list(Request $request){
      return ReceiptSubCategory::get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
      ],[
      ]);

        $receipts = ReceiptSubCategory::create($request->all());
        return $receipts;
    }

    public function receipts_sub_category_create(Request $request)
    {
      $receipts = new ReceiptSubCategory();
      $receipts->name = $request->name;
      $receipts->category_id = $request->category_id;
      $receipts->accounting_account = $request->accounting_account;
      $receipts->creator = Auth::user()->id;
      $receipts->slug = Auth::user()->id.time();
      $receipts->save();
      return $receipts;
    }

    public function receipts_sub_category_update(Request $request){

      $validatedData = $request->validate([
      ],[
      ]);

      $receipts = ReceiptSubCategory::findOrFail($request->id);
      $receipts->name = $request->name;
      $receipts->category_id = $request->category_id;
      $receipts->accounting_account = $request->accounting_account;
      $receipts->save();
      return $receipts;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
      ],[
      ]);

        $receipts = ReceiptSubCategory::findOrFail($id);
        $input = $request->all();
        $receipts->fill($input)->save();
        return $receipts;
    }

    public function delete(Request $request, $id){
        $receipts = ReceiptSubCategory::findOrFail($id);
        $receipts->delete();
    }
}
 ?>