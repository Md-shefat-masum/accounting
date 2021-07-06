<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImageFile extends Model
{
    protected $fillable = [
        'user_id',
        'customer_id',
        'cfagent_id',
        'employee_id',
        'type',
        'type_id',
        'name',
        'path',
        'image',
    ];
}
