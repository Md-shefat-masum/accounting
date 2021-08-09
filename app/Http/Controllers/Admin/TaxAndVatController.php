<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Productfamily;
use App\TaxAndVat;
use Carbon\Carbon;

class TaxAndVatController extends Controller
{
    public function get(Request $request, $id)
    {
        return TaxAndVat::findOrFail($id);
    }

    public function list(Request $request)
    {
        return TaxAndVat::get();
    }

    public function create(Request $request)
    {
        // return dd($request->all());
        $validatedData = $request->validate([
            'tax_name' => 'required |max:255 ',
            'abbreviation' => 'required',
            'tax_rate' => 'required',
        ], [
            'name.required' => 'name is a required field.',
            'name.max' => 'name can only be 255 characters.',
        ]);

        $tax_and_vat = TaxAndVat::create($request->all());
        $tax_and_vat->created_at = Carbon::now()->toDateTimeString();
        $tax_and_vat->slug = Carbon::now()->year . $tax_and_vat->id;
        return $tax_and_vat;
    }

    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'tax_name' => 'required |max:255 ',
            'abbreviation' => 'required',
            'tax_rate' => 'required',
        ], [
            'name.required' => 'name is a required field.',
            'name.max' => 'name can only be 255 characters.',
        ]);

        $tax_and_vat = TaxAndVat::find($request->id);
        $input = $request->all();
        $tax_and_vat->fill($input)->save();
        return $tax_and_vat;
    }

    public function delete(Request $request)
    {
        $tax_and_vat = TaxAndVat::findOrFail($request->id);
        $tax_and_vat->delete();
    }
}
