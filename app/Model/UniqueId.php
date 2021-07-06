<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UniqueId extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'count',
    ];
}
