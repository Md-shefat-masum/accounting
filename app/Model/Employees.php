<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
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

    public function files(){
        return $this->hasMany(ImageFile::class, 'employee_id', 'id')->select(['id', 'employee_id', 'name', 'image']);
    }
}
 ?>
