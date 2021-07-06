<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerDeliveryAddress extends Model
{
    protected $fillable = [
      'user_id',
      'customer_id',
      'address',
      'country',
      'line2',
      'city',
      'zip_code',
    ];

    protected $guarded = [];
}
