<?php

use App\CustomerLog;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


Auth::routes();

// Route::get('test-mail/{id}', 'Admin\PdfController@quotation_mail');
// Route::get('/test',function(){
//   return \Excel::download(new App\Exports\QuotesExport(), 'users.xlsx');
// });

Route::get('/test/{type}/{key}','Admin\CommonController@getCodeId');

// export routes
Route::group( ['namespace'=>'Admin','middleware'=>['auth'] ],function(){
    Route::get('quotes-export-to-exel', 'CommonExportController@quote_export_to_exel');
    Route::get('quotes-line-export-to-exel', 'CommonExportController@quote_line_export_to_exel');

    Route::get('deliverynotes-export-to-exel', 'CommonExportController@deliverynotes_export_to_exel');
    Route::get('deliverynotes-line-export-to-exel', 'CommonExportController@deliverynotes_line_export_to_exel');

    Route::get('invoice-export-to-exel', 'CommonExportController@invoice_export_to_exel');
    Route::get('invoice-line-export-to-exel', 'CommonExportController@invoice_line_export_to_exel');

    Route::get('sale-order-export-to-exel', 'CommonExportController@sale_order_export_to_exel');
    Route::get('sale-order-line-export-to-exel', 'CommonExportController@sale_order_line_export_to_exel');

    Route::get('credit-memos-export-to-exel', 'CommonExportController@credit_memos_export_to_exel');
    Route::get('credit-memos-line-export-to-exel', 'CommonExportController@credit_memos_line_export_to_exel');

    Route::get('product-service-export-to-exel', 'CommonExportController@product_export_to_exel');
    Route::get('product-service-line-export-to-exel', 'CommonExportController@service_export_to_exel');
});

Route::group( ['namespace'=>'Admin','middleware'=>['auth'] ],function(){
    Route::get('quotes-export-to-exel-selected', 'CommonExportController@quote_export_to_exel_selected');
    Route::get('quotes-line-export-to-exel-selected', 'CommonExportController@quote_line_export_to_exel_selected');

    Route::get('deliverynotes-export-to-exel-selected', 'CommonExportController@deliverynotes_export_to_exel_selected');
    Route::get('deliverynotes-line-export-to-exel-selected', 'CommonExportController@deliverynotes_line_export_to_exel_selected');

    Route::get('invoice-export-to-exel-selected', 'CommonExportController@invoice_export_to_exel_selected');
    Route::get('invoice-line-export-to-exel-selected', 'CommonExportController@invoice_line_export_to_exel_selected');

    Route::get('sale-order-export-to-exel-selected', 'CommonExportController@sale_order_export_to_exel_selected');
    Route::get('sale-order-line-export-to-exel-selected', 'CommonExportController@sale_order_line_export_to_exel_selected');

    Route::get('credit-memos-export-to-exel-selected', 'CommonExportController@credit_memos_export_to_exel_selected');
    Route::get('credit-memos-line-export-to-exel-selected', 'CommonExportController@credit_memos_line_export_to_exel_selected');

    Route::get('product-service-export-to-exel-selected', 'CommonExportController@product_export_to_exel_selected');
    Route::get('product-service-line-export-to-exel-selected', 'CommonExportController@service_export_to_exel_selected');

    Route::get('print-customer-due', 'CommonExportController@print_customer_due');

});

Route::get('/test',function(){
    $customer_logs = CustomerLog::get();
    $log_details = [];
    foreach ($customer_logs as $item) {
        switch($item->type){
            case 'quotes' :
                if(DB::table('quotes')->where('id',$item->type_id)->exists())
                    array_push($log_details,DB::table('quotes')->where('id',$item->type_id)->first());
            break;
            case 'deliverynotes' :
                if(DB::table('deliverynotes')->where('id',$item->type_id)->exists())
                    array_push($log_details,DB::table('deliverynotes')->where('id',$item->type_id)->first());
            break;
            case 'invoices' :
                if(DB::table('invoices')->where('id',$item->type_id)->exists())
                    array_push($log_details,DB::table('invoices')->where('id',$item->type_id)->first());
            break;
            case 'receipts' :
                if(DB::table('receipts')->where('id',$item->type_id)->exists())
                    array_push($log_details,DB::table('receipts')->where('id',$item->type_id)->first());
            break;
            case 'saleorders' :
                if(DB::table('saleorders')->where('id',$item->type_id)->exists())
                    array_push($log_details,DB::table('saleorders')->where('id',$item->type_id)->first());
            break;
            case 'customerpayments' :
                if(DB::table('customerpayments')->where('id',$item->type_id)->exists())
                    array_push($log_details,DB::table('customerpayments')->where('id',$item->type_id)->first());
            break;
            case 'creditmemos' :
                if(DB::table('creditmemos')->where('id',$item->type_id)->exists())
                    array_push($log_details,DB::table('creditmemos')->where('id',$item->type_id)->first());
            break;
        }
    }

    dd($log_details);
})->name('route name');

// pdf download from email
Route::get('/mail-invoice-download/{type}/{id}', 'Admin\PdfController@mail_invoice_download');

Route::get('/views/{id}', 'Admin\PdfController@receipt_pdf');

Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('/{vue?}', 'HomeController@index')->where('vue', '[\/\w\.-]*')->name('super_admin');
