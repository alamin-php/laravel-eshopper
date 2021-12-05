<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function edit($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return view("backend.category.edit", ['category' => $category]);
    }

    public function update(Request $request, $id){
        $category = DB::table('categories')->where('id', $id)->first();
        $request->validate([
            'category_name' => 'required|unique:categories,category_name,'.$category->id,
        ]);
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_discription'] = $request->category_discription;
        $insert_category = DB::table("categories")->where('id', $id)->update($data);
        if ($insert_category) {
            Toastr::success('Data Successfully Updated', 'Success');
            return redirect()->back();
        }else{
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

    public function catApproval($id){
        $cat_status = DB::table('categories')->where('id', $id)->first();
        if($cat_status->category_status == true){
           $published = DB::table('categories')
                        ->where('id', $id)
                        ->update(['category_status' => false]);
            if ($published) {
                Toastr::success('Data Successfully Updated', 'Success');
                return redirect()->back();
            }
        }else{
            $unpublished = DB::table('categories')
                        ->where('id', $id)
                        ->update(['category_status' => true]);
            if ($unpublished) {
                Toastr::success('Data Successfully Updated', 'Success');
                return redirect()->back();
            }
        }
        
    }
}
