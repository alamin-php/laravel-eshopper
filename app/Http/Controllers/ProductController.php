<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $products = DB::table('products')->orderBy('brand_name', 'ASC')->get();
        return view("backend.brand.index", ['products' => $products]);
    }
    
    public function create(){
        return view("backend.brand.create");
    }    
    public function add(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:products|max:255',
        ]);
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_discription'] = $request->brand_name;
        $data['brand_status'] = true;
        $insert_brand = DB::table("products")->insert($data);
        if ($insert_brand) {
            Toastr::success('Data Successfully Updated', 'Success');
            return redirect()->back();
        }
    }

    public function edit($id){
        $brand = DB::table('products')->where('id', $id)->first();
        return view("backend.brand.edit", ['brand' => $brand]);
    }

    public function update(Request $request, $id){
        $brand = DB::table('products')->where('id', $id)->first();
        $request->validate([
            'brand_name' => 'required|unique:products,brand_name,'.$brand->id,
        ]);
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_discription'] = $request->brand_discription;
        $insert_brand = DB::table("products")->where('id', $id)->update($data);
        if ($insert_brand) {
            Toastr::success('Data Successfully Updated', 'Success');
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function delete($id){
        $delete_brand = DB::table('products')->where('id', $id)->delete();
        if ($delete_brand) {
            Toastr::success('Data Successfully deleted', 'Success');
            return redirect()->route('brand.index');
        }
    }

    public function brandApproval($id){
        $cat_status = DB::table('products')->where('id', $id)->first();
        if($cat_status->brand_status == true){
           $published = DB::table('products')
                        ->where('id', $id)
                        ->update(['brand_status' => false]);
            if ($published) {
                Toastr::success('Data Successfully Updated', 'Success');
                return redirect()->back();
            }
        }else{
            $unpublished = DB::table('products')
                        ->where('id', $id)
                        ->update(['brand_status' => true]);
            if ($unpublished) {
                Toastr::success('Data Successfully Updated', 'Success');
                return redirect()->back();
            }
        }
        
    }
}
