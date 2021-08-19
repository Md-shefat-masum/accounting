<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customers extends Model
{

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var  array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var  array
     */
    protected $casts = [];

    public function country_name(){
        return $this->hasOne(CountryCurrencie::class, 'id', 'country')->select(['id', 'name']);
    }

    public function delivery_address(){
        return $this->hasMany(CustomerDeliveryAddress::class, 'customer_id', 'id')->select(['id', 'address','line2','city','state','zip_code', 'country', 'customer_id']);
    }

    public function contacts(){
        return $this->hasMany(Contacts::class, 'customer_id', 'id')->select(['id', 'customer_id', 'first_name', 'last_name', 'email', 'phone']);
    }

    public function sale_receipts(){
        return $this->hasMany(Receipts::class, 'customer_id', 'id');
    }

    public function projects(){
        return $this->hasMany(Projects::class, 'creator', 'user_id');
    }

    public function files(){
        return $this->hasMany(ImageFile::class, 'customer_id', 'id')->select(['id', 'customer_id', 'name', 'image']);
    }
}
 ?>
