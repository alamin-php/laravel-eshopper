<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;

class CartController extends Controller
{
    public function addCart(Request $request){
        $qty = $request->qty;
        $id = $request->id;
       $product_info = DB::table('products')
                    ->where('id', $id)
                    ->first();
        $data['qty'] = $qty;
        $data['id'] = $product_info->id;
        $data['name'] = $product_info->name;
        $data['price'] = $product_info->price;
        $data['options']['size'] = $product_info->size;
        $data['options']['image'] = $product_info->image;
        Cart::add($data);
        return view('frontend.add_cart');
    }
}
