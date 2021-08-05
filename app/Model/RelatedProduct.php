<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RelatedProduct extends Model
{
    protected $appends = [
        'related_product_id',
    ];

    public function getRelatedProductIdAttribute()
    {
        return $this->id;
    }

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
