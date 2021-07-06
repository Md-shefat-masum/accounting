<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Projects;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    public function get(Request $request, $id){
      return Projects::findOrFail($id);
    }

    public function list(Request $request){
      return Projects::where('creator',Auth::user()->id)->paginate(10);
    }

    public function list_all(Request $request){
      return Projects::where('creator',Auth::user()->id)->orderBy('name','ASC')->get();
    }

    public function create(Request $request){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

      $projects = Projects::create($request->all());
      $projects->creator = Auth::user()->id;
      $projects->date = Carbon::now()->toDate();
      $projects->created_at = Carbon::now()->toDateTimeString();
      $projects->save();
      return $projects;
    }

    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'name' => 'required |max:255 ',
      ],[
        'name.required' => 'name is a required field.',
        'name.max' => 'name can only be 255 characters.',
      ]);

        $projects = Projects::findOrFail($id);
        $input = $request->all();
        $projects->fill($input)->save();
        return $projects;
    }

    public function delete(Request $request, $id){
        $projects = Projects::findOrFail($id);
        $projects->delete();
    }

    public function projects_sort(Request $request)
    {
        $quotes = Projects::orderBy((string) $request->key,$request->type)->paginate(10);
        return $quotes;
    }

    public function projects_by_day(Request $request)
    {
        if($request->type == 'by_day'){
            if($request->key == 'today'){
                return Projects::whereDay('created_at',Carbon::now()->today())->paginate(10);
            }
            if($request->key == 'this_month'){
              return Projects::whereMonth('created_at',Carbon::now()->month)->paginate(10);
            }
            if($request->key == 'this_year'){
              return Projects::whereYear('created_at',Carbon::now()->year)->paginate(10);
            }
        }

        if($request->type == 'by_sub_day'){
            if($request->key == 'last_week'){
              $date = \Carbon\Carbon::today()->subDays(7);
              return Projects::where('created_at','>=',$date)->paginate(10);
            }
            if($request->key == 'last_month'){
              $date = \Carbon\Carbon::today()->subDays(30);
              return Projects::where('created_at','>=',$date)->paginate(10);
            }
            if($request->key == 'last_year'){
              $date = \Carbon\Carbon::today()->subDays(365);
              return Projects::where('created_at','>=',$date)->paginate(10);
            }
        }
        return $this->list($request);
    }

    public function project_search(Request $request)
    {
      $key = $request->key;
      $projects = Projects::where('name', $key)
                ->orWhere('name', 'like', '%' . $key . '%')
                ->orWhere('description', 'like', '%' . $key . '%')
                ->orWhere('date', 'like', '%' . $key . '%')
                ->paginate(10);
      return $projects;
    }
}
 ?>
