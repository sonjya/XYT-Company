<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\ShopController;
use App\Models\Cart;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/logout', function () {
    session(['name' => '']);
    session(['role' => '']);
    return redirect('/');
});

Route::get('/login',function(){
    return view('admin.login');
});

Route::get('/admin', function () {
    $data = session('role');
    if($data==='admin'){
        return view('admin.index');
    } else {
        return redirect()->back();
    }
    // return view('admin.index');
});

Route::get('/ordertracker', function() {
    $auth = session('role');
    if($auth==='client'){
        return view('client.ordertracker');
    } else {
        return redirect()->back();
    }
});

Route::get('/register', function(){
    return view('client.register');
});

Route::get('/forgotpass', function(){
    return view('client.forgotpassword');
});

Route::get('/reset', function(){
    return view('client.resetpassword');
});

Route::get('/cart', [CartController::class, 'getCart']);
Route::post('/cartremove', [CartController::class, 'removeCart']);
Route::get('/shop', [ShopController::class, 'getItem']);
Route::post('/addtocart', [CartController::class, 'addtoCart']);
Route::get('/product/addproduct', [SupplierController::class, 'getSupplier']);
Route::post('/forgotpassword/request', [ValidationController::class, 'forgotPassword']);
Route::post('/forgotpassword/reset', [ValidationController::class, 'resetPassword']);
Route::post('/signin',[ValidationController::class, 'authenticate']);
Route::post('/registration',[ValidationController::class, 'registration']);
Route::get('/products',[ProductController::class, 'getItem']);
Route::get('/deletedproducts',[ProductController::class, 'getDeletedItem']);
Route::get('/product/edit/{id}',[ProductController::class, 'toEdit']);
Route::post('/product/delete', [ProductController::class, 'deleteItem']);
Route::post('/product/additem', [ProductController::class, 'addItem']);
Route::get('/product/restore/{id}', [ProductController::class, 'restoreItem']);
Route::post('/product/search', [ProductController::class, 'searchItem']);
Route::post('/product/update', [ProductController::class, 'updateItem']);