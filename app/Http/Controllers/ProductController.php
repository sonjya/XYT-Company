<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function getItem(){
       $auth = session('role');
       if($auth==='admin'){
            $data = Product::where('active',1)->orderbyDesc('created_at')->get();
            return view('admin.products', compact('data'));
       } else {
           return redirect()->back();
       }
    }
    
    public function getDeletedItem(){
        $auth = session('role');
        if($auth==='admin'){
             $data = Product::where('active',0)->orderbyDesc('created_at')->get();
             return view('admin.deletedproducts', compact('data'));
        } else {
            return redirect()->back();
        }
     }

    public function deleteItem(Request $request){
        $auth = session('role');
        if($auth==='admin'){
            $item = Product::find($request->item_id);
            $item->active = 0;
            $item->save();
            return redirect('/products');
        } else {
            return redirect()->back();
        }
    }

    public function restoreItem($id){
        $product = Product::find($id);
        $product->active = 1;
        $product->save();  
        return redirect('/deletedproducts');
    }
    public function addItem(Request $request){        
        $product = new Product;
        $product->product_name = $request->productname;
        $product->category_name = $request->category;
        $product->supplier_name = $request->supplier;
        $product->price = $request->price;
        $product->stocks = $request->stocks;
        $product->addedby = session('name');
        $product->updatedby = session('name');
        $product->active = 1;
        $product->save();  
        return redirect('/products');
    }

    public function searchItem(Request $request){
        $rules = $request->validate([
            'itemsearch' => 'required',
        ]);

        $item = $request->itemsearch;

        $data = Product::where('product_name', 'like', '%' . $item . '%')->get();
        return view('admin.products',compact('data'));
    }

    public function toEdit($id){

        $role = session('role');
        if($role==='admin'){
            $data = Product::where('id',$id)->get();
            return view('admin.editproduct',compact('data'));
        } else {
            return redirect()->back();
        }
        
    }

    public function updateItem(Request $request){
        
        $id = $request->id;

        $product = Product::find($id);
        $product->product_name = $request->productname;
        $product->price = $request->price;
        $product->stocks = $request->stocks;
        $product->updatedby = session('name');
        $product->save();  
        return redirect('/products');
    }

}
