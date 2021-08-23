<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

</head>

<body>
    <div class="main print_view" >
        <div class="row">
            <div class="logo">
                <img :src="'/'+get_basic_information.logo" alt="" style="height: 50px;">
            </div>
            <div class="address">
                <div class="flex-container" style="padding:5px">
                    <div class="address-details" style="text-align: right;">
                        <h2>QUOTATION</h2>
                        <div>
                            <h4>hungrycoder</h4>
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
        </div>

        <div class="line"></div>

        <div class="row">
            <div class="bill-address">
                <div class="flex-container" style="padding: 5px;">
                    <div class="bill-details">
                        <h2>BILL To</h2>
                        <h4 style="text-transform: capitalize;">humburger</h4>
                        <span>
                            <p>jatrabari</p>
                            <p>jurain road , 1452</p>
                            <p>dhaka</p>
                            <p></p>
                            <p>Bangladesh</p>
                        </span>
                    </div>
                </div>
            </div>
            <div class="ship-address"><!----></div>
            <div class="order-date">
                <div class="flex-container" style="padding: 5px;">
                    <div class="order-date-details">
                        <h4><span>Quotation No:</span> <span>QOT-406</span></h4>
                        <h4><span>Date:</span> <span>2021-08-20</span></h4>
                        <h4><span>Expires On:</span> <span>2021-09-20</span></h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12" style="width: 100%; padding: 0px;">
                <table cellspacing="0" class="inv_table">
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
                                <h5>huwaui mobile</h5>
                                <p></p>
                            </td>
                            <td>
                                1
                            </td>
                            <td>
                                ৳ 5000 / Piece
                            </td>
                            <td>
                                ৳ 5000
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td colspan="2"><b>Subtoal:</b></td>
                            <td>৳ 5000</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">vat :</td>
                            <td>৳ 375</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">source_tax :</td>
                            <td>৳ 200</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">test :</td>
                            <td>৳ 600</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2"><b>Flat Amount:</b></td>
                            <td>
                                ৳ -150
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2"><b>Total:</b></td>
                            <td>
                                ৳ 6025
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2"><b>Grand Total (BDT):</b></td>
                            <td><b>৳ 6025</b></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>


        <div class="row" v-if="quote.document_note">
            <div class="terms">
                <div class="flex-container">
                    <div class="terms-details">
                        <h4>Notes/Terms</h4>
                        <p v-html="get_document_note"></p>
                        <!-- <p> <span>01.</span> <span>This Price Excluding All Kind of Tax</span></p>
                        <p> <span>02.</span> <span>This Price Including Transport & Unloading Bill</span></p>
                        <p>
                            <span>03.</span>
                            <span>The bill must be paid within 07 days from the date of submis extra charge
                                at the rate of BDT 500.00 per day owing to the </span>
                        </p>
                        <p style="color:black;">
                            <span>04.</span>
                            <span>Insite measurement For every 23-foot long track the height must
                                be measured by adding an extra 2.5"-3" (inch) for the jumping
                                shake.</span>
                        </p> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="prepared_by" v-if="quote.creator_info" style="height:47px;">
            <h5>Shefat</h5>
            <h6>prepared by</h6>
        </div>

    </div>


</body>

</html>
