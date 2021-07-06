<?php

namespace App\Exports;

use App\Model\Creditmemos;
use App\Model\Productservices;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductLineExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Productservices::where('creator',Auth::user()->id)
                ->orderBy('id','DESC')
                ->where('is_services',0)
                ->select(
                    'code',
                    'name',
                    'unit',
                    'sales_price',
                    'purchase_price',
                    'item_number',
                    'description',
                    'family',
                    'private_note',
                    'vat_on_sales',
                    'minimum_stock_quantity',
                    'receiving_location',
                    'picking_delivery_location',
                )
                ->get();
    }

    public function headings():array
    {
        return [
                'Code',
                'Name',
                'Unit',
                'Sales Price',
                'Purchase Price',
                'Item Number',
                'Description',
                'Family',
                'Private Note',
                'Vat On Sale',
                'minimum Stock',
                'Receiving Location',
                'Picking Delivery Location',
            ];
    }
}
