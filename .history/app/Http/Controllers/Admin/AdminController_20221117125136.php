<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;
use Auth;
use App\Models\Clients;
use App\Models\Product;
use App\Models\User;
use App\Models\settingsModel;
use App\Models\InvoiceDetails;
use App\Models\InvoiceData;

class AdminController extends Controller
{
    public function admin_dashboard(){
        return view('admin.admin_dashboard');
    }
    public function invoice(){
        $client = Clients::get();
        $product = Product:: join('category','products.cat_id','category.id')
        ->select('products.*','category.cat_name')
        ->get();
        // return $product;
        $invoice_number = '#'.mt_rand(100000,999999); 
        $setting = settingsModel::find(1);

        $user = User::find(Auth::id());
        
       return view('admin.product.invoice_page',compact('user','client','invoice_number','product','setting'));
    }

    public function pdfview_download(request $request){
        
            $pdf = PDF::loadView('admin.product.pdfview_download');
            return $pdf->download('pdfview.pdf');
        
        
    }

    public function invoice_submit(request $request){
        $product=[];
        // return $request->all();

        $this->validate($request, [
            'clients'   => 'required',
        ]);
        
        // $invoice_data = new InvoiceData;
        // $invoice_data->client_id        = $request->clients;
        // $invoice_data->sub_total        = $request->sub_total;
        // $invoice_data->tex              = $request->tex;
        // $invoice_data->tax_amount       = $request->tax_amount;
        // $invoice_data->Discount_amount  = $request->Discount_amount;
        // $invoice_data->total_amount     = $request->total_amount;
        // $invoice_data->total_amount     = $request->total_amount;
        // $invoice_data->save();

        
        // foreach($request->attraction_or_activity as $key=>$row){
        //     // if (empty($row)){
        //     //     return redirect()->back()->with('info','Please Add Within 1 Product');
        //     // }else{
        //     //     $product[] = Product::join('category','products.cat_id','category.id')
        //     //     ->select('products.*','category.cat_name')->find($row);
        //     //     $product[$key]['total_item'] = $request->total[$key];
        //     //     $product[$key]['qty']  = $request->qty[$key];
                
        //     // }
        //     $invoice_details = new InvoiceDetails;
        //     $invoice_details->invoice_data_id   = $invoice_data->id;
        //     $invoice_details->product_id        = $row;
        //     $invoice_details->qty               = $request->qty[$key];
        //     $invoice_details->total             =  $request->total[$key];
        //     $invoice_details->save();

        // }
        $setting = settingsModel::find(1);
        $invoiceData = InvoiceData::find(1);
        $InvoiceDetails   = InvoiceDetails::
        join('products','invoice_details.product_id','products.id')
        ->join('category','products.cat_id','category.id')
        ->select('invoice_details.*','products.cat_id','products.name','category.cat_name')
        ->where('invoice_data_id',$invoiceData->id)->get();
        // return $InvoiceDetails;
        $client = Clients::find($invoiceData->client_id);
        // $user = User::find(Auth::id());
        
        // $sub_total = $request->sub_total;
        // $tax_amount = $request->tax_amount;
        // $total_amount = $request->total_amount;
        // $invoice_number = $request->invoice_number;
        // $tex = $request->tex;
        return view('admin.product.pdfview_download',compact('setting','client','invoiceData','InvoiceDetails'));
        
        $pdf = PDF::loadView('admin.product.pdfview_download',compact('client','invoiceData','InvoiceDetails'));
        // $pdf = PDF::loadView('admin.product.pdfview_download');
        // return $pdf;
        
        return $pdf->download('pdfview.pdf');
    }

}
