<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\settingsModel;

class SettingsController extends Controller
{
    public function index(){
        return view('admin.setting.index');
    }

    public function create(){
        $data = settingsModel::find(1);
        dd($data);
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
        dd($request->all());
    }

    public function destroy($id){
        //
    }
}
