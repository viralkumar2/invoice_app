<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\settingsModel;

class SettingsController extends Controller
{
    public function index(){
        $data = settingsModel::find(1);
        return view('admin.setting.index',compact('data'));
    }

    public function create(){
        return view('admin.setting.create',compact('data'));
    }

    public function store(Request $request){
        //
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'text'   => 'required',
            'Shipping'   => 'required',
            'Discount'   => 'required',
        ]);
        $data = settingsModel::find($id);
        
        $data->text       = $request->text;
        $data->shipping   = $request->Shipping;
        $data->disscount  = $request->Discount;
        return redirect()->route('setting.index')->with('message','Data Added Successfully');
    }

    public function destroy($id){
        //
    }
}
