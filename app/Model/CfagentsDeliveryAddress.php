<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CfagentsDeliveryAddress extends Model
{
    protected $fillable = [
        'user_id',
        'cfagent_id',
        'address',
    ];
}
