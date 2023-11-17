<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;
use App\Models\Clients;
use App\Models\Product;

class AdminController extends Controller
{
    public function admin_dashboard(){
        return view('admin.admin_dashboard');
    }
    public function invoice($id){
        
        $client = Clients::find($id);
        $product = Product::get();
        dd(date('d-F-Y'));
        $invoice_number = '#'.mt_rand(100000,999999); 
       

        // return $client;
        return view('admin.product.invoice_page',compact('client','invoice_number','product'));
    }

    public function pdfview_download(request $request){
        // if($request->has('download')){
            $pdf = PDF::loadView('admin.product.pdfview_download');
            return $pdf->download('pdfview.pdf');
        // }
        
    }

}
