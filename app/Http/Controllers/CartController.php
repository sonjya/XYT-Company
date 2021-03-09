<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{

    var $apiCode = "TR-XYTCO139930_PR658";
    var $apiPassword = "5xu{i3(dze";

    public function addtoCart(Request $request){
        if($request->stocks >= $request->quantity){
            $cart = new Cart;
            $cart->user_id = session('id');
            $cart->item_id = $request->itemid;
            $cart->product_name = $request->productname;
            $cart->price = $request->price;
            $cart->quantity = $request->quantity;
            $cart->save();
            
            $item = Product::find($request->itemid);
            $item->stocks = ($item->stocks) - ($request->quantity);
            $item->save();
            
            $id = session('id');
            $count = Cart::where('user_id',$id)->count();
            session(['cart' => $count]);
            return redirect('/shop');
        } else {
            return redirect('/shop')->with(['msgerrr' => "aw"]);
        }
    }

    public function getCart(){
        $auth = session('role');
        if($auth==='client'){
            $id = session('id');
            $data = Cart::where('user_id',$id)->get();
            if(count($data)){
                return view('client.cart',compact('data'));
            } else{
                return redirect()->back()->with(['msgerr' => 'Cart is empty.']);
            }
        } else {
            return redirect()->back();
        }
    }

    public function removeCart(Request $request){
        $item = Product::find($request->itemid);
        $item->stocks = ($item->stocks) + ($request->quantity);
        $item->save();
        
        $cart = Cart::find($request->item);
        $cart->delete();

        $cartitem = Cart::where('user_id',session('id'))->count();
        session(['cart' => $cartitem]);
        return redirect('/cart');
    }

    
    public function payment(Request $request){
        
        $db = User::where('id',session('id'))->get();
        foreach($db as $item){
            $contact = $item->phonenumber;
        }

        $data = new Transaction();
        $data->trackingID = "TRXYT20" . Transaction::all()->count() . "LVPH";
        $data->name = session('name');
        $data->price = $request->total;
        $data->paymentmethod = $request->paymethod;
        $data->active = 1;
        $data->status = "pending";
        $data->save();

        Cart::where('user_id', session('id'))->delete();
        $cartitem = Cart::where('user_id',session('id'))->count();
        session(['cart' => $cartitem]);

        $trackingID = Transaction::where('name',session('name'))->orderbyDESC('id')->where('active',1)->limit(1)->get('trackingID');
        foreach($trackingID as $trackID){
            $trid = $trackID->trackingID;
        }
        $msg = "Hello " . session('name') . "! Thank you for purchase worth " . $request->total . ". Tracking ID: " . $trid;
        $res = $this->itexmo($contact,$msg,$this->apiCode,$this->apiPassword);
        if ($res == ""){
            echo "iTexMo: No response from server!!!
            Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
            Please CONTACT US for help. ";	
        }
        else if ($res == 0){
            return redirect('/shop');
        } else {	
            echo "Error Num ". $res . " was encountered!";
        }
        
        
    }

    function itexmo($number,$message,$apicode,$passwd){
        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
        $param = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);
    }

}
