<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $products = DB::table('products')
        ->join('categories', 'categories.id','=', 'products.cat_id')
        ->join('brands', 'brands.id','=', 'products.brand_id')
        ->select('products.*', 'categories.category_name', 'brands.brand_name')
        ->orderBy('products.id', 'DESC')->get();
        return view("backend.product.index", ['products' => $products]);
    }
    
    public function create(){
        $categories = DB::table('categories')
        ->where('category_status', true)
        ->orderBy('category_name', 'ASC')
        ->get();
        $brands = DB::table('brands')
        ->where('brand_status', true)
        ->orderBy('brand_name', 'ASC')
        ->get();
        return view("backend.product.create", [
            'categories'=>$categories,
            'brands'=>$brands,
        ]);
    }    
    public function add(Request $request){
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['cat_id'] = $request->cat_id;
        $data['brand_id'] = $request->brand_id;
        $data['short_description'] = $request->short_description;
        $data['long_description'] = $request->long_description;
        $data['price'] = $request->price;
        $data['size'] = $request->size;
        $data['color'] = $request->color;
        if($request->has('status') == 1){
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }
        $image = $request->file('image');
        if ($image) {
            $image_name = Str::random(5);
            $productName = $request->name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $productName.'-'.$image_name.'.'.$ext;
            $upload_path = 'upload/products/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            if ($success) {
                $data['image'] = $image_url;
                $insert_product = DB::table("products")->insert($data);
                if ($insert_product) {
                    Toastr::success('Data Successfully Added', 'Success');
                    return redirect()->back();
                }
            }
        }
        $data['image'] = 'upload/products/default.png';
        $insert_product = DB::table("products")->insert($data);
        if ($insert_product) {
            Toastr::success('Data Successfully Added', 'Success');
            return redirect()->back();
        }
    }

    public function edit($id){
        $categories = DB::table('categories')
        ->where('category_status', true)
        ->orderBy('category_name', 'ASC')
        ->get();
        $brands = DB::table('brands')
        ->where('brand_status', true)
        ->orderBy('brand_name', 'ASC')
        ->get();
        $product = DB::table('products')->where('id', $id)->first();
        return view("backend.product.edit", [
            'categories'=>$categories,
            'brands'=>$brands,
            'product' => $product
        ]);
    }

    public function update(Request $request, $id){
        $product = DB::table('products')->where('id', $id)->first();
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['cat_id'] = $request->cat_id;
        $data['brand_id'] = $request->brand_id;
        $data['short_description'] = $request->short_description;
        $data['long_description'] = $request->long_description;
        $data['price'] = $request->price;
        $data['size'] = $request->size;
        $data['color'] = $request->color;
        if($request->has('status') == 1){
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }
        $image = $request->file('image');

        if ($image) {
            $image_name = Str::random(5);
            $productName = $request->name;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $productName.'-'.$image_name.'.'.$ext;
            $upload_path = 'upload/products/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            if ($success) {
                $data['image'] = $image_url;
                $img = DB::table('products')->where('id', $id)->first();
                $img_path = $img->image;
                if($img_path){
                    $done = unlink($img_path);
                }
                $save = DB::table('products')->where('id', $id)->update($data);
                if ($save) {
                    Toastr::success('Data Successfully Updated', 'Success');
                    return redirect()->back();
                }
            }
        }else{
            $oldPhoto = $request->old_photo;
                if ($oldPhoto) {
                $data['image'] = $oldPhoto;
                $save = DB::table('products')->where('id', $id)->update($data);
                if ($save) {
                    Toastr::success('Data Successfully Updated', 'Success');
                    return redirect()->back();
                }
                return redirect()->back();
            }
        }
    }

    public function delete($id){
        $get_image = DB::table('products')->where('id', $id)->first();
        $delete_image = $get_image->image;
        if($delete_image){
            \unlink($delete_image);
        }
        $delete_product = DB::table('products')->where('id', $id)->delete();
        if ($delete_product) {
            Toastr::success('Data Successfully deleted', 'Success');
            return redirect()->route('product.index');
        }
    }

    public function productApproval($id){
        $product_status = DB::table('products')->where('id', $id)->first();
        if($product_status->status == true){
           $published = DB::table('products')
                        ->where('id', $id)
                        ->update(['status' => false]);
            if ($published) {
                Toastr::success('Data Successfully Updated', 'Success');
                return redirect()->back();
            }
        }else{
            $unpublished = DB::table('products')
                        ->where('id', $id)
                        ->update(['status' => true]);
            if ($unpublished) {
                Toastr::success('Data Successfully Updated', 'Success');
                return redirect()->back();
            }
        }
        
    }
}
