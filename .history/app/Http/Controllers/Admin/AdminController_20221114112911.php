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
    public function pdfview(request $request){
        // $items = DB::table("items")->get();
        // view()->share('items',$items);
        if($request->has('download')){
            $pdf = PDF::loadView('admin.product.pdfview');
            return $pdf->download('pdfview.pdf');
        }
        return view('admin.product.pdfview');
    }

    public function pdfview_download(){
        return view('admin.product.pdfview');
    }

}
