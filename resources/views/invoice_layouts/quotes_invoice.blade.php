<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="U+09F3" />
        <meta name="viewport"  content="width=device-width, initial-scale=1.0" />
        {{-- <meta http-equiv="Content-Type" content="text/html; charset=U+09F3; "/> --}}
        <title>Quotation</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <style>
            /* @font-face {
                font-family: 'Averta';
                font-weight: normal;
                font-style: normal;
                font-variant: normal;
                src: url("{{asset('')}}fonts/Averta-Regular.woff2") format("woff2"), url("{{asset('')}}fonts/Averta-Regular.woff") format("woff");
            } */
            /* @font-face {
                font-family: "Averta";
                src: url("{{storage_path()}}/fonts/Averta-RegularItalic.woff2") format("woff2"), url("storage_path()}}/fonts/Averta-RegularItalic.woff") format("woff");
                font-weight: normal;
                font-style: italic;
                font-display: swap;
            } */
            /* @font-face {
                font-family: "Averta";
                src: url("/fonts/Averta-Regular.woff2") format("woff2"), url("/fonts/Averta-Regular.woff") format("woff");
                font-weight: normal;
                font-style: normal;
                font-display: swap;
            } */
            /*@font-face {
                font-family: "Averta";
                src: url("storage_path()}}/fonts/Averta-Semibold.woff2") format("woff2"), url("storage_path()}}/fonts/Averta-Semibold.woff") format("woff");
                font-weight: 600;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: "Averta";
                src: url("storage_path()}}/fonts/Averta-SemiboldItalic.woff2") format("woff2"), url("storage_path()}}/fonts/Averta-SemiboldItalic.woff") format("woff");
                font-weight: 600;
                font-style: italic;
                font-display: swap;
            }
            @font-face {
                font-family: "Averta";
                src: url("storage_path()}}/fonts/Averta-Bold.woff2") format("woff2"), url("storage_path()}}/fonts/Averta-Bold.woff") format("woff");
                font-weight: bold;
                font-style: normal;
                font-display: swap;
            }
            @font-face {
                font-family: "Averta";
                src: url("storage_path()}}/fonts/Averta-BoldItalic.woff2") format("woff2"), url("storage_path()}}/fonts/Averta-BoldItalic.woff") format("woff");
                font-weight: bold;
                font-style: italic;
                font-display: swap;
            } */
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

            .inv_table{
                width: 100%;
                text-align: center;
            }

            .inv_table thead{
                background-color: #444444;
                color: white;
                text-transform: uppercase;
                font-size: 14px;
                line-height: 10px;
            }

            .inv_table td{
                border-bottom: 1px solid #d4dde3;
            }

            .inv_table th{
                border-bottom: 0;
            }

            .inv_table tfoot td:first-child{
                border-bottom: 0;
            }
            .inv_table tfoot td:nth-child(2){
                text-align: right;
                padding-left: 15px;
                padding-right: 15px;
            }
            .inv_table th{
                padding-top: 10px;
                padding-bottom: 10px;
            }
            .inv_table tbody td,
            .inv_table tfoot td{
                padding-top: 5px;
                padding-bottom: 5px;
                font-size: 14px;
            }

            .inv_table th{
                font-weight: 600;
                font-family: sans-serif;
            }
            .inv_table td:first-child,
            .inv_table th:first-child{
                text-align: left;
                padding-left: 30px;
            }
            .inv_table td:nth-child(2),
            .inv_table th:nth-child(2){
                width: 110px;
            }
            .inv_table td:nth-child(3),
            .inv_table th:nth-child(3){
                text-align: right;
                padding-left: 15px;
                padding-right: 15px;
                width: 160px;
                box-sizing: border-box;
            }
            .inv_table td:last-child,
            .inv_table th:last-child{
                width: 118px;
                padding-right: 30px;
                text-align: right;
                box-sizing: border-box;
            }

            .inv_table tbody td h5{
                /* font-weight: 600; */
                text-align: left;
                font-size: 14px;
                line-height: 18px;
                margin: 0;
                text-transform: capitalize;
            }

            .inv_table tbody td:first-child p{
                color: #4c5357;
                font-size: 14px;
                font-weight: 400;
                line-height: 18px;
                margin: 0;
                text-align: left;
            }

            @page {
                margin: 0px;
                size: A4;
            }

        </style>

    </head>

    <body>

        <div class="main print_view" id="content">

            <div style="padding: 16px 30px 0px 30px;">
                <div class="logo" style="float:left; width: 48%; box-sizing: border-box;">
                    <div style="
                        height: 50px;
                        width: 200px;
                        background-repeat: no-repeat;
                        background-size: 100%;
                        background-position: left center;
                        background-image: url('{{$data['logo']}}')">
                    </div>
                </div>
                <div class="address" style="float:right;width: 48%; box-sizing: border-box;">
                    <div class="address-details" style="text-align: right;">
                        <h2 class="addressHeading2">QUOTATION</h2>
                        <div>
                            <h4 class="addressHeading">hungrycoder</h4>
                            <p class="addressp">218/3/A (3rd floor) West Kafrul,</p>
                            <p class="addressp">Begum Rokeya Ave,Shwerapara</p>
                            <p class="addressp">Dhaka 1216</p>
                            <p class="addressp">Phone: +8809638786786</p>
                            <p class="addressp">Mobile: +8801712662245</p>
                            <p class="addressp">www.orika.com.bd</p>
                        </div>
                    </div>
                </div>
                <div style="clear: both;"></div>
            </div>

            <div class="line"></div>

            {{-- <div class="row" style="display: flex;"> --}}
            <div style="padding: 20px 30px 0px 30px;">
                <div class="bill-address" style="float: left; width:33%; box-sizing: border-box;">
                    <h2 class="heading">BILL To</h2>
                    <h4 class="heading2">humburger</h4>
                    <span class="heading2p">
                        <p class="heading2p">
                            {!! nl2br( $data['quotes']->address ) !!}
                        </p>
                        {{-- <p class="heading2p">jatrabari</p> --}}
                    </span>
                </div>
                <div class="ship-address" style="float: left; width:33%; box-sizing: border-box;">
                    @if ($data['quotes']->delivery_address)
                        <h2 class="heading">Ship To</h2>
                        <h4 class="heading2">humburger</h4>
                        <span>
                            <p class="heading2p">
                                {!! nl2br( $data['quotes']->delivery_address ) !!}
                            </p>
                            {{-- <p class="heading2p">jatrabari</p> --}}
                        </span>
                    @endif

                </div>
                <div class="order-date" style="float: right; width:33%;text-align: right; box-sizing: border-box;">
                    <h4 class="heading4"><span class="heading3">Quotation No:</span> <span class="heading3Details">QOT-406</span></h4>
                    <h4 class="heading4"><span class="heading3">Date:</span> <span class="heading3Details">2021-08-20</span></h4>
                    <h4 class="heading4"><span class="heading3">Expires On:</span> <span class="heading3Details">2021-09-20</span></h4>
                </div>
                <div style="clear: both;"></div>
            </div>

            <table cellspacing="0" class="inv_table" style="padding-top: 20px;">
                <thead>
                    <tr>
                        <th><span style="line-height: 10px; padding-top: 0px; padding-bottom: 0px; display: inline-block;">Items</span></th>
                        <th><span style="line-height: 10px; padding-top: 0px; padding-bottom: 0px; display: inline-block;">Quantity</span></th>
                        <th style="text-align: right;"><span style="line-height: 10px; padding-top: 0px; padding-bottom: 0px; display: block;">Rate / Unit</span></th>
                        <th style="text-align: right;"><span style="line-height: 10px; padding-top: 0px; padding-bottom: 0px; display: block;">Amount</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['related_products'] as $related_product)
                        <tr>
                            <td style="padding-left: 30px;">
                                <h5 style="margin: 0;text-align: left;line-height: 10px;border:font-size: 14px;">
                                    {{ $related_product->name }}
                                </h5>
                                @if ($related_product->description)
                                    <p style="margin: 0;text-align: left; font-weight: normal;color:#4c5357;line-height: 10px;font-size: 12px;">
                                        {{ $related_product->description }}
                                    </p>
                                @endif
                            </td>
                            <td>
                                <span style="font-weight: normal;"> {{ $related_product->qty }} </span>
                            </td>
                            <td>
                                <span style="font-weight: normal;">
                                    tk {{ $related_product->unit }}
                                    @if ($related_product->unit)
                                        / {{ $related_product->unit }}
                                    @endif
                                </span>
                            </td>
                            <td>
                                <span style="font-weight: normal;">tk {{ $related_product->total_price }}</span>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" style="border-bottom: 0;"></td>
                        <td><b>Subtoal:</b></td>
                        <td>tk {{ $data['quotes']->subtotal }}</td>
                    </tr>
                    @foreach (json_decode($data['quotes']->vat) as $vat)
                        <tr>
                            <td colspan="2" style="border-bottom: 0;"></td>
                            <td>{{ $vat->name }} :</td>
                            <td>tk  {{ number_format($vat->value,2) }}</td>
                        </tr>
                    @endforeach


                    <tr>
                        <td colspan="2" style="border-bottom: 0;"></td>
                        <td><b>Flat Amount:</b></td>
                        <td>
                            tk  -{{ $data['quotes']->discount_amount }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: 0;"></td>
                        <td><b>Total:</b></td>
                        <td>tk  {{ $data['quotes']->total }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: 0;"></td>
                        <td><b>Grand Total (BDT):</b></td>
                        <td><b>tk  {{ $data['quotes']->total }}</b></td>
                    </tr>
                </tfoot>
            </table>

            <div class="row" v-if="quote.document_note" style="padding: 30px 30px 0px 30px;">
                <div class="terms">
                    <div class="flex-container">
                        <div class="terms-details">
                            <h4 style="margin-bottom: 0px;">Notes/Terms</h4>
                            <p style="margin-top: 0px; line-height: 14px; font-size: 13px;">
                                {!! nl2br( $data['quotes']->document_note ) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="prepared_by" v-if="quote.creator_info" style="
                height: 47px;
                position: fixed;
                bottom: 15px;
                left: 28px;">

                <h5 style="font-size: 14px; line-height: 14px;margin: 0;margin-bottom: 5px;">
                    {{ $data['quotes']->assigned_to }}
                </h5>

                <div>
                    <h6 style="
                            font-size: 14px;
                            line-height: 14px;
                            margin: 0;
                            padding-top: 0px;
                            font-weight: 400;
                            display: inline-block;
                            border-top: 1px solid rgb(131, 131, 131);">
                        prepared by
                    </h6>
                </div>
            </div>
        </div>

    </body>

</html>
