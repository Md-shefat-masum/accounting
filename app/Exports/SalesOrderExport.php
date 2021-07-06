<?php

namespace App\Exports;

use App\Model\Deliverynote;
use App\Model\Invoices;
use App\Model\Quotes;
use App\Model\Saleorders;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesOrderExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Saleorders::where('creator',Auth::user()->id)
                ->orderBy('saleorders.date','DESC')
                ->join('customers',"saleorders.customer_id",'=','customers.id')
                ->select(
                    'saleorders.date',
                    'saleorders.code',
                    'saleorders.subtotal',
                    'saleorders.vat',
                    'saleorders.total',
                    'saleorders.currency',
                    'saleorders.po_number',
                    'saleorders.payment_terms',
                    'saleorders.customer',
                    'saleorders.status',
                    'customers.business_code',
                    'saleorders.private_note',
                    'customers.last_name'
                )
                ->get();
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
                'Phone Number',
                'Payment Terms',
                'Name',
                'Status',
                'Customer',
                'Private Note',
                'Last Name',
            ];
    }
}
