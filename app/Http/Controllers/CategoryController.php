<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class CategoryController extends Controller
{
    public function index(){
        $categories = DB::table('categories')->orderBy('category_name', 'ASC')->get();
        return view("backend.category.index", ['categories' => $categories]);
    }
    
    public function create(){
        return view("backend.category.create");
    }    
    public function add(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_discription'] = $request->category_name;
        $data['category_status'] = true;
        $insert_category = DB::table("categories")->insert($data);
        if ($insert_category) {
            Toastr::success('Data Successfully Updated', 'Success');
            return redirect()->back();
        }
    }

    public function delete($id){
        $delete_category = DB::table('categories')->where('id', $id)->delete();
        if ($delete_category) {
            Toastr::success('Data Successfully deleted', 'Success');
            return redirect()->route('category.index');
        }
    }
}
