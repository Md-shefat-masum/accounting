<?php

namespace App\Exports;

use App\Model\Deliverynote;
use App\Model\Quotes;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DeliveryNoteExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Deliverynote::where('creator',Auth::user()->id)
                ->orderBy('deliverynotes.date','DESC')
                ->join('customers',"deliverynotes.customer_id",'=','customers.id')
                ->select(
                    'deliverynotes.date',
                    'deliverynotes.code',
                    'deliverynotes.subtotal',
                    'deliverynotes.vat',
                    'deliverynotes.total',
                    'deliverynotes.currency',
                    'deliverynotes.customer',
                    'deliverynotes.po_number',
                    'deliverynotes.delivery_method',
                    'deliverynotes.vehicle_number',
                    'deliverynotes.operator_name',
                    'deliverynotes.operator_phone_number',
                    'deliverynotes.status',
                    'customers.business_code',
                    'deliverynotes.private_note',
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
                'Name',

                'Phone Number',
                'Delivery Method',
                'Vehicle Number',
                'Operator Name',
                'Operator Phone',

                'Status',
                'Customer',
                'Private Note',
                'Last Name',
            ];
    }
}
