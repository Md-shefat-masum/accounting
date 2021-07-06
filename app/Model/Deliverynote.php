<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Deliverynote extends Model
{
    protected $appends = ['files','text'];

    public function getFilesAttribute()
    {
        return ImageFile::where('type','delivery_note')->select('id','name','image','type','type_id')->where('type_id',$this->id)->get();
    }

    public function getTextAttribute()
    {
        return $this->code;
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
        return $this->belongsTo('App\Model\SalesLog','id','delivery_note_id');
    }

    public function delivery_address_info()
    {
        return $this->belongsTo('App\Model\CustomerDeliveryAddress','delivery_address_id','id');
    }
}
 ?>
