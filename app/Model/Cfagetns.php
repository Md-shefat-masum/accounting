<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cfagetns extends Model
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

    public function country_name(){
        return $this->hasOne(CountryCurrencie::class, 'id', 'country')->select(['id', 'name']);
    }

    public function delivery_address(){
        return $this->hasMany(CfagentsDeliveryAddress::class, 'cfagent_id', 'id')->select(['id', 'address', 'cfagent_id']);
    }

    public function contacts(){
        return $this->hasMany(Contacts::class, 'cfagent_id', 'id')->select(['id', 'cfagent_id', 'first_name', 'last_name', 'email', 'phone']);
    }
    public function files(){
        return $this->hasMany(ImageFile::class, 'cfagent_id', 'id')->select(['id', 'cfagent_id', 'name', 'image']);
    }
}
 ?>
