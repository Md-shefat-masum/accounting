<?php

namespace App\Exports;

use App\Model\Deliverynote;
use App\Model\Invoices;
use App\Model\Quotes;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvoiceExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Invoices::where('creator',Auth::user()->id)
                ->orderBy('invoices.date','DESC')
                ->join('customers',"invoices.customer_id",'=','customers.id')
                ->select(
                    'invoices.date',
                    'invoices.code',
                    'invoices.sub_total',
                    'invoices.vat',
                    'invoices.total',
                    'invoices.currency',
                    'invoices.po_number',
                    'invoices.payment_terms',
                    'invoices.customer',
                    'invoices.status',
                    'customers.business_code',
                    'invoices.private_note',
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
