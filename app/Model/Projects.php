<?php 
namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var  array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var  array
     */
    protected $casts = [
        ''
    ];

    // public function getCreatedAtAttribute($value)
    // {
    //     $time = Carbon::parse($value)->format('Y-m-d');
    //     return $time;
    // }
}

 ?>