<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;
use App\Models\Clients;
use App\Models\Product;
use App\Models\settingsModel;

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
       
       return view('admin.product.invoice_page',compact('client','invoice_number','product','setting'));
    }

    public function pdfview_download(request $request){
        // if($request->has('download')){
            $pdf = PDF::loadView('admin.product.pdfview_download');
            return $pdf->download('pdfview.pdf');
        // }
        
    }

    public function invoice_submit(request $request){
        $product=[];
        // return $request;
        foreach($request->attraction_or_activity as $key=>$row){
            if (empty($row)){
                return redirect()->back()->with('info','Please Add Within 1 Product');
            }else{
                $product[] = Product::join('category','products.cat_id','category.id')
                ->select('products.*','category.cat_name')->find($row);
                $product[$key]['total_item'] = $request->total[$key];
            }

        }
        return $request;

        $sub_total = $request->sub_total;
        $tax_amount = $request->sub_total;
        $sub_total = $request->sub_total;

        $pdf = PDF::loadView('admin.product.pdfview_download');
        return $pdf->download('pdfview.pdf');
    }

}
