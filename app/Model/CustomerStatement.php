<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerStatement extends Model
{
    public function invoice_details()
    {
        return $this->belongsTo('App\Model\Invoices','invoice_id','id');
    }

    public function receipt_details()
    {
        return $this->belongsTo('App\Model\Receipts','receipt_id','id');
    }

    public function customer_details()
    {
        return $this->belongsTo('App\Model\Customers','customer_id','id');
    }
}
