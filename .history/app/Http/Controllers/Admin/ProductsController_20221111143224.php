<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function index(){
        $data = Product::get();
        return view('admin.product.index',compact('data'));
    }

    public function create(){
        return view('admin.product.create');
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'sr_no'         => 'required',
            'name'          => 'required',
            'description'   => 'required',
            'quantity'      => 'required',
            'amount'        => 'required',
            'tax'           => 'required',
            'image'         => 'required',
        ]);

        $en_uploaded = '';
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $en_uploaded = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/all_image');
            $image->move($destinationPath, $en_uploaded);
        }

        $data = new Product;
        $data->sr_no = $request->sr_no;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->amount = $request->amount;
        $data->tax = $request->tax;
        $data->image = $en_uploaded;
        $data->save();
        return redirect()->route('product.index');
    }

    public function show($id){
    }
    
    public function edit($id){
        $data = Product::find($id);
        return view('admin.product.edit',compact('data'));
    }

    public function update(Request $request, $id){
        

        $this->validate($request, [
            'sr_no'         => 'required',
            'name'          => 'required',
            'description'   => 'required',
            'quantity'      => 'required',
            'amount'        => 'required',
            'tax'           => 'required',
        ]);
        
        $product = Product::find($id);
        $en_uploaded = $product->image;
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $en_uploaded = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/all_image');
            $image->move($destinationPath, $en_uploaded);
        }

        $data = Product::find($id);
        $data->sr_no = $request->sr_no;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->amount = $request->amount;
        $data->tax = $request->tax;
        $data->image = $en_uploaded;
        $data->save();
        return redirect()->route('product.index');
    }

    public function destroy($id){
        $data = Product::find($id);
        $image_path = asset("all_image/".$data->image);
        // dd($image_path);
        if($image_path)
        {
            File::delete(public_path('all_image/'.$data->image));
        }
        $data->delete();
        return redirect()->route('product.index');
    }

}
