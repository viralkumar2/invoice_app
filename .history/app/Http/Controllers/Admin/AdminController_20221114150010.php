<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;
use App\Models\Clients;

class AdminController extends Controller
{
    public function admin_dashboard(){
        return view('admin.admin_dashboard');
    }
    public function invoice($id){
        
        $client = Clients::find($id);
        // return $client;
        return view('admin.product.invoice_page');
    }

    public function pdfview_download(request $request){
        // if($request->has('download')){
            $pdf = PDF::loadView('admin.product.pdfview_download');
            return $pdf->download('pdfview.pdf');
        // }
        
    }

}
