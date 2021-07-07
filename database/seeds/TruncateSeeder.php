<?php

use App\CustomerLog;
use App\Model\Contacts;
use App\Model\Creditmemos;
use App\Model\CustomerPaymentByReceipt;
use App\Model\Customerpayments;
use App\Model\Customers;
use App\Model\CustomerStatement;
use App\Model\Deliverynote;
use App\Model\Invoices;
use App\Model\Quotes;
use App\Model\Receivingnotes;
use App\Model\RelatedProduct;
use App\Model\Saleorders;
use Illuminate\Database\Seeder;

class TruncateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Contacts::truncate();
        Creditmemos::truncate();
        Creditmemos::truncate();
        Customerpayments::truncate();
        Customers::truncate();
        CustomerLog::truncate();
        CustomerPaymentByReceipt::truncate();
        CustomerStatement::truncate();
        Deliverynote::truncate();
        Invoices::truncate();
        Quotes::truncate();
        Receivingnotes::truncate();
        RelatedProduct::truncate();
        Saleorders::truncate();
        Saleorders::truncate();
    }
}
