<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){
        return view('admin.product.index');
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
        $data->sr_no = $en_uploaded;
        $data->save();
        return redirect()->route('product.index');

        dd($request->all());
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
