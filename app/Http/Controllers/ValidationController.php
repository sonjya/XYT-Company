<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Throwable;

class ValidationController extends Controller
{

    public function authenticate(Request $request) 
    {
        $data = request()->validate([
            'username' =>  'required',
            'password' => 'required',
        ]);
        
        $username = $request->username;
        $password = md5($request->password);

        $users = User::where('username',$username)->where('password',$password)->get();
        
        foreach($users as $user){
            $name = $user->name;
            $role = $user->role;
            $id = $user->id;
        }

        if(count($users)){
            if($role==='admin'){
                session(['name' => $name]);
                session(['id' => $id]);
                session(['role' => $role]);
                return redirect('/admin');
            } elseif($role==='client'){
                session(['name' => $name]);
                session(['id' => $id]);
                session(['role' => $role]);
                $cart = Cart::where('user_id',$id)->count();
                session(['cart' => $cart]);
                return redirect('/shop');
            } else {
                session(['name' => '']);
                session(['role' => '']);
                return redirect('/');
            }
        } else {
            return redirect()->back()->with('msgerr','Username and Password mismatched');
        }
    }

    public function forgotPassword(Request $request){
        $data = User::where('username', $request->username)->get();
        foreach($data as $item){
            $rusername = $item->username;
            $rquestion = $item->securequestion;
        }
        if(count($data)){
            session(['usernamereset' => $rusername]);
            session(['questionreset' => $rquestion]);
            return redirect('/reset');
        } else {
            return redirect()->back()->with(['msgerr' => 'Username does not exist.']);
        }
    }

    public function resetPassword(Request $request){
        $data = User::where('username',$request->username)->where('secureanswer',md5($request->answer))->get('id');
        foreach($data as $d){
            $id = $d->id;
        }
        if(count($data)){
            if($request->password1===$request->password2){
                $user = User::find($id);
                $user->password = md5($request->password1);
                $user->save();
                return redirect('/login');
            } else {
                return redirect()->back()->with(['msgerr' => "Password doesn't match"]); 
            }
        } else {
            return redirect()->back()->with(['msgerr' => 'You answer is incorrect.']);
        }
    }

    public function registration(Request $request){

        if($request->password1===$request->password2){
            try{
                $user = new User;
                $user->name = $request->fullname;
                $user->email = $request->email;
                $user->phonenumber = $request->phonenumber;
                $user->address = $request->address;
                $user->username = $request->username;
                $user->role='client';
                $user->password = md5($request->password1);
                $user->securequestion = $request->question;
                $user->secureanswer = md5($request->answer);
                $user->save();
            } catch (Throwable $e){
                return redirect()->back()->with('msgerr', 'Username already used, try another one');
            }
            return redirect('/login')->with('msg','Profile Registered');
        } else {
            return redirect()->back();
        }
    }

}
