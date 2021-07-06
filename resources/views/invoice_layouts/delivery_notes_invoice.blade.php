<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Notes</title>
</head>

<body>
    <section>
        <h3 class="heading">Delivery Notes</h3>
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
                <li>no.QOT-00{{$data['quotes']->id}}</li>
                <li>{{$data['quotes']->date}}</li>
                <li><b>Expire on {{$data['quotes']->expiration_date}}</b></li>
                <li><b>{{$data['quotes']->payment_terms}}</b></li>
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
                <li>{{ $data['quotes']->address }}</li>
            </ul>
        </div>
        <div class="right">
            <u>Shipping Address</u>
            <ul>
                <li>
                    @if ($data['quotes']->delivery_contact)
                        <h4>{{ $data['quotes']->delivery_contact }}</h4>
                    @else
                        <h4>{{ Auth::user()->name }}</h4>
                    @endif
                </li>
                @if ($data['quotes']->delivery_address)
                    <li>
                        {{ $data['quotes']->delivery_address }}
                    </li>
                @else
                    <li>
                        {{ $data['quotes']->address }}
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
                    <th class="r-1">Item name &amp; Description</th>
                    <th>VAT</th>
                    <th>Qty.</th>
                    <th>Unit price</th>
                    <th style="text-align: right;">Amout</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data['related_products'] as $item)
                    @php
                        $item = (object) $item;
                    @endphp
                    @if ($item->product_details)
                        <tr>
                            <td class="r-1">
                                <ul>
                                    <li>{{ $item->product_details->code }} {{ $item->product_details->name }}</li>
                                    <li>{{ $item->description }}</li>
                                </ul>
                            </td>
                            <td> {{ $item->disc }}% </td>
                            <td> {{ $item->qty }} </td>
                            <td> {{ number_format($item->sales_price,2) }} TK / {{ $item->product_details->unit }} </td>
                            <td style="text-align: right;"> {{ number_format($item->total_price,2) }} TK </td>
                        </tr>
                    @endif
                    
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <th colspan="2">Subtotal</th>
                    <th colspan="2" style="text-align: right;">{{ number_format($data['quotes']->subtotal) }} TK</th>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">Discount ( {{ $data['quotes']->discount_rate }}% )</td>
                    <td colspan="2" style="text-align: right;">{{ number_format($data['quotes']->discount_amount,2) }} TK</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">Vat</td>
                    <td colspan="2" style="text-align: right;">{{ number_format($data['quotes']->vat,2) }} TK</td>
                </tr>
                <tr>
                    <td></td>
                    <th colspan="2">TOTAL</th>
                    <th colspan="2" style="text-align: right;">{{ number_format($data['quotes']->total,2) }} TK</th>
                </tr>
            </tfoot>
        </table>
    </section>
    <section>
        <h6>Payment Infomation</h6>
        <hr>
        <p class="doc_des">
            {{ $data['quotes']->description }} 
        </p>

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
