<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function index(){
        $data = Product::get();
        return view('admin.product.index',compact('data'));
    }

    public function create(){
        $data = CategoryModel::get();
        return view('admin.product.create',compact('data'));
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'name'          => 'required',
            'description'   => 'required',
            'quantity'      => 'required',
            'rate'          => 'required',
            'category_name' => 'required'
        ]);
       
        $data = new Product;
        $data->cat_id = $request->category_name;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->amount = $request->quantity * $request->rate;
        $data->rate = $request->rate;
        $data->save();
        return redirect()->route('product.index')->with('message','Data Added Successfully');
    }

    public function show($id){
    }
    
    public function edit($id){
        $data = Product::find($id);
        return view('admin.product.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name'          => 'required',
            'description'   => 'required',
            'quantity'      => 'required',
            'rate'          => 'required',
            'category_name' => 'required'
        ]);
        
        $data = Product::find($id);
        $data->cat_id = $request->category_name;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->amount = $request->quantity * $request->rate;
        $data->rate = $request->rate;
        $data->save();
        return redirect()->route('product.index')->with('message','Data Updated Successfully');
    }

    public function destroy($id){
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('product.index')->with('message','Data Deleted Successfully');
    }

}
