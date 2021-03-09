<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ShopController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    session(['entries' => '3']);
    return view('index');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/logout', function () {
    session(['name' => '']);
    session(['id' => '']);
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

});

Route::get('/ordertracker', function() {
    return view('client.ordertracker1');
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

Route::get('/numberverification', function() {
    return view('client.phoneverification');
});

Route::post('/verify',[ValidationController::class,'phonenumberValidation']);
Route::post('/reports', [TransactionController::class, 'getReports']);
Route::get('/transaction', [TransactionController::class, 'getTransactions']);
Route::get('/order-tracker', [TransactionController::class, 'viewOrderStatus']);
Route::post('/trackorder', [TransactionController::class, 'search']);
Route::post('/checkout', [CartController::class, 'payment']);
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
Route::post('/backupdatabase', [ValidationController::class, 'backupDatabase']);
Route::post('/restoredatabase', [ValidationController::class, 'restoreDatabase']);

//transaction updates
Route::get('/transaction/pending/{id}',[TransactionController::class,'pending']);
Route::get('/transaction/processing/{id}',[TransactionController::class,'processing']);
Route::get('/transaction/receiving/{id}',[TransactionController::class,'receiving']);
Route::get('/transaction/completed/{id}',[TransactionController::class,'completed']);
