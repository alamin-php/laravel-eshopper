<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Cart;

class CartController extends Controller
{
    public function showCart(){
        return view('frontend.add_cart');
    }
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
        $addToCart = Cart::add($data);
        if ($addToCart) {
            Toastr::success('Product added to Cart', 'Success');
            return redirect()->back();
        }
    }

    public function updateCart(Request $request){
        $qty = $request->qty;
        $rowId = $request->rowId;
        Cart::update($rowId, $qty);
        Toastr::success('Product updated into Cart', 'Success');
       return redirect()->back();
    }

    public function removeCart($rowId){
       Cart::remove($rowId);
       Toastr::success('Product removed from Cart', 'Success');
       return redirect()->back();

    }
}
