<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $data = Transaction::orderbyDESC('id')->get();
        $auth = session('role');
        if($auth==='admin'){
            return view('admin.transaction',compact('data'));
        } else {
            return redirect()->back();
        }
    }

    public function viewOrderStatus(){
        $auth = session('role');
        if($auth==='client'){
            $data = Transaction::where('name',session('name'))->orderbyDESC('id')->get();   
            return view('client.ordertracker2',compact('data'));
        } else {
            return redirect()->back();
        }
        
    }

    public function pending($id){
        $data = Transaction::find($id);
        $data->status = "pending";
        $data->updatedby = session('name');
        $data->save();
        return redirect('/transaction');
    }
    
    public function processing($id){
        $data = Transaction::find($id);
        $data->status = "processing";
        $data->updatedby = session('name');
        $data->save();
        return redirect('/transaction');
    }
    
    public function receiving($id){
        $data = Transaction::find($id);
        $data->status = "receiving";
        $data->updatedby = session('name');
        $data->save();
        return redirect('/transaction');
    }

    public function completed($id){
        $data = Transaction::find($id);
        $data->status = "completed";
        $data->updatedby = session('name');
        $data->active = 0;
        $data->save();
        return redirect('/transaction');
    }

    public function getReports(Request $request){
        $data = Transaction::where('created_at', '<', $request->date2)->where('created_at','>',$request->date1)->where('status', '=', 'completed')->orderby('id')->get();
        //DB::raw('sum(price) as price')
        session(['datefrom' => $request->date1]);
        session(['dateto' => $request->date2]);
        return view('admin.reports',compact('data'));
    }   
}
