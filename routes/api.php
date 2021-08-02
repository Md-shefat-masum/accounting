<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'Admin',
    'middleware' => 'auth:api',
    ], function () {

    // Functional Routes Start
    Route::get('country-list', 'CountrySettingsController@get_country');
    Route::get('division-list', 'CountrySettingsController@get_division');
    Route::get('district-list', 'CountrySettingsController@get_district');
    Route::get('upazila-list', 'CountrySettingsController@get_upazila');
    Route::get('union-list', 'CountrySettingsController@get_union');
    Route::get('thana-list', 'CountrySettingsController@get_thana');
    Route::get('post-office-list', 'CountrySettingsController@get_post_office');
    Route::get('city-post-code', 'CountrySettingsController@get_city_post_code');
    // Functional Routes End

    // profile settings start
    Route::post('/user-profile-update','UserController@profile_pic_update');
    Route::post('/user-email-update','UserController@email_update');
    Route::post('/user-password-update','UserController@password_update');
    Route::put('/user-preference-update','UserController@preference_update');
    Route::get('/user-information','UserController@get_user_info');
    // profile settings end

    // user role routes start

    Route::get('get-all-roles', 'UserRoleController@all_roles');
    Route::get('user-roles', 'UserRoleController@roles');
    Route::get('user-role/{role}', 'UserRoleController@get_role');
    Route::post('user-role', 'UserRoleController@store');
    Route::post('update-user-role', 'UserRoleController@update');
    Route::post('delete-user-role', 'UserRoleController@delete');

    // user role routes end

    Route::get('customer-get-basic-information', 'CustomersController@get_basic_information');
    Route::get('customers', 'CustomersController@list');
    Route::get('customers-paginate', 'CustomersController@listPaginate');
    Route::get('customers/{id}', 'CustomersController@get');
    Route::post('customers', 'CustomersController@create');
    Route::put('customers/{id}', 'CustomersController@update');
    Route::delete('customers/{id}', 'CustomersController@delete');
    Route::get('customer-statements/{id}', 'CustomersController@customer_statements');
    Route::get('customer-user_settings/{id}', 'CustomersController@customer_profile');

    Route::get('suppliers', 'SuppliersController@list');
    Route::get('suppliers-paginate', 'SuppliersController@listPaginate');
    Route::get('suppliers/{id}', 'SuppliersController@get');
    Route::post('suppliers', 'SuppliersController@create');
    Route::put('suppliers/{id}', 'SuppliersController@update');
    Route::delete('suppliers/{id}', 'SuppliersController@delete');

    Route::get('cfagetns', 'CfagetnsController@list');
    Route::get('cfagetns/{id}', 'CfagetnsController@get');
    Route::post('cfagetns', 'CfagetnsController@create');
    Route::put('cfagetns/{id}', 'CfagetnsController@update');
    Route::delete('cfagetns/{id}', 'CfagetnsController@delete');

    Route::get('employees', 'EmployeesController@list');
    Route::get('employees/{id}', 'EmployeesController@get');
    Route::post('employees', 'EmployeesController@create');
    Route::put('employees/{id}', 'EmployeesController@update');
    Route::delete('employees/{id}', 'EmployeesController@delete');

    Route::get('banks', 'BanksController@list');
    Route::get('banks/{id}', 'BanksController@get');
    Route::post('banks', 'BanksController@create');
    Route::put('banks/{id}', 'BanksController@update');
    Route::delete('banks/{id}', 'BanksController@delete');

    Route::get('payment-processor', 'PaymentProcessorController@list');
    Route::get('payment-processor/{id}', 'PaymentProcessorController@get');
    Route::post('payment-processor', 'PaymentProcessorController@create');
    Route::put('payment-processor/{id}', 'PaymentProcessorController@update');
    Route::delete('payment-processor/{id}', 'PaymentProcessorController@delete');

    Route::get('contacts', 'ContactsController@list');
    Route::get('contacts/{id}', 'ContactsController@get');
    Route::post('contacts', 'ContactsController@create');
    Route::put('contacts/{id}', 'ContactsController@update');
    Route::delete('contacts/{id}', 'ContactsController@delete');

    Route::get('quotes', 'QuotesController@list');
    Route::get('quotes/{id}', 'QuotesController@get');
    Route::post('quotes', 'QuotesController@create');
    Route::put('quotes/{id}', 'QuotesController@update');
    Route::delete('quotes/{id}', 'QuotesController@delete');
    Route::get('qutation_sort', 'QuotesController@qutation_sort');
    Route::get('qutation_by_day', 'QuotesController@qutation_by_day');
    Route::post('quotes_search', 'QuotesController@quotes_search');
    Route::post('update_qutation_status', 'QuotesController@update_qutation_status');

    Route::get('invoices', 'InvoicesController@list');
    Route::get('invoices/{id}', 'InvoicesController@get');
    Route::post('invoices', 'InvoicesController@create');
    Route::put('invoices/{id}', 'InvoicesController@update');
    Route::delete('invoices/{id}', 'InvoicesController@delete');
    Route::get('invoices_sort', 'InvoicesController@invoices_sort');
    Route::get('invoices_by_day', 'InvoicesController@invoices_by_day');
    Route::post('invoices_search', 'InvoicesController@invoices_search');

    Route::get('receipts_category', 'ReceiptsCategoryController@list');
    Route::get('receipts_category_by_type', 'ReceiptsCategoryController@list_by_type');
    Route::get('receipts_category_first', 'ReceiptsCategoryController@list_first');
    Route::get('receipts_category/{id}', 'ReceiptsCategoryController@get');
    Route::post('receipts_category', 'ReceiptsCategoryController@create');
    Route::put('receipts_category/{id}', 'ReceiptsCategoryController@update');
    Route::delete('receipts_category/{id}', 'ReceiptsCategoryController@delete');

    Route::get('receipts_sub_category', 'ReceiptsSubCategoryController@list');
    Route::get('receipts_sub_category/{id}', 'ReceiptsSubCategoryController@get');
    Route::post('receipts_sub_category', 'ReceiptsSubCategoryController@create');
    Route::put('receipts_sub_category/{id}', 'ReceiptsSubCategoryController@update');
    Route::post('receipts_sub_category_update', 'ReceiptsSubCategoryController@receipts_sub_category_update');
    Route::post('receipts_sub_category_create', 'ReceiptsSubCategoryController@receipts_sub_category_create');
    Route::delete('receipts_sub_category/{id}', 'ReceiptsSubCategoryController@delete');

    Route::get('receipts', 'ReceiptsController@list');
    Route::get('receipts-all', 'ReceiptsController@list_all');
    Route::get('receipts-all-by-user/{customer_id}', 'ReceiptsController@list_all_by_customer_id');
    Route::get('receipts/{id}', 'ReceiptsController@get');
    Route::post('receipts', 'ReceiptsController@create');
    Route::put('receipts/{id}', 'ReceiptsController@update');
    Route::delete('receipts/{id}', 'ReceiptsController@delete');
    Route::get('receipts_projects', 'ReceiptsController@receipts_projects');
    Route::get('receipts_sort', 'ReceiptsController@receipts_sort');
    Route::get('receipts_by_day', 'ReceiptsController@receipts_by_day');
    Route::post('receipts_search', 'ReceiptsController@receipts_search');

    Route::get('saleorders', 'SaleordersController@list');
    Route::get('saleorders/{id}', 'SaleordersController@get');
    Route::post('saleorders', 'SaleordersController@create');
    Route::put('saleorders/{id}', 'SaleordersController@update');
    Route::delete('saleorders/{id}', 'SaleordersController@delete');
    Route::get('saleorders_sort', 'SaleordersController@saleorders_sort');
    Route::get('saleorders_by_day', 'SaleordersController@saleorders_by_day');
    Route::post('saleorders_search', 'SaleordersController@saleorders_search');

    Route::get('customerpayments', 'CustomerpaymentsController@list');
    Route::get('customerpayments_search', 'CustomerpaymentsController@search');
    Route::get('customerpayments_get_start_end', 'CustomerpaymentsController@get_start_end_date');
    Route::get('customerpayments/{id}', 'CustomerpaymentsController@get');
    Route::post('customerpayments', 'CustomerpaymentsController@create');
    Route::put('customerpayments/{id}', 'CustomerpaymentsController@update');
    Route::delete('customerpayments/{id}', 'CustomerpaymentsController@delete');
    Route::get('customerpayments_sort', 'CustomerpaymentsController@customerpayments_sort');
    Route::get('customerpayments_by_day', 'CustomerpaymentsController@customerpayments_by_day');
    Route::post('customerpayments_search', 'CustomerpaymentsController@customerpayments_search');
    Route::post('customerpayments_deleteMultiple', 'CustomerpaymentsController@deleteMultiple');


    Route::get('creditmemos', 'CreditmemosController@list');
    Route::get('creditmemos/{id}', 'CreditmemosController@get');
    Route::post('creditmemos', 'CreditmemosController@create');
    Route::put('creditmemos/{id}', 'CreditmemosController@update');
    Route::delete('creditmemos/{id}', 'CreditmemosController@delete');
    Route::get('creditmemos_sort', 'CreditmemosController@creditmemos_sort');
    Route::get('creditmemos_by_day', 'CreditmemosController@creditmemos_by_day');
    Route::post('creditmemos_search', 'CreditmemosController@creditmemos_search');

    Route::get('projects', 'ProjectsController@list');
    Route::get('projects-all', 'ProjectsController@list_all');
    Route::get('projects/{id}', 'ProjectsController@get');
    Route::post('projects', 'ProjectsController@create');
    Route::put('projects/{id}', 'ProjectsController@update');
    Route::delete('projects/{id}', 'ProjectsController@delete');
    Route::get('projects_sort', 'ProjectsController@projects_sort');
    Route::get('projects_by_day', 'ProjectsController@projects_by_day');
    Route::post('project_search', 'ProjectsController@project_search');

    Route::get('productservices', 'ProductservicesController@list');
    Route::get('productservices/{id}', 'ProductservicesController@get');
    Route::post('productservices', 'ProductservicesController@create');
    Route::put('productservices/{id}', 'ProductservicesController@update');
    Route::delete('productservices/{id}', 'ProductservicesController@delete');
    Route::get('productservices_sort', 'ProductservicesController@productservices_sort');
    Route::get('productservices_by_day', 'ProductservicesController@productservices_by_day');
    Route::post('product_service_search', 'ProductservicesController@product_service_search');
    Route::post('product_service_search_deleteMultiple', 'ProductservicesController@delete_multiple');

    Route::get('productunits', 'ProductunitsController@list');
    Route::get('productunits/{id}', 'ProductunitsController@get');
    Route::post('productunits', 'ProductunitsController@create');
    Route::put('productunits/{id}', 'ProductunitsController@update');
    Route::delete('productunits/{id}', 'ProductunitsController@delete');

    Route::get('productfamily', 'ProductfamilyController@list');
    Route::get('productfamily/{id}', 'ProductfamilyController@get');
    Route::post('productfamily', 'ProductfamilyController@create');
    Route::put('productfamily/{id}', 'ProductfamilyController@update');
    Route::delete('productfamily/{id}', 'ProductfamilyController@delete');

    Route::get('vat-and-tax', 'TaxAndVatController@list');
    Route::get('vat-and-tax/{id}', 'TaxAndVatController@get');
    Route::post('vat-and-tax', 'TaxAndVatController@create');
    Route::put('vat-and-tax/{id}', 'TaxAndVatController@update');
    Route::delete('vat-and-tax/{id}', 'TaxAndVatController@delete');

    Route::get('productrecivelocation', 'ProductrecivinglocationController@list');
    Route::get('productrecivelocation/{id}', 'ProductrecivinglocationController@get');
    Route::post('productrecivelocation', 'ProductrecivinglocationController@create');
    Route::put('productrecivelocation/{id}', 'ProductrecivinglocationController@update');
    Route::delete('productrecivelocation/{id}', 'ProductrecivinglocationController@delete');

    Route::get('productdeliverylocation', 'ProductdeliverylocationController@list');
    Route::get('productdeliverylocation/{id}', 'ProductdeliverylocationController@get');
    Route::post('productdeliverylocation', 'ProductdeliverylocationController@create');
    Route::put('productdeliverylocation/{id}', 'ProductdeliverylocationController@update');
    Route::delete('productdeliverylocation/{id}', 'ProductdeliverylocationController@delete');

    Route::get('delivery-note', 'DeliverynoeteController@list');
    Route::get('not-invoiced-delivery-note/{customer_id}', 'DeliverynoeteController@not_invoiced_delivery_notes');
    Route::get('delivery-note/{id}', 'DeliverynoeteController@get');
    Route::get('delivery-note-products/{id}', 'DeliverynoeteController@delivery_notes_products');
    Route::post('delivery-note', 'DeliverynoeteController@create');
    Route::put('delivery-note/{id}', 'DeliverynoeteController@update');
    Route::delete('delivery-note/{id}', 'DeliverynoeteController@delete');
    Route::get('delivery_note_sort', 'DeliverynoeteController@delivery_sort');
    Route::get('delivery_by_day', 'DeliverynoeteController@delivery_by_day');
    Route::post('delivery_notes_search', 'DeliverynoeteController@delivery_notes_search');

    Route::get('inventorytransitaccount', 'InventoryTransitAccountController@list');
    Route::get('inventorytransitaccount/{id}', 'InventoryTransitAccountController@get');
    Route::post('inventorytransitaccount', 'InventoryTransitAccountController@create');
    Route::put('inventorytransitaccount/{id}', 'InventoryTransitAccountController@update');
    Route::delete('inventorytransitaccount/{id}', 'InventoryTransitAccountController@delete');

    Route::get('inventoryaccount', 'InventoryAccountController@list');
    Route::get('inventoryaccount/{id}', 'InventoryAccountController@get');
    Route::post('inventoryaccount', 'InventoryAccountController@create');
    Route::put('inventoryaccount/{id}', 'InventoryAccountController@update');
    Route::delete('inventoryaccount/{id}', 'InventoryAccountController@delete');

    Route::get('bills', 'BillsController@list');
    Route::get('bills/{id}', 'BillsController@get');
    Route::post('bills', 'BillsController@create');
    Route::put('bills/{id}', 'BillsController@update');
    Route::delete('bills/{id}', 'BillsController@delete');

    Route::get('expenses', 'ExpensesController@list');
    Route::get('expenses/{id}', 'ExpensesController@get');
    Route::post('expenses', 'ExpensesController@create');
    Route::put('expenses/{id}', 'ExpensesController@update');
    Route::delete('expenses/{id}', 'ExpensesController@delete');

    Route::get('vouchers', 'VouchersController@list');
    Route::get('vouchers/{id}', 'VouchersController@get');
    Route::post('vouchers', 'VouchersController@create');
    Route::put('vouchers/{id}', 'VouchersController@update');
    Route::delete('vouchers/{id}', 'VouchersController@delete');

    Route::get('supplierquotes', 'SupplierquotesController@list');
    Route::get('supplierquotes/{id}', 'SupplierquotesController@get');
    Route::post('supplierquotes', 'SupplierquotesController@create');
    Route::put('supplierquotes/{id}', 'SupplierquotesController@update');
    Route::delete('supplierquotes/{id}', 'SupplierquotesController@delete');

    Route::get('purchaseorders', 'PurchaseordersController@list');
    Route::get('purchaseorders/{id}', 'PurchaseordersController@get');
    Route::post('purchaseorders', 'PurchaseordersController@create');
    Route::put('purchaseorders/{id}', 'PurchaseordersController@update');
    Route::delete('purchaseorders/{id}', 'PurchaseordersController@delete');

    Route::get('receivingnotes', 'ReceivingnotesController@list');
    Route::get('receivingnotes/{id}', 'ReceivingnotesController@get');
    Route::post('receivingnotes', 'ReceivingnotesController@create');
    Route::put('receivingnotes/{id}', 'ReceivingnotesController@update');
    Route::delete('receivingnotes/{id}', 'ReceivingnotesController@delete');

    Route::get('billingpayments', 'BillingpaymentsController@list');
    Route::get('billingpayments/{id}', 'BillingpaymentsController@get');
    Route::post('billingpayments', 'BillingpaymentsController@create');
    Route::put('billingpayments/{id}', 'BillingpaymentsController@update');
    Route::delete('billingpayments/{id}', 'BillingpaymentsController@delete');

    Route::get('suppliercreditmemos', 'SuppliercreditmemosController@list');
    Route::get('suppliercreditmemos/{id}', 'SuppliercreditmemosController@get');
    Route::post('suppliercreditmemos', 'SuppliercreditmemosController@create');
    Route::put('suppliercreditmemos/{id}', 'SuppliercreditmemosController@update');
    Route::delete('suppliercreditmemos/{id}', 'SuppliercreditmemosController@delete');

    Route::get('purchaseproductservices', 'PurchaseproductservicesController@list');
    Route::get('purchaseproductservices/{id}', 'PurchaseproductservicesController@get');
    Route::post('purchaseproductservices', 'PurchaseproductservicesController@create');
    Route::put('purchaseproductservices/{id}', 'PurchaseproductservicesController@update');
    Route::delete('purchaseproductservices/{id}', 'PurchaseproductservicesController@delete');

    // delete all selected lists
    Route::post('delete_selected_all', 'CommonController@delete_selected_all');

    // get latest quote id route
    Route::get('/get-latest-code-id/{type}/{key}','CommonController@getCodeId');

    // mail and pdf routes
    Route::post('sent-mail', 'PdfController@sent_mail');

    Route::get('print-pdf/quotation/{id}', 'PdfController@quotation_pdf');
    Route::get('sent-mail/quotation/{id}', 'PdfController@quotation_mail');

    Route::get('print-pdf/delivery_note/{id}', 'PdfController@delivery_note_pdf');
    Route::get('sent-mail/delivery_note/{id}', 'PdfController@delivery_note_mail');

    Route::get('print-pdf/invoice/{id}', 'PdfController@invoice_pdf');
    Route::get('sent-mail/invoice/{id}', 'PdfController@invoice_mail');

    Route::get('print-pdf/saleorder/{id}', 'PdfController@saleorder_pdf');
    Route::get('sent-mail/saleorder/{id}', 'PdfController@saleorder_mail');

    Route::get('print-pdf/receipt/{id}', 'PdfController@receipt_pdf');
    Route::get('sent-mail/receipt/{id}', 'PdfController@receipt_mail');

    Route::get('print-pdf/customerpayments/{id}', 'PdfController@customerpayments_pdf');
    Route::get('sent-mail/receipt/{id}', 'PdfController@customerpayments_mail');

    Route::get('/pdf',function(){
        // $data=[];
        // $pdf = PDF::loadView('home',$data)->setOptions(['defaultFont' => 'sans-serif']);
        // $stream = $pdf->stream('invoice.pdf');
        // $output = $pdf->output();

        // file_put_contents(public_path().'/test.pdf',$pdf->output());
        // dd($pdf->stream('invoice.pdf'),$pdf->output(),file_put_contents(public_path().'/test.pdf',$pdf->output()));
        // return $pdf->download('invoice.pdf');
    });


    Route::get('testsohans', 'TestsohansController@list');
    Route::get('testsohans/{id}', 'TestsohansController@get');
    Route::post('testsohans', 'TestsohansController@create');
    Route::put('testsohans/{id}', 'TestsohansController@update');
    Route::delete('testsohans/{id}', 'TestsohansController@delete');

});
