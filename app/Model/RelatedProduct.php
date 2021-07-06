<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RelatedProduct extends Model
{
    public function getSelectedSelect2TaxAndVatAttribute($value)
    {
        return json_decode($value);
    }

    public function getVatInfoAttribute($value)
    {
        return json_decode($value);
    }

    public function product_details()
    {
        return $this->belongsTo('App\Model\Productservices','product_id','id');
    }
}
