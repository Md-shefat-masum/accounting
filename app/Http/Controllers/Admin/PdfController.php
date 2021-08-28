<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\DefaultMail;
use App\Mail\DeliveryNoteMail;
use App\Mail\InvoiceMail;
use App\Mail\QuotationMail;
use App\Mail\ReceiptMail;
use App\Mail\SaleorderMail;
use App\Model\Customerpayments;
use App\Model\InvoiceProduct;
use App\Model\Customers;
use App\Model\Deliverynote;
use App\Model\DeliveryNoteProduct;
use Illuminate\Http\Request;
use App\Model\Invoices;
use App\Model\QuoteProduct;
use App\Model\Quotes;
use App\Model\Receipts;
use App\Model\ReceiptSplit;
use App\Model\RelatedProduct;
use App\Model\SaleOrderProduct;
use App\Model\Saleorders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;

class PdfController extends Controller
{
    public $type = null;
    public $invoice_name = null;

    public function quotation_pdf($id)
    {
        $data = [];
        $quotes = Quotes::findOrfail($id);
        $quotes_products = RelatedProduct::where('type_name','quotes')->where('type_id',$id)->with('product_details')->get();
        $data['quotes'] = $quotes;
        $data['customer'] = Customers::where('id',$quotes->customer_id)->firstOrFail();
        $data['related_products'] = $quotes_products;
        $data['user'] = Auth::user();

        // logo to base 64
        if($data['user']->logo){
            $path = public_path().'/'.$data['user']->logo;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data_path = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data_path);
            $data['logo'] = $base64;
        }else{
            $path = public_path().'/pdflogo.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data_path = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data_path);
            $data['logo'] = $base64;
        }

        // dd($data['quotes']);
        // return view('invoice_layouts.quotes_invoice',compact('data'));

        $load_html = view('invoice_layouts.quotes_invoice',compact('data'))->render();

        // echo $load_html;
        // return 0;

        // $pdf = PDF::loadHtml($load_html)->setOptions([
        //     'fontDir' => asset('').'fonts/Averta-Regular.woff2',
        //     'defaultFont' => 'Averta'
        // ]);
        $pdf = PDF::loadHtml($load_html);

        $files = glob(public_path().'/invoice_pdf/*'); //get all file names
        foreach($files as $file){
            if(is_file($file))
                unlink($file); //delete file
        }

        $file_name = '/invoice_pdf/'.uniqid(10).'_quotation.pdf';
        $path = public_path().$file_name;

        fopen($path, "w");
        file_put_contents($path,$pdf->output());

        // $stream = $pdf->stream('quotation.pdf');
        // $output = $pdf->output();

        if($this->type){
            $invoice_name = $this->invoice_name;
            return view('invoice_layouts.download_invoice',compact(['file_name','invoice_name']));
            // return $pdf->download('invoice.pdf');
        }

        // echo "<iframe src='{$pdf->render()}'></iframe>";
        return $file_name;
    }

    public function quotation_mail($id)
    {
        $invoice_link = $this->quotation_pdf($id);
        $customer_id = Quotes::findOrfail($id)->customer_id;
        $customer = Customers::findOrFail($customer_id);
        $customerEmail = $customer->email;
    	Mail::to($customerEmail)->send(new QuotationMail($invoice_link));
    }

    public function delivery_note_pdf($id)
    {
        $data = [];
        $quotes = Deliverynote::findOrfail($id);
        $quotes_products = RelatedProduct::where('type_name','delivery_note')->where('type_id',$id)->with('product_details')->get();
        $data['quotes'] = $quotes;
        $data['customer'] = Customers::where('id',$quotes->customer_id)->firstOrFail();
        $data['related_products'] = $quotes_products;
        $data['user'] = Auth::user();

        // logo to base 64
        if($data['user']->logo){
            $path = public_path().'/'.$data['user']->logo;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data_path = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data_path);
            $data['logo'] = $base64;
        }else{
            $path = public_path().'/pdflogo.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data_path = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data_path);
            $data['logo'] = $base64;
        }

        // return view('invoice_layouts.delivery_notes_invoice',compact('data'));
        $load_html = view('invoice_layouts.delivery_notes_invoice',compact('data'))->render();
        $pdf = PDF::loadHtml($load_html)->setOptions(['defaultFont' => 'sans-serif']);

        $files = glob(public_path().'/invoice_pdf/*'); //get all file names
        foreach($files as $file){
            if(is_file($file))
                unlink($file); //delete file
        }

        $file_name = '/invoice_pdf/'.uniqid(10).'_quotation.pdf';
        $path = public_path().$file_name;

        fopen($path, "w");
        file_put_contents($path,$pdf->output());

        if($this->type){
            $invoice_name = $this->invoice_name;
            return view('invoice_layouts.download_invoice',compact(['file_name','invoice_name']));
            // return $pdf->download('invoice.pdf');
        }

        return $file_name;
    }

    public function delivery_note_mail($id)
    {
        $invoice_link = $this->delivery_note_pdf($id);
        $customer_id = Deliverynote::findOrfail($id)->customer_id;
        $customer = Customers::findOrFail($customer_id);
        $customerEmail = $customer->email;
    	Mail::to($customerEmail)->send(new DeliveryNoteMail($invoice_link));
    }

    public function invoice_pdf($id)
    {
        $data = [];
        $quotes = Invoices::findOrfail($id);
        $quotes_products = RelatedProduct::where('type_name','invoices')->where('type_id',$id)->with('product_details')->get();
        $data['quotes'] = $quotes;
        $data['customer'] = Customers::where('id',$quotes->customer_id)->firstOrFail();
        $data['related_products'] = $quotes_products;
        $data['user'] = Auth::user();

        // logo to base 64
        if($data['user']->logo){
            $path = public_path().'/'.$data['user']->logo;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data_path = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data_path);
            $data['logo'] = $base64;
        }else{
            $path = public_path().'/pdflogo.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data_path = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data_path);
            $data['logo'] = $base64;
        }

        // return view('invoice_layouts.invoice_product_invoice',compact('data'));
        $load_html = view('invoice_layouts.invoice_product_invoice',compact('data'))->render();
        $pdf = PDF::loadHtml($load_html)->setOptions(['defaultFont' => 'sans-serif']);

        $files = glob(public_path().'/invoice_pdf/*'); //get all file names
        foreach($files as $file){
            if(is_file($file))
                unlink($file); //delete file
        }

        $file_name = '/invoice_pdf/'.uniqid(10).'_quotation.pdf';
        $path = public_path().$file_name;

        fopen($path, "w");
        file_put_contents($path,$pdf->output());

        if($this->type){
            $invoice_name = $this->invoice_name;
            return view('invoice_layouts.download_invoice',compact(['file_name','invoice_name']));
            // return $pdf->download('invoice.pdf');
        }

        return $file_name;
    }

    public function invoice_mail($id)
    {
        $invoice_link = $this->invoice_pdf($id);
        $customer_id = Invoices::findOrfail($id)->customer_id;
        $customer = Customers::findOrFail($customer_id);
        $customerEmail = $customer->email;
    	Mail::to($customerEmail)->send(new InvoiceMail($invoice_link));
    }

    public function saleorder_pdf($id)
    {
        $data = [];
        $quotes = Saleorders::findOrfail($id);
        $quotes_products = RelatedProduct::where('type_name','saleorders')->where('type_id',$id)->with('product_details')->get();
        $data['quotes'] = $quotes;
        $data['customer'] = Customers::where('id',$quotes->customer_id)->firstOrFail();
        $data['related_products'] = $quotes_products;
        $data['user'] = Auth::user();

        // logo to base 64
        if($data['user']->logo){
            $path = public_path().'/'.$data['user']->logo;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data_path = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data_path);
            $data['logo'] = $base64;
        }else{
            $path = public_path().'/pdflogo.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data_path = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data_path);
            $data['logo'] = $base64;
        }

        $load_html = view('invoice_layouts.saleorder_invoice',compact('data'))->render();
        $pdf = PDF::loadHtml($load_html);

        $files = glob(public_path().'/invoice_pdf/*'); //get all file names
        foreach($files as $file){
            if(is_file($file))
                unlink($file); //delete file
        }

        $file_name = '/invoice_pdf/'.uniqid(10).'_saleorder.pdf';
        $path = public_path().$file_name;

        fopen($path, "w");
        file_put_contents($path,$pdf->output());

        if($this->type){
            $invoice_name = $this->invoice_name;
            return view('invoice_layouts.download_invoice',compact(['file_name','invoice_name']));
            // return $pdf->download('invoice.pdf');
        }

        return $file_name;
    }

    public function saleorder_mail($id)
    {
        $invoice_link = $this->saleorder_pdf($id);
        $customer_id = Saleorders::findOrfail($id)->customer_id;
        $customer = Customers::findOrFail($customer_id);
        $customerEmail = $customer->email;
    	Mail::to($customerEmail)->send(new SaleorderMail($invoice_link));
    }

    public function receipt_pdf($id)
    {
        $data = [];
        $Receipts = Receipts::findOrfail($id);
        $Receipts_split = ReceiptSplit::where('receipt_id',$id)->get();
        $data['quotes'] = $Receipts;
        $data['related_splits'] = $Receipts_split;
        $data['customer'] = Customers::where('id',$Receipts->customer_id)->firstOrFail();
        $data['user'] = Auth::user();

        // logo to base 64
        if($data['user']->logo){
            $path = public_path().'/'.$data['user']->logo;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data_path = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data_path);
            $data['logo'] = $base64;
        }else{
            $path = public_path().'/pdflogo.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data_path = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data_path);
            $data['logo'] = $base64;
        }

        // dd($data);
        // return view('invoice_layouts.receipt_invoice',compact('data'));

        $load_html = view('invoice_layouts.receipt_invoice',compact('data'))->render();
        $pdf = PDF::loadHtml($load_html)->setOptions(['defaultFont' => 'sans-serif']);

        $files = glob(public_path().'/invoice_pdf/*'); //get all file names
        foreach($files as $file){
            if(is_file($file))
                unlink($file); //delete file
        }

        $file_name = '/invoice_pdf/'.uniqid(10).'_receipt.pdf';
        $path = public_path().$file_name;

        fopen($path, "w");
        file_put_contents($path,$pdf->output());

        if($this->type){
            $invoice_name = $this->invoice_name;
            return view('invoice_layouts.download_invoice',compact(['file_name','invoice_name']));
            // return $pdf->download('invoice.pdf');
        }

        return $file_name;
    }

    public function receipt_mail($id)
    {
        $invoice_link = $this->receipt_pdf($id);
        $customer_id = Receipts::findOrfail($id)->customer_id;
        $customer = Customers::findOrFail($customer_id);
        $customerEmail = $customer->email;
    	Mail::to($customerEmail)->send(new ReceiptMail($invoice_link));
    }

    public function customerpayments_pdf($id)
    {
        $data = [];
        $Receipts = Customerpayments::with(['customer_info','invoice_info'])->findOrfail($id);
        $data['quotes'] = $Receipts;

        // return dd($Receipts);
        $load_html = view('invoice_layouts.customerpayments_invoice',compact('data'))->render();
        $pdf = PDF::loadHtml($load_html)->setOptions(['defaultFont' => 'sans-serif']);

        $files = glob(public_path().'/invoice_pdf/*'); //get all file names
        foreach($files as $file){
            if(is_file($file))
                unlink($file); //delete file
        }

        $file_name = '/invoice_pdf/'.uniqid(10).'_receipt.pdf';
        $path = public_path().$file_name;

        fopen($path, "w");
        file_put_contents($path,$pdf->output());

        if($this->type){
            $invoice_name = $this->invoice_name;
            return view('invoice_layouts.download_invoice',compact(['file_name','invoice_name']));
            // return $pdf->download('invoice.pdf');
        }

        return $file_name;
    }

    public function customerpayments_mail($id)
    {
        $invoice_link = $this->customerpayments_pdf($id);
        $customer_id = Receipts::findOrfail($id)->customer_id;
        $customer = Customers::findOrFail($customer_id);
        $customerEmail = $customer->email;
    	Mail::to($customerEmail)->send(new ReceiptMail($invoice_link));
    }

    public function sent_mail(Request $request)
    {
        Mail::to($request->email)->send(new DefaultMail(
            $request->subject,
            $request->message,
            $request->invoice_link,
            $request->invoice_name,
        ));
    }

    public function mail_invoice_download($type,$id)
    {
        // dd($type,$id,request(),$_REQUEST);
        $this->type = $type;
        $this->invoice_name = request()->invoice_name;
        if($type == 'quotation'){
            return $this->quotation_pdf($id);
        }
        else if($type == 'sales_order'){
            return $this->saleorder_pdf($id);
        }
        else if($type == 'deliverynote'){
            return $this->delivery_note_pdf($id);
        }
        else if($type == 'invoice'){
            return $this->invoice_pdf($id);
        }
        else if($type == 'receipt'){
            return $this->receipt_pdf($id);
        }
        else{

        }
    }

}
