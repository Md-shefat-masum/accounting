<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
</head>

<body>
    <section>
        <h3 class="heading">RECEIPT OF PAYMENT</h3>
    </section>
    <section class="my-1">
        <div class="left">
            <h4>{{ $data['quotes']->customer }}</h4>
            <ul>
                <li>Teton Road</li>
                <li>14</li>
                <li>Vughan On 1444</li>
                <li>CANADA</li>
            </ul>
        </div>
        <div class="right">
            <ul>
                <li>no.{{$data['quotes']->code}}</li>
                <li>{{$data['quotes']->payment_date}}</li>
                <li><b>{{$data['quotes']->project}}</b></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </section>
    <section class="my-1">
        <div class="left">
            <u>Billing Address</u>
            <ul>
                <li>
                    <h4>{{ Auth::user()->name }}</h4>
                </li>
                <li>{{ $data['quotes']->invoice_info->address }}</li>
            </ul>
        </div>
        <div class="right">
            <u>Shipping Address</u>
            <ul>
                <li>
                    @if ($data['quotes']->delivery_contact)
                        <h4>{{ $data['quotes']->invoice_info->delivery_contact }}</h4>
                    @else
                        <h4>{{ Auth::user()->name }}</h4>
                    @endif
                </li>
                @if ($data['quotes']->delivery_address)
                    <li>
                        {{ $data['quotes']->invoice_info->delivery_address }}
                    </li>
                @else
                    <li>
                        {{ $data['quotes']->invoice_info->address }}
                    </li>
                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </section>
    <section>
        <table>
            <thead>
                <tr>
                    <th class="r-1">Date Of Receipt</th>
                    <th>Payment Type</th>
                    <th>Bank Reference</th>
                    <th>Invoice No</th>
                    <th style="text-align: right;">Amout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$data['quotes']->payment_date}}</td>
                    <td>{{$data['quotes']->payment_method}}</td>
                    <td>{{$data['quotes']->bank_reference}}</td>
                    <td>{{$data['quotes']->invoice_code}}</td>
                    <td style="text-align: right;">{{$data['quotes']->paid}}</td>
                </tr>
            </tbody>
        </table>
    </section>
    <section>
        {{-- <h6>Payment Infomation</h6>
        <hr>
        <p class="doc_des">
            {{ $data['quotes']->note }} 
        </p> --}}

    </section>

    <style>
        *,
        body {
            outline: 0;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        ul li{
            list-style-type: none;
            font-size: 13px;
            padding: 2px 0px;
        }
        body{
            padding: 30px;
        }

        /* section {
            border: 1px solid red;
        } */

        .heading {
            text-align: right;
            text-transform: uppercase;
        }

        .left {
            float: left;
            width: 50%;
            overflow: hidden;
        }

        .right {
            float: right;
            text-align: right;
            width: 50%;
            overflow: hidden;
        }

        .clearfix {
            clear: both;
        }

        .my-1 {
            margin: 10px 0px;
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        thead {
            background: rgba(0, 0, 0, .1);
        }

        th,
        td {
            padding: 10px 5px;
            text-align: left;
            font-size: 13px;
            border-collapse: collapse;
            border-spacing: 0px;
            border: 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .r-1 {
            text-align: left;
            width: 40%;
        }

        .r-1.li {
            text-align: left;
        }

        tfoot tr td,
        tfoot tr th {
            border: 0;
            padding: 10px 5px;
        }

        h6 {
            font-size: 16px;
            padding: 10px 0px;
        }

        hr{
            width: 50%;
        }

        .doc_des{
            line-height: 24px;
            font-size: 15px;
        }

        h4{
            padding: 2px 0px;
        }

    </style>
</body>

</html>
