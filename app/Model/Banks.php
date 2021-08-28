<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var  array
     */
    protected $guarded = [
        'id'
    ];

    protected $appends = [
        'total_earn'
    ];

    public function getTotalEarnAttribute()
    {
        return Receipts::where('bank_id',$this->id)->sum('amount');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var  array
     */
    protected $casts = [
        ''
    ];

    public function sales_recipts()
    {
        return $this->hasMany(Receipts::class,'bank_id','id');
    }
}
 ?>
