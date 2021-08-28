<table>
    <thead>
        <tr>
            <td colspan="8" style="text-align: center;border-bottom: 1px solid black;"></td>
        </tr>
        <tr>
            <th style="width: 10px;background-color: #ff9e9e;border:1px solid black;"><b>Id</b></th>
            <th style="width: 20px;background-color: #ff9e9e;border:1px solid black;text-align: center;"><b>Company Name</b></th>
            <th style="width: 20px;background-color: #ff9e9e;border:1px solid black;text-align: center;"><b>First Name</b></th>
            <th style="width: 20px;background-color: #ff9e9e;border:1px solid black;text-align: center;"><b>Last Name</b></th>
            <th style="width: 30px;background-color: #ff9e9e;border:1px solid black;text-align: center;"><b>Email</b></th>
            <th style="width: 30px;background-color: #ff9e9e;border:1px solid black;text-align: center;"><b>Phone</b></th>
            <th style="width: 15px;background-color: #ff9e9e;border:1px solid black;text-align: right;"><b>Invoice</b></th>
            <th style="width: 15px;background-color: #ff9e9e;border:1px solid black;text-align: right;"><b>Pay</b></th>
            <th style="width: 15px;background-color: #ff9e9e;border:1px solid black;text-align: right;"><b>Due</b></th>
        </tr>
        <tr>
            <td colspan="8" style="text-align: center;border-bottom: 1px solid black;"></td>
        </tr>
    </thead>
    <tbody>
        @php
            use App\Model\Customers;
            use App\Model\Invoices;
            use App\Model\Receipts;
            $customers = \App\Model\Customers::where('user_id',Auth::user()->id)
                                ->select(
                                    'id',
                                    'company_name',
                                    'first_name',
                                    'last_name',
                                    'email',
                                    'phone',
                                )
                                ->get();
        @endphp
        @foreach ($customers as $item)
            <tr>
                <td style="background-color: #bafcff;border:1px solid black;">#{{ $item->id }}</td>
                <td style="background-color: #bafcff;border:1px solid black;">{{ $item->company_name }}</td>
                <td style="background-color: #bafcff;border:1px solid black;">{{ $item->first_name }}</td>
                <td style="background-color: #bafcff;border:1px solid black;">{{ $item->last_name }}</td>
                <td style="background-color: #bafcff;border:1px solid black;">{{ $item->email }}</td>
                <td style="background-color: #bafcff;border:1px solid black;">{{ $item->phone }}</td>
                <td style="background-color: #bafcff;border:1px solid black;">{{ $item->total_invoice = Invoices::where('customer_id',$item->id)->sum('total') }}</td>
                <td style="background-color: #bafcff;border:1px solid black;">{{ $item->payment = Receipts::where('customer_id',$item->id)->sum('amount') }}</td>
                <td style="background-color: #bafcff;border:1px solid black;">{{ $item->total_invoice - $item->payment }}</td>
            </tr>
            <tr>
                <td colspan="8" style="text-align: center;"> <b>Contacts</b></td>
            </tr>
            <tr>
                <td style="background-color: #bafcff;border:1px solid black;"></td>
                <td style="background-color: #bafcff;border:1px solid black;">First Name</td>
                <td style="background-color: #bafcff;border:1px solid black;">Last Name </td>
                <td style="background-color: #bafcff;border:1px solid black;">Email</td>
                <td style="background-color: #bafcff;border:1px solid black;" colspan="2">Phone</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @foreach (App\Model\Contacts::where('customer_id',$item->id)->get() as $contact)
                <tr>
                    <td style="background-color: #bafcff;border:1px solid black;"></td>
                    <td style="background-color: #bafcff;border:1px solid black;">{{ $contact->first_name }}</td>
                    <td style="background-color: #bafcff;border:1px solid black;">{{ $contact->last_name }}</td>
                    <td style="background-color: #bafcff;border:1px solid black;">{{ $contact->email }}</td>
                    <td style="background-color: #bafcff;border:1px solid black;" colspan="2">{{ $contact->phone }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach

            <tr>
                <td colspan="8" style="text-align: center;"></td>
            </tr>

        @endforeach

    </tbody>
</table>

@php
    // dd('get');
@endphp
