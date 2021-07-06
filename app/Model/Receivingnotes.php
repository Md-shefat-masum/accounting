<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Receivingnotes extends Model
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


    public function purchase_log()
    {
        return $this->belongsTo('App\Model\PurchaseLog','id','order_id');
    }
}
 ?>
