<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
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
        'text'
    ];

    public function getTextAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var  array
     */
    protected $casts = [
        ''
    ];
}
 ?>
