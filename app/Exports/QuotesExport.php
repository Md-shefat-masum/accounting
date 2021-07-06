<?php

namespace App\Exports;

use App\Model\Quotes;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class QuotesExport implements FromCollection, WithHeadings
{
    public $ids;

    public function __construct($ids) {
        $this->ids = $ids;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->ids != NULL){
            return Quotes::where('creator',Auth::user()->id)
                        ->whereIn('quotes.id',$this->ids)
                        ->orderBy('quotes.date','DESC')
                        ->join('customers',"quotes.customer_id",'=','customers.id')
                        ->select(
                            'quotes.date',
                            'quotes.code',
                            'quotes.subtotal',
                            'quotes.vat',
                            'quotes.total',
                            'quotes.currency',
                            'quotes.customer',
                            'quotes.status',
                            'customers.business_code',
                            'quotes.expiration_date',
                            'quotes.private_note',
                            'customers.last_name'
                        )
                        ->get();
        }else{
            return Quotes::where('creator',Auth::user()->id)
                    ->orderBy('quotes.date','DESC')
                    ->join('customers',"quotes.customer_id",'=','customers.id')
                    ->select(
                        'quotes.date',
                        'quotes.code',
                        'quotes.subtotal',
                        'quotes.vat',
                        'quotes.total',
                        'quotes.currency',
                        'quotes.customer',
                        'quotes.status',
                        'customers.business_code',
                        'quotes.expiration_date',
                        'quotes.private_note',
                        'customers.last_name'
                    )
                    ->get();
        }
        
    }

    public function headings():array
    {
        return [
                'Date',
                'Code',
                'Financial Net Subtotal',
                'VAT Amount',
                'Total',
                'Currency',
                'Name',
                'Status',
                'Customer',
                'Expiration',
                'Private Note',
                'Last Name',
            ];
    }
}
