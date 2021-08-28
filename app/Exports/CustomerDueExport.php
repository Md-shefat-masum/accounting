<?php

namespace App\Exports;

use App\Model\Contacts;
use App\Model\Creditmemos;
use App\Model\Customers;
use App\Model\Invoices;
use App\Model\Productservices;
use App\Model\Receipts;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CustomerDueExport implements FromView
{

    public function view(): View
    {
        return view('export.test');
    }


    public function collection()
    {
        $customers = Customers::where('user_id',Auth::user()->id)
                                ->select(
                                    'id',
                                    'company_name',
                                    'first_name',
                                    'last_name',
                                    'email',
                                    'phone',
                                )
                                ->get();

        $data = [];
        foreach ($customers as $key => $item) {
            $contact_numbers = '';
            foreach (Contacts::where('customer_id',$item->id)->get() as $contact) {
                $contact_numbers .= '';
            }
            $item->contacts = '';
            $item->total_invoice = Invoices::where('customer_id',$item->id)->sum('total');
            $item->payment = Receipts::where('customer_id',$item->id)->sum('amount');
            $item->due = $item->total_invoice - $item->payment;
            array_push($data, $item->toArray());
            // dd($data,$item);

        }

        dd($data);

        return  collect([
            ['asdf',
            'asdf',
            'asdf',
            'asdf',
            'asdf',]
        ]);
    }

    // public function headings():array
    // {
    //     return [
    //             'Company Name',
    //             'First Name',
    //             'Last Name',
    //             'Email',
    //             'Phone',
    //         ];
    // }
}
