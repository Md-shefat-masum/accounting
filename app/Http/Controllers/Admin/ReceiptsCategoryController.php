<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ReceiptCategory;
use Illuminate\Http\Request;
use App\Model\Receipts;
use App\Model\ReceiptSubCategory;

class ReceiptsCategoryController extends Controller
{
    public function get($id){
      return ReceiptCategory::with('sub_categories')->findOrFail($id);
    }

    public function list(Request $request){
      return ReceiptCategory::with('sub_categories')->get();
    }

    public function list_by_type(Request $request){
      $categories = [];
      $category_types = ReceiptCategory::select('type_name')->groupBy('type_name')->get();
      foreach ($category_types as $key => $type) {
        $temp = [
          'type_name' => $type->type_name,
          'categories' => ReceiptCategory::where('type_name',$type->type_name)->with('sub_categories')->get()
        ];
        $categories[] = $temp;
      }

      return $categories;
    }

    public function list_first(){
      $cat = ReceiptCategory::first();
      $selected_category_by_types = ReceiptCategory::where('type_name',$cat->type_name)->get();
      $sub_categories = ReceiptSubCategory::where('category_id',$cat->id)->get();
      $sub_category_data = ReceiptSubCategory::where('category_id',$cat->id)->firstOrFail();
      return response()->json([
        'selected_category' => $cat,
        'sub_categories' => $sub_categories,
        'sub_category_data' => $sub_category_data,
        'selected_category_by_types' => $selected_category_by_types,
      ]);
    }

    public function create(Request $request){

      $validatedData = $request->validate([
      ],[
      ]);

        $receipts = ReceiptCategory::create($request->all());
        return $receipts;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
      ],[
      ]);

        $receipts = ReceiptCategory::findOrFail($id);
        $input = $request->all();
        $receipts->fill($input)->save();
        return $receipts;
    }

    public function delete(Request $request, $id){
        $receipts = ReceiptCategory::findOrFail($id);
        $receipts->delete();
    }
}
 ?>