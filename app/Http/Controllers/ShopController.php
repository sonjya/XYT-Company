<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getItem(){
        $auth = session('role');
        if($auth==='client'){
            $data = Product::where('active',1)->get();
            return view('client.shop',compact('data'));
        } else {
            return redirect()->back();
        }
    }
}
