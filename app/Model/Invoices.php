<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $appends = ['files'];

    public function getFilesAttribute()
    {
        return ImageFile::where('type','invoices')->select('id','name','image','type','type_id')->where('type_id',$this->id)->get();
    }

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

    public function sales_log()
    {
        return $this->belongsTo('App\Model\SalesLog','id','invoice_id');
    }

    public function delivery_address_info()
    {
        return $this->belongsTo('App\Model\CustomerDeliveryAddress','delivery_address_id','id');
    }
}
 ?>
