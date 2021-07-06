<!DOCTYPE html>
<html>

<head>
    <title>Quotation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }
        @font-face{
            font-family: 'avarta';
            src: url('/avarta.ttf');
        }
        body {
            font-family: avarta;
            margin: 0;
            padding: 20px;

        }
        .main {
            overflow: hidden;
            display: block;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
        }
        .logo {
            flex: 50%;
            padding: 20px;
        }
        .address {
            justify-content: right;
            flex: 50%;
            background-color: white;
            padding: 20px;
            padding-bottom: 0;
            padding-right: 0;
        }

        .bill-details p,
        .address p {
            font-size: 14px;
            line-height: 16px;
        }

        .flex-container {
            display: flex;
            flex-direction: column;
        }

        .flex-container .address-details {
            text-align: right;
        }

        .flex-container .address-details h2 {
            margin: 0px 0px 0px 0px;
            font-size: 36px;
            font-weight: 400;
        }

        .flex-container .address-details h4 {
            margin: 10px 0px 0px 0px;
            font-size: 14px;
        }

        .flex-container .address-details p {
            margin: 3px 0px
        }

        .bill-address {
            justify-content: right;
            flex: 31%;
            background-color: white;
            padding: 0px 10px 20px 0px;
        }

        .bill-address h2 {
            margin: 10px 0px 5px 0px;
            color: #8C959A;
            font-size: 14px;
            font-weight: 400;
        }

        .bill-address h4 {
            margin: 5px 0px;
            font-size: 12px;
        }

        .bill-address p {
            margin: 0px;
            font-size: 14px;
            line-height: 16px;
        }

        .ship-address {
            justify-content: right;
            flex: 31%;
            background-color: white;
            padding: 0px 10px 20px 10px;
        }

        .ship-address h2 {
            margin: 10px 0px 5px 0px;
            color: #8C959A;
            font-size: 14px;
            font-weight: 400;
        }

        .ship-address h4 {
            margin: 5px 0px;
            font-size: 12px;
        }

        .ship-address p {
            margin: 0px;
            font-size: 14px;
            line-height: 16px;
        }

        .order-date {
            justify-content: right;
            flex: 24%;
            background-color: white;
            padding: 27px 0px 20px;
        }

        .order-date h4 {
            margin: 3px 0px;
            font-size: 13px;
        }

        .order-date span:nth-child(2) {
            color: #000000;
            font-weight: 400;
        }

        .flex-container .order-date-details {
            text-align: right;
        }

        .bill-item-1 {
            justify-content: right;
            flex: 40%;
            padding: 0px 0px 20px 0px;
        }

        .bill-item-2 {
            justify-content: right;
            flex: 20%;
        }

        .bill-item-3 {
            justify-content: right;
            flex: 20%;
        }

        .bill-item-4 {
            justify-content: right;
            flex: 20%;
        }

        .bill-item h4 {
            padding: 10px 10px;
        }

        .bill-item p {
            margin: 10px 20px 0px 10px;
        }

        .bill-item h5 {
            margin: 10px 20px 0px 10px;
            font-size: 16px;
        }

        .terms {
            justify-content: right;
            flex: 60%;
        }

        .terms h4 {
            margin: 10px 0px 5px 0px;
        }

        .terms p {
            margin: 0px;
            font-size: 13px;
            width: 70%;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin-bottom: 10px;
        }

        .terms p span:nth-child(1) {
            width: 30px;
        }

        .terms p span:nth-child(2) {
            width: 85%;
        }

        .subtotal {
            justify-content: right;
            flex: 20%;
        }

        .flex-container .subtotal-details {
            text-align: left;
        }

        .subtotal-details h4 {
            margin: 10px 0px 5px 0px;
        }

        .subtotal-details p {
            margin: 10px 0px 5px 0px;
        }

        .total-ammount {
            justify-content: right;
            flex: 20%;
        }

        .total-ammount-details h4 {
            margin: 10px 0px 5px 10px;
        }

        .total-ammount-details p {
            margin: 10px 0px 5px 10px;
        }

        .inv_table {
            width: 100%;
        }

        .inv_table thead {
            background: #acacac78;
        }

        .inv_table thead th {
            padding: 10px 15px;
        }

        .inv_table tfoot td,
        .inv_table tbody td {
            padding: 5px 15px;
        }

        .inv_table thead th:first-child {
            text-align: left;
        }

        .inv_table tbody td:nth-child(2) {
            text-align: center;
        }

        .inv_table tbody tr td {
            border-bottom: 1px solid #acacac78;
        }

        .inv_table tfoot td:nth-child(2),
        .inv_table tfoot td:nth-child(3),
        .inv_table tbody td:nth-child(3),
        .inv_table tbody td:nth-child(4),
        .inv_table thead th:nth-child(3),
        .inv_table thead th:nth-child(4) {
            text-align: right;
        }

        table thead th {
            font-size: 13px;
        }

        table tbody td,
        table tbody td p {
            font-size: 12px;
            margin: 5px 0px;
        }

        table tbody td h5 {
            font-size: 12px;
            margin: 5px 0px;
        }

        table thead th:nth-child(2) {
            width: 100px;
        }

        table thead th:nth-child(3) {
            width: 120px;
        }

        table tfoot td {
            font-size: 13px;
            font-weight: 400;
        }

        /* @media screen and (max-width: 700px) {
            .row {
                flex-direction: column;
            }
        } */

        .order-date-details{
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        .order-date-details span:nth-child(2){
            width: 45%;
            display: inline-block;
        }

        .hr {
            width: 100%;
            height: 1px !important;
            background-color: #acacac78 !important;
            -webkit-print-color-adjust: exact;
        }

        .line {
            width: 768px;
            height: 1px !important;
            background-color: #acacac78 !important;
            -webkit-print-color-adjust: exact;

        }

        @media print {
            .inv_table thead {
                background: #acacac78 !important;
                -webkit-print-color-adjust: exact;
            }

            .line {
                width: 768px;
                height: 1px !important;
                background-color: rgb(146, 146, 146) !important;
                -webkit-print-color-adjust: exact;
            }

            table thead th:nth-child(2) {
                border-right: 0;
            }
        }
    </style>
</head>

<body>
    <div class="main">

        <div class="row">
            <div class="logo">
                <img src="http://akaunter.com/pdflogo.png" alt="" style="height: 50px;">
            </div>
            <div class="address">
                <div class="flex-container" style="padding:5px">
                    <div class="address-details">

                        <h2>QUOTATION</h2>

                        <h4>Orika Corporation</h4>
                        <p>218/3/A (3rd floor) West Kafrul,</p>
                        <p>Begum Rokeya Ave,Shwerapara</p>
                        <p>Dhaka 1216</p>
                        <p>Phone: +8809638786786</p>
                        <p>Mobile: +8801712662245</p>
                        <p>www.orika.com.bd</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="line"></div>

        <div class="row">
            <div class="bill-address">
                <div class="flex-container" style="padding:5px">
                    <div class="bill-details">

                        <h2>BILL To</h2>

                        <p>Managing Director</p>

                        <h4>Asian Paints Bangladesh Limited</h4>
                        <p>cha-90/3,progoti sarani, north</p>
                        <p>Badda</p>
                        <p>dhaka-1209</p>
                    </div>
                </div>
            </div>
            <div class="ship-address">
                <div class="flex-container" style="padding:5px">
                    <div class="ship-details">

                        <h2>SHIP To</h2>

                        <p>Shuvo- 00000000</p>

                        <h4>Asian Paints Bangladesh Limited</h4>
                        <p>cha-90/3,progoti sarani, north</p>
                        <p>Badda</p>
                        <p>dhaka-1209</p>
                    </div>
                </div>
            </div>
            <div class="order-date">
                <div class="flex-container" style="padding:5px">
                    <div class="order-date-details">
                        <h4><span>Quotation No:</span> <span>1928828</span></h4>
                        <h4><span>Date:</span> <span>April 14, 2021</span></h4>
                        <h4><span>Expires On:</span> <span>April 14, 2021</span></h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12" style="width: 100%;">
                <table class="inv_table" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Items</th>
                            <th>Quantity</th>
                            <th>Rate / Unit</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <h5>3/4" Meghalaya Crushed Stone Chips</h5>
                                <p>This product</p>
                            </td>
                            <td>
                                36,000
                            </td>
                            <td>
                                192.00
                            </td>
                            <td>
                                6,91,2000.00
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>3/4" Meghalaya Crushed Stone Chips</h5>
                                <p>This product</p>
                            </td>
                            <td>
                                36,000
                            </td>
                            <td>
                                192.00
                            </td>
                            <td>
                                6,91,2000.00
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>3/4" Meghalaya Crushed Stone Chips</h5>
                                <p>This product</p>
                            </td>
                            <td>
                                36,000
                            </td>
                            <td>
                                192.00
                            </td>
                            <td>
                                6,91,2000.00
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td colspan="2"><b>Subtoal:</b></td>
                            <td>6,90,15265</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">Source Tax 4%:</td>
                            <td>6,90,15265</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">Vat 7.5%:</td>
                            <td>90,15265</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <b>Total:</b>
                            </td>
                            <td>
                                90,15265
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <b>Grand Total (BDT):</b>
                            </td>
                            <td>
                                <b>90,15265</b>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>

        <div class="row">

            <div class="terms">
                <div class="flex-container">
                    <div class="terms-details">
                        <h4>Notes/Terms</h4>
                        <p> <span>01.</span> <span>This Price Excluding All Kind of Tax</span></p>
                        <p> <span>02.</span> <span>This Price Including Transport & Unloading Bill</span></p>
                        <p>
                            <span>03.</span>
                            <span>The bill must be paid within 07 days from the date of submis extra charge
                                at the rate of BDT 500.00 per day owing to the </span>
                        </p>
                        <p>
                            <span>04.</span>
                            <span>Insite measurement For every 23-foot long track th
                                e height must be measured by adding an extra 2.5"-3" (inch) for the jumping
                                shake.</span>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>

</html>
