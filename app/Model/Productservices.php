<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Productservices extends Model
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

    public function product_log()
    {
        return $this->hasMany('App\Model\ProductServiceLog','product_id','id');
    }
}
