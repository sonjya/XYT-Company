<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function getSupplier(){
        $auth = session('role');
        if($auth==='admin'){
            $data = Supplier::all();
            return view('admin.addproduct',compact('data'));
        } else {
            return redirect()->back();
        }
    }
}
