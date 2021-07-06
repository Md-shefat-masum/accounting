<?php 
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customerpayments extends Model
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

    public function customer_info()
    {
        return $this->belongsTo('App\Model\Customers','customer_id','id');
    }
    public function invoice_info()
    {
        return $this->belongsTo('App\Model\Invoices','invoice_id','id');
    }
}
 ?>