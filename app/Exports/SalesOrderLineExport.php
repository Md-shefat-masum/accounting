<?php

namespace App\Exports;

use App\Model\Deliverynote;
use App\Model\Invoices;
use App\Model\Quotes;
use App\Model\Saleorders;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesOrderLineExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Saleorders::where('saleorders.creator',Auth::user()->id)
                ->orderBy('saleorders.date','DESC')
                ->join('customers',"saleorders.customer_id",'=','customers.id')
                ->join('sale_order_products',"saleorders.id",'=','sale_order_products.sale_order_id')
                ->select(
                    'saleorders.date',
                    'saleorders.code',
                    'saleorders.currency',
                    'saleorders.customer',

                    'sale_order_products.description',
                    'sale_order_products.qty',
                    'sale_order_products.sales_price',
                    'sale_order_products.total_price',
                    'sale_order_products.sales_price AS product_price_before', //total before
                    'sale_order_products.vat_on_sales', 
                    'sale_order_products.total_price AS product_price_inc_tax', //inc tax
                    
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
