<?php
namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{

    protected $appends = ['files','amount_number_format'];

    public function getAmountNumberFormatAttribute()
    {
        return number_format((float) $this->total, 2, '.', ',');
    }

    public function getFilesAttribute()
    {
        return ImageFile::where('type','quotes')->select('id','name','image','type','type_id')->where('type_id',$this->id)->get();
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

    public function all_products()
    {
        return $this->hasMany(QuoteProduct::class,'product_id','id');
    }

    public function creator_info()
    {
        return $this->belongsTo('App\User','creator','id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Model\Customers','customer_id','id');
    }

    public function sales_log()
    {
        return $this->belongsTo('App\Model\SalesLog','id','quote_id');
    }

    public function delivery_address_info()
    {
        return $this->belongsTo('App\Model\CustomerDeliveryAddress','delivery_address_id','id');
    }
}
 ?>
