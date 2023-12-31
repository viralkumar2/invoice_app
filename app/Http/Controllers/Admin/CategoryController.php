<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    public function index(){
        $data = CategoryModel::get();
        return view('admin.category.index',compact('data'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'category_name'   => 'required',
        ]);
        $data = new CategoryModel;
        $data->cat_name = $request->category_name;
        $data->save();
        return redirect()->route('category.index')->with('message','Data Added Successfully');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $data = CategoryModel::find($id);
        return view('admin.category.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'category_name'   => 'required',
        ]);
        $data = CategoryModel::find($id);
        $data->cat_name = $request->category_name;
        $data->save();
        return redirect()->route('category.index')->with('message','Data Updated Successfully');
    }

    public function destroy($id){
        $data = CategoryModel::find($id);
        $data->delete();
        return redirect()->route('category.index')->with('message','Data Deleted Successfully');
    }
}
