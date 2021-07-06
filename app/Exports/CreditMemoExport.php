<?php

namespace App\Exports;

use App\Model\Creditmemos;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CreditMemoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Creditmemos::where('creator',Auth::user()->id)
                ->orderBy('creditmemos.date','DESC')
                ->join('customers',"creditmemos.customer_id",'=','customers.id')
                ->select(
                    'creditmemos.date',
                    'creditmemos.code',
                    'creditmemos.subtotal',
                    'creditmemos.vat',
                    'creditmemos.total',
                    'creditmemos.currency',
                    'creditmemos.payment_terms',
                    'creditmemos.customer',
                    'customers.business_code',
                    'creditmemos.private_note',
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
                'Payment Terms',
                'Name',
                'Customer',
                'Private Note',
                'Last Name',
            ];
    }
}
