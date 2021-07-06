<?php

namespace App\Exports;

use App\Model\Deliverynote;
use App\Model\Quotes;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DeliveryNoteLineExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Deliverynote::where('deliverynotes.creator',Auth::user()->id)
                ->orderBy('deliverynotes.date','DESC')
                ->join('customers',"deliverynotes.customer_id",'=','customers.id')
                ->join('delivery_note_products',"deliverynotes.id",'=','delivery_note_products.delivery_note_id')
                ->select(
                    'deliverynotes.date',
                    'deliverynotes.code',
                    'deliverynotes.currency',
                    'deliverynotes.customer',

                    'delivery_note_products.description',
                    'delivery_note_products.qty',
                    'delivery_note_products.sales_price',
                    'delivery_note_products.total_price',
                    'delivery_note_products.sales_price AS product_price_before', //total before
                    'delivery_note_products.vat_on_sales', 
                    'delivery_note_products.total_price AS product_price_inc_tax', //inc tax
                    
                    'customers.business_code',
                    'customers.last_name',
                    
                )
                ->get();
    }

    public function headings():array
    {
        return [
                'Date',
                'Code',
                'Currency',
                'Name',

                'Product Name',
                'Qty',
                'Unit Amount',
                'Total Unit Amount',
                'Total Before',
                'Vat Amount',
                'Total Inc Tax',

                'Customer Code',
                'Last Name',
            ];
    }
}
