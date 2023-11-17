<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client

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
            'first_name'   => 'required',
            'last_name'    => 'required',
            'email'        => 'required',
            'phone'        => 'required',
        ]);
        $data = new Client;
        $data->first_name = $request->sr_no;
        $data->last_name = $request->name;
        $data->email = $request->description;
        $data->phone = $request->quantity;
        $data->save();
        return redirect()->route('client.index')->with('message','Data Added Successfully');

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
