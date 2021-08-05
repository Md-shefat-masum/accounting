<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Saleorders extends Model
{
    protected $appends = ['files', 'expired_day_number', 'delivery_list_info_json'];

    public function getDeliveryListInfoJsonAttribute(){
        return $this->delivery_list_info != "" ? json_decode($this->delivery_list_info) : "";
    }

    public function getExpiredDayNumberAttribute()
    {
        $today = Carbon::now();
        $delivery_date = Carbon::parse($this->delivery_date);

        // if($delivery_date > $today){
        //     dd($delivery_date->diffInDays($today));
        // }else{
        //     dd('0');
        // }

        return $delivery_date->diffInDays($today);
    }

    public function getFilesAttribute()
    {
        return ImageFile::where('type', 'saleorders')->select('id', 'name', 'image', 'type', 'type_id')->where('type_id', $this->id)->get();
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
        return $this->belongsTo('App\Model\SalesLog', 'id', 'sales_order_id');
    }

    public function delivery_address_info()
    {
        return $this->belongsTo('App\Model\CustomerDeliveryAddress', 'delivery_address_id', 'id');
    }
}
