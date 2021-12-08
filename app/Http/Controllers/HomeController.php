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
}
