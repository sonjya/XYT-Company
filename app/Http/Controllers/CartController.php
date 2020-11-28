<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addtoCart(Request $request){
        $cart = new Cart;
        $cart->user_id = session('id');
        $cart->product_name = $request->productname;
        $cart->price = $request->price;
        $cart->quantity = $request->quantity;
        $cart->save();
        $id = session('id');
        $count = Cart::where('user_id',$id)->count();
        session(['cart' => $count]);
        return redirect('/shop');
    }

    public function getCart(){
        $auth = session('role');
        if($auth==='client'){
            $id = session('id');
            $data = Cart::where('user_id',$id)->get();
            return view('client.cart',compact('data'));
        } else {
            return redirect()->back();
        }
    }

    public function removeCart(Request $request){
        $cart = Cart::find($request->item);
        $cart->delete();
        $id = session('id');
        $cartitem = Cart::where('user_id',$id)->count();
        session(['cart' => $cartitem]);
        return redirect('/cart');
    }
}
