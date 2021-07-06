<?php

namespace App\Exports;

use App\Model\Creditmemos;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CreditMemoLineExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Creditmemos::where('creditmemos.creator',Auth::user()->id)
                ->orderBy('creditmemos.date','DESC')
                ->join('customers',"creditmemos.customer_id",'=','customers.id')
                ->join('credit_memos_products',"creditmemos.id",'=','credit_memos_products.credit_memo_id')
                ->select(
                    'creditmemos.date',
                    'creditmemos.code',
                    'creditmemos.currency',
                    'creditmemos.customer',

                    'credit_memos_products.description',
                    'credit_memos_products.qty',
                    'credit_memos_products.sales_price',
                    'credit_memos_products.total_price',
                    'credit_memos_products.sales_price AS product_price_before', //total before
                    'credit_memos_products.vat_on_sales', 
                    'credit_memos_products.total_price AS product_price_inc_tax', //inc tax
                    
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
