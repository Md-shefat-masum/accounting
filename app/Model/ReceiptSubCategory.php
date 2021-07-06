<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReceiptSubCategory extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Model\ReceiptCategory','id','category_id');
    }
}
