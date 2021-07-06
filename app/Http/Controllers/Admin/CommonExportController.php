<?php
namespace App\Http\Controllers\Admin;

use App\Exports\CreditMemoExport;
use App\Exports\CreditMemoLineExport;
use App\Exports\DeliveryNoteExport;
use App\Exports\DeliveryNoteLineExport;
use App\Exports\InvoiceExport;
use App\Exports\InvoiceLineExport;
use App\Exports\ProductLineExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;

use App\Exports\QuotesExport;
use App\Exports\QuotesLineExport;
use App\Exports\SalesOrderExport;
use App\Exports\SalesOrderLineExport;
use App\Exports\ServiceLineExport;

class CommonExportController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function quote_export_to_exel()
    {
        return Excel::download(new QuotesExport(NULL), 'quotes.xlsx');
    }

    public function quote_line_export_to_exel()
    {
        return Excel::download(new QuotesLineExport(), 'quotes_line.xlsx');
    }

    public function quote_export_to_exel_selected(Request $request)
    {   
        $ids = json_decode($request->checked_id);
        return Excel::download(new QuotesExport($ids), 'quotes.xlsx');
    }
    
    public function quote_line_export_to_exel_selected(Request $request)
    {   
        $ids = json_decode($request->checked_id);
        return Excel::download(new QuotesLineExport($ids), 'quotes.xlsx');
    }


    public function deliverynotes_export_to_exel()
    {
        return Excel::download(new DeliveryNoteExport(), 'delivery_notes.xlsx');
    }

    public function deliverynotes_line_export_to_exel()
    {
        return Excel::download(new DeliveryNoteLineExport(), 'delivery_notes_line.xlsx');
    }

    public function deliverynotes_export_to_exel_selected(Request $request)
    {
        $ids = json_decode($request->checked_id);
        return Excel::download(new DeliveryNoteExport($ids), 'delivery_notes.xlsx');
    }

    public function deliverynotes_line_export_to_exel_selected(Request $request)
    {
        $ids = json_decode($request->checked_id);
        return Excel::download(new DeliveryNoteLineExport($ids), 'delivery_notes_line.xlsx');
    }


    public function invoice_export_to_exel()
    {
        return Excel::download(new InvoiceExport(), 'invoice.xlsx');
    }

    public function invoice_line_export_to_exel()
    {
        return Excel::download(new InvoiceLineExport(), 'invoice_line.xlsx');
    }
    
    public function invoice_export_to_exel_selected(Request $request)
    {
        $ids = json_decode($request->checked_id);
        return Excel::download(new InvoiceExport($ids), 'invoice.xlsx');
    }

    public function invoice_line_export_to_exel_selected(Request $request)
    {
        $ids = json_decode($request->checked_id);
        return Excel::download(new InvoiceLineExport($ids), 'invoice_line.xlsx');
    }



    public function sale_order_export_to_exel()
    {
        return Excel::download(new SalesOrderExport(), 'sale_order.xlsx');
    }

    public function sale_order_line_export_to_exel()
    {
        return Excel::download(new SalesOrderLineExport(), 'sale_order_line.xlsx');
    }

    public function sale_order_export_to_exel_selected(Request $request)
    {
        $ids = json_decode($request->checked_id);
        return Excel::download(new SalesOrderExport($ids), 'sale_order.xlsx');
    }

    public function sale_order_line_export_to_exel_selected(Request $request)
    {
        $ids = json_decode($request->checked_id);
        return Excel::download(new SalesOrderLineExport($ids), 'sale_order_line.xlsx');
    }



    public function credit_memos_export_to_exel()
    {
        return Excel::download(new CreditMemoExport(), 'credit_memos.xlsx');
    }

    public function credit_memos_line_export_to_exel()
    {
        return Excel::download(new CreditMemoLineExport(), 'credit_memos_line.xlsx');
    }
   
    public function credit_memos_export_to_exel_selected(Request $request)
    {
        $ids = json_decode($request->checked_id);
        return Excel::download(new CreditMemoExport($ids), 'credit_memos.xlsx');
    }

    public function credit_memos_line_export_to_exel_selected(Request $request)
    {
        $ids = json_decode($request->checked_id);
        return Excel::download(new CreditMemoLineExport($ids), 'credit_memos_line.xlsx');
    }



    public function product_export_to_exel()
    {
        return Excel::download(new ProductLineExport(), 'product_service.xlsx');
    }

    public function service_export_to_exel()
    {
        return Excel::download(new ServiceLineExport(), 'product_service_line.xlsx');
    }

    public function product_export_to_exel_selected(Request $request)
    {
        $ids = json_decode($request->checked_id);
        return Excel::download(new ProductLineExport(), 'product_service.xlsx');
    }

    public function service_export_to_exel_selected(Request $request)
    {
        $ids = json_decode($request->checked_id);
        return Excel::download(new ServiceLineExport(), 'product_service_line.xlsx');
    }

}

?>
