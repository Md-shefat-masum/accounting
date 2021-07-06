<?php

namespace App\Exports;

use App\Model\Quotes;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class QuotesLineExport implements FromCollection, WithHeadings
{

    public function __construct($ids) {
        $this->ids = $ids;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        if($this->ids != NULL){
            return Quotes::where('quotes.creator',Auth::user()->id)
                ->whereIn('quotes.id',$this->ids)
                ->orderBy('quotes.date','DESC')
                ->join('customers',"quotes.customer_id",'=','customers.id')
                ->join('quote_products',"quotes.id",'=','quote_products.quote_id')
                ->select(
                    'quotes.date',
                    'quotes.code',
                    'quotes.currency',
                    'quotes.customer',

                    'quote_products.description',
                    'quote_products.qty',
                    'quote_products.sales_price',
                    'quote_products.total_price',
                    'quote_products.sales_price AS product_price_before', //total before
                    'quote_products.vat_on_sales', 
                    'quote_products.total_price AS product_price_inc_tax', //inc tax
                    
                    'customers.business_code',
                    'customers.last_name',
                    
                )
                ->get();
        }
        return Quotes::where('quotes.creator',Auth::user()->id)
                ->orderBy('quotes.date','DESC')
                ->join('customers',"quotes.customer_id",'=','customers.id')
                ->join('quote_products',"quotes.id",'=','quote_products.quote_id')
                ->select(
                    'quotes.date',
                    'quotes.code',
                    'quotes.currency',
                    'quotes.customer',

                    'quote_products.description',
                    'quote_products.qty',
                    'quote_products.sales_price',
                    'quote_products.total_price',
                    'quote_products.sales_price AS product_price_before', //total before
                    'quote_products.vat_on_sales', 
                    'quote_products.total_price AS product_price_inc_tax', //inc tax
                    
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
