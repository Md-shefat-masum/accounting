<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeliveryNoteProduct extends Model
{
    public function product_details()
    {
        return $this->belongsTo('App\Model\Productservices','product_id','id');
    }
}
