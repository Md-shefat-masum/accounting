<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
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

    public function contacts(){
        return $this->hasMany(Contacts::class, 'supplier_id', 'id')->select(['id', 'supplier_id', 'first_name', 'last_name', 'email', 'phone']);
    }
}
 ?>
