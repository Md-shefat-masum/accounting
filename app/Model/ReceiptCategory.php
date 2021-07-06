<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReceiptCategory extends Model
{
    public function sub_categories()
    {
        return $this->hasMany('App\Model\ReceiptSubCategory','category_id','id');
    }
    
}
