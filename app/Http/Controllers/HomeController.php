<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(){
        $products = DB::table('products')
        ->join('categories', 'categories.id','=', 'products.cat_id')
        ->join('brands', 'brands.id','=', 'products.brand_id')
        ->select('products.*', 'categories.category_name', 'brands.brand_name')
        ->where('products.status', true)
        ->limit(6)
        ->orderBy('products.id', 'DESC')->get();
        return view("frontend.home",['products'=>$products]);
    }

    public function productByCategory($id){
        $products = DB::table('products')
        ->join('categories', 'categories.id','=', 'products.cat_id')
        ->join('brands', 'brands.id','=', 'products.brand_id')
        ->select('products.*', 'categories.category_name', 'brands.brand_name')
        ->where('products.status', true)
        ->where('categories.id', $id)
        ->limit(18)
        ->orderBy('products.id', 'DESC')->get();
        return view("frontend.product_category",['products'=>$products]);
    }

    public function productByBrand($id){
        $products = DB::table('products')
        ->join('categories', 'categories.id','=', 'products.cat_id')
        ->join('brands', 'brands.id','=', 'products.brand_id')
        ->select('products.*', 'categories.category_name', 'brands.brand_name')
        ->where('products.status', true)
        ->where('categories.id', $id)
        ->limit(18)
        ->orderBy('brands.id', 'DESC')->get();
        return view("frontend.product_brand",['products'=>$products]);
    }

    public function productDetails($id){
        $products = DB::table('products')
        ->join('categories', 'categories.id','=', 'products.cat_id')
        ->join('brands', 'brands.id','=', 'products.brand_id')
        ->select('products.*', 'categories.category_name', 'brands.brand_name')
        ->where('products.status', true)
        ->where('products.id', $id)
        ->first();
        return view("frontend.product_details",['products'=>$products]);
    }
}
