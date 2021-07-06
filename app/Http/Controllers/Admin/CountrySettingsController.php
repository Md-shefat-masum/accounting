<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PostalCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CountrySettingsController extends Controller
{
    public function get_country()
    {
        $countries = DB::table('country_currencies')->select('id', 'name', 'currency_code')->get();
        return $countries;
    }

    public function get_division()
    {
        $divisons = DB::table('divisions')->select('id', 'name')->get();
        return $divisons;
    }

    public function get_district(Request $request)
    {
        if($request->has('division_id')){
            $districts = DB::table('districts')->where('division_id',$request->division_id)->select('id', 'name')->get();
        }else{
            $districts = DB::table('districts')->select('id', 'name')->get();
        }
        return $districts;
    }

    public function get_upazila(Request $request)
    {
        if($request->has('district_id')){
            $upazilas = DB::table('upazilas')->where('district_id',$request->district_id)->select('id', 'name')->get();
        }else{
            $upazilas = DB::table('upazilas')->select('id', 'name')->get();
        }
        return $upazilas;
    }

    public function get_union(Request $request)
    {
        if($request->has('upazilla_id')){
            $unions = DB::table('unions')->where('upazilla_id',$request->upazilla_id)->select('id', 'name')->get();
        }else{
            $unions = DB::table('unions')->select('id', 'name')->get();
        }
        return $unions;
    }

    public function get_thana(Request $request)
    {
        if($request->has('district_name')){
            $thana = PostalCode::where("district",$request->district_name)->select('id','district','thana')->get()->unique('thana');
        }else{
            $thana = PostalCode::select('id','district','thana')->get();
        }
        return $thana;
    }

    public function get_post_office(Request $request)
    {
        if($request->has('thana')){
            $post_office = PostalCode::where("thana",$request->thana)->select('id','district','thana','suboffice','postcode')->get();
        }else{
            $post_office = PostalCode::select('id','district','thana','suboffice','postcode')->get();
        }
        return $post_office;
    }

    public function get_city_post_code()
    {
        return PostalCode::get();
    }
}
