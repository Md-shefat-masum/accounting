<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="U+09F3" />
        <meta name="viewport"  content="width=device-width, initial-scale=1.0" />
        {{-- <meta http-equiv="Content-Type" content="text/html; charset=U+09F3; "/> --}}
        <title>PAYMENT RECEIPT</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <style>
            body {
                padding: 0;
                margin: 0;
                outline: 0;
                margin: 0 auto;
                /* font-family: Averta; */
                font-family: 'Heebo'!important;
            }

            .heading{
                margin: 10px 0px 5px 0px;
                color: #8C959A;
                font-size: 14px;
                line-height: 10px;
                font-weight: 400;
                text-transform: uppercase;
            }

            .heading2{
                margin: 5px 0px;
                font-size: 14px;
                text-transform: capitalize;
                line-height: 10px;
            }
            .heading2p{
                margin: 0px;
                font-size: 14px;
                line-height: 10px;
            }

            .heading3{
                margin: 0px 0px;
                font-size: 14px;
                display: inline-block;
                text-align: right;
                width: 65%;
            }

            .heading3Details{
                font-weight: 400;
                width: 35%;
                font-size: 13px;
                line-height: 10px;
                display: inline-block;
                text-align: right;
                float: right;
            }

            .heading4{
                margin: 0px 0px;
                display: block;
                line-height: 12px;
            }

            .addressHeading2{
                margin: 0px 0px 0px 0px;
                font-size: 36px;
                font-weight: 400;
                line-height: 30px;
            }

            .addressHeading{
                margin: 10px 0px 0px 0px;
                font-size: 14px;
                line-height: 10px;
            }

            .addressp{
                margin: 3px 0px;
                font-size: 14px;
                line-height: 10px;
            }

            .left {
                float: left;
                position: relative;
                height: 406px;
                border: 1px solid #494949;
                display: block;
                width: 33px;
                text-align: center;
                width: 35px;
                box-sizing: border-box;
                margin-left: 5px;
                top: 5px;
                /* border: 1px solid red; */
            }

            .right{
                float: left;
                /* width: calc(100% - 37px); */
                /* border: 1px solid red; */
                width: 97%;
            }

            .left h1 {
                font: bold 14px Sans-Serif;
                letter-spacing: 5px;
                text-transform: uppercase;
                padding: 5px 10px;
                line-height: 20px;
                font-size: 20px;
                position: absolute;
                left: 0px;
                transform-origin: 0 0;
                transform: rotate(-90deg);
                top: 385px;
                width: 405px;
                word-spacing: 5px;
                margin: 0;
                left: -5px;
            }

            @page {
                margin: 0px;
                size: A4;
            }

            ul{
                width: 100%;
                display: block;
            }

            li{
                list-style-type: none;
                /* position: relative; */
            }

            .snd{
                position: relative;
            }
            .snd::after {
                position: absolute;
                content: '';
                width: 100%;
                height: 2px;
                background-color: #666666;
                left: 0;
                bottom: 0;
            }

            .pl_10{
                padding-left: 15px;
            }

        </style>

    </head>

    <body>

        <div>
            <div class="left">
                <h1>PAYMENT RECEIPT</h1>
            </div>

            <div class="right">
                <div style="height: 150px;padding: 15px 30px;">
                    <div class="logo" style="float:left; width: 48%;">
                        <div style="
                            height: 50px;
                            width: 200px;
                            margin-bottom: 20px;
                            background-repeat: no-repeat;
                            background-size: 100%;
                            background-position: left center;
                            background-image: url('{{$data['logo']}}')">
                        </div>
                        <table style="font-size: 12px;">
                            <tr>
                                <td><b>Receipt No: </b> IPAY-004</td>
                                <td style="width: 10px;"></td>
                                <td><b>Date:</b> 8/20/2021</td>
                            </tr>
                        </table>
                    </div>
                    <div class="address" style="float:right;width: 48%;">
                        <div class="address-details" style="text-align: right;">
                            <div>
                                <h4 class="addressHeading">{{ $data['user']->company }}</h4>
                                @isset(json_decode($data['user']->address)->line1)
                                    <p class="addressp">{{ json_decode($data['user']->address)->line1 }}</p>
                                @endisset
                                @isset(json_decode($data['user']->address)->line2)
                                    <p class="addressp">{{ json_decode($data['user']->address)->line2 }}</p>
                                @endisset
                                @isset(json_decode($data['user']->address)->line3)
                                    <p class="addressp">{{ json_decode($data['user']->address)->line3 }}</p>
                                @endisset
                                <p class="addressp">Phone: {{ $data['user']->phone }}</p>
                                <p class="addressp">Mobile: {{ $data['user']->mobile }}</p>
                                <p class="addressp">{{ $data['user']->website }}</p>
                            </div>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <table style="width: 100%;padding: 0px 30px;font-size: 13px;">
                    <tr>
                        <td style="width: 110px;"><b>RECIVED FROM</b></td>
                        <td>
                            @if ($data['customer']->is_company)
                                <div class="pl_10">{{ $data['customer']->company_name }}</div>
                            @else
                                <div class="pl_10">{{ $data['customer']->first_name }} {{ $data['customer']->last_name }}</div>
                            @endif
                            <hr style="margin: 0;padding: 0;border:0;border-bottom:1px solid black;">
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;padding: 0px 30px;font-size: 13px;">
                    <tr>
                        <td style="width: 70px;"><b>AMOUNT</b></td>
                        <td><div class="pl_10">{{ $data['quotes']->amount }}/=</div> <hr style="margin: 0;padding: 0;border:0;border-bottom:1px solid black;"></td>
                    </tr>
                </table>
                <table style="width: 100%;padding: 0px 30px;font-size: 13px;">
                    <tr>
                        <td style="width: 35px;"><b>FOR</b></td>
                        <td>
                            <div class="pl_10">
                                @foreach ($data['related_splits'] as $item)
                                    {{ $item->category }}, &amp;
                                @endforeach
                            </div>
                            <hr style="margin: 0;padding: 0;border:0; border-bottom:1px solid black;">
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;padding: 0px 30px;font-size: 13px;">
                    <tr>
                        <td style="width: 25px;"><b>BY</b></td>
                        <td>
                            <div class="pl_10">{{ $data['quotes']->payment_method }}</div>
                            <hr style="margin: 0;padding: 0;border:0;border-bottom:1px solid black;">
                        </td>
                    </tr>
                </table>

                <table style="width: 100%;padding: 0px 30px;font-size: 13px;text-align: center;margin-top: 40px;">
                    <tr>
                        <td style="width: 33.3%;">
                            <hr style="margin: 0;padding: 0;border:0; border-bottom:1px solid black; width: 40%; margin: 0 auto;">
                            <b>
                                Created By
                            </b>
                        </td>
                        <td style="width: 33.3%;">
                            <hr style="margin: 0;padding: 0;border:0; border-bottom:1px solid black; width: 40%; margin: 0 auto;">
                            <b>Received By</b>
                        </td>
                        <td style="width: 33.3%;">
                            <hr style="margin: 0;padding: 0;border:0; border-bottom:1px solid black; width: 40%; margin: 0 auto;">
                            <b>Authorized By</b>
                        </td>
                    </tr>
                </table>
            </div>

            <div style="clear:both;"></div>

        </div>

    </body>

</html>
