<?php
namespace App\Model;

use App\RecieptExpense;
use Illuminate\Database\Eloquent\Model;

class Receipts extends Model
{

    protected $appends = ['files','available_amount'];

    public function getFilesAttribute()
    {
        return ImageFile::where('type','sales_receipt')->select('id','name','image','type','type_id')->where('type_id',$this->id)->get();
    }

    public function getAvailableAmountAttribute()
    {
        return $this->amount - RecieptExpense::where('receipt_id',$this->id)->sum('amount');
    }

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        ''
    ];

    public function receipt_splits()
    {
        return $this->hasMany('App\Model\ReceiptSplit','receipt_id','id');
    }
}
 ?>
