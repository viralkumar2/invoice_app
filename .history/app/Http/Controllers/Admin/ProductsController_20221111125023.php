<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        dd($request->all());
    }

    public function show($id){
        //
    }

    
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
