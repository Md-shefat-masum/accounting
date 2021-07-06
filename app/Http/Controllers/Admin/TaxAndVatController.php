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

        $validatedData = $request->validate([
            'name' => 'required |max:255 ',
        ], [
            'name.required' => 'name is a required field.',
            'name.max' => 'name can only be 255 characters.',
        ]);

        $tax_and_vat = TaxAndVat::create($request->all());
        $tax_and_vat->created_at = Carbon::now()->toDateTimeString();
        $tax_and_vat->slug = Carbon::now()->year . $tax_and_vat->id;
        return $tax_and_vat;
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required |max:255 ',
        ], [
            'name.required' => 'name is a required field.',
            'name.max' => 'name can only be 255 characters.',
        ]);

        $tax_and_vat = TaxAndVat::findOrFail($id);
        $input = $request->all();
        $tax_and_vat->fill($input)->save();
        return $tax_and_vat;
    }

    public function delete(Request $request, $id)
    {
        $tax_and_vat = TaxAndVat::findOrFail($id);
        $tax_and_vat->delete();
    }
}
