<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    public function product_details()
    {
        return $this->belongsTo('App\Model\Productservices','product_id','id');
    }
}
