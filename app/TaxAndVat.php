<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxAndVat extends Model
{
    protected $guarded = [];
    protected $appends = ['text'];

    public function getTextAttribute()
    {
        return $this->tax_name.' '."{$this->tax_rate}%";
    }
}
