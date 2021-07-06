<?php

namespace App\Exports;

use App\Model\Deliverynote;
use App\Model\Invoices;
use App\Model\Quotes;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvoiceLineExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Invoices::where('invoices.creator',Auth::user()->id)
                ->orderBy('invoices.date','DESC')
                ->join('customers',"invoices.customer_id",'=','customers.id')
                ->join('invoice_products',"invoices.id",'=','invoice_products.invoice_id')
                ->select(
                    'invoices.date',
                    'invoices.code',
                    'invoices.currency',
                    'invoices.customer',

                    'invoice_products.description',
                    'invoice_products.qty',
                    'invoice_products.sales_price',
                    'invoice_products.total_price',
                    'invoice_products.sales_price AS product_price_before', //total before
                    'invoice_products.vat_on_sales', 
                    'invoice_products.total_price AS product_price_inc_tax', //inc tax
                    
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
