<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clients;

class ClientsController extends Controller
{
    public function index(){
        $data = Clients::get();
        return view('admin.client.index',compact('data'));
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
        $data = new Clients;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();
        return redirect()->route('client.index')->with('message','Data Added Successfully');

    }

    public function show($id){
        //
    }

    public function edit($id){
        $data = Clients::find($id);
        return view('admin.client.edit',compact('data'));

    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'first_name'   => 'required',
            'last_name'    => 'required',
            'email'        => 'required',
            'phone'        => 'required',
        ]);
        $data = Clients::find($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();
        return redirect()->route('client.index')->with('message','Data Updated Successfully');
    }

    public function destroy($id){
        $data = Product::find($id);
       
        $data->delete();
        return redirect()->route('product.index')->with('message','Data Deleted Successfully');
    }
}
