<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;

class AdminController extends Controller
{
    public function admin_dashboard(){
        return view('admin.admin_dashboard');
    }
    public function invoice($id){
        dd($id);
        
        if($request->has('download')){
            $pdf = PDF::loadView('admin.product.pdfview');
            return $pdf->download('pdfview.pdf');
        }
        return view('admin.product.pdfview');
    }

    public function pdfview_download(request $request){
        // if($request->has('download')){
            $pdf = PDF::loadView('admin.product.pdfview_download');
            return $pdf->download('pdfview.pdf');
        // }
        
    }

}
