<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CountryCurrencie extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $table = 'country_currencies';
}
