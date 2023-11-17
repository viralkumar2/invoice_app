<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index(){
        return view('admin.client.index');
    }

    public function create(){
        return view('admin.client.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'sr_no'         => 'required',
            'name'          => 'required',
            'description'   => 'required',
            'quantity'      => 'required',
            'amount'        => 'required',
            'tax'           => 'required',
        ]);
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
