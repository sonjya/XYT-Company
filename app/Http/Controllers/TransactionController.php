<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function search(Request $request){
        $data = Transaction::where('trackingid',$request->search)->get();
        foreach($data as $item){
            $tracked = $item->status;
        }
        if(count($data)){
            return redirect()->back()->with(['tracked' => $tracked]);
        } else {
            return redirect()->back()->with(['msgerr' => 'aw']);
        }
    }

    public function getTransactions(Request $request){
        $data = Transaction::where('active', 1)->get();
        $auth = session('role');
        if($auth==='isadmin'){
            return view('admin.transaction',compact('data'));
        } else {
            return redirect()->back();
        }
    }

    public function viewOrderStatus(){
        $auth = session('role');
        if($auth==='client'){
            $data = Transaction::where('name',session('name'))->get();   
            return view('client.ordertracker2',compact('data'));
        } else {
            return redirect()->back();
        }
        
    }
}
