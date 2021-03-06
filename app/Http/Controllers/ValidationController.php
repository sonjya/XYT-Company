<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class ValidationController extends Controller
{

    var $apiCode = "TR-XYTCO139930_PR658";
    var $apiPassword = "5xu{i3(dze";

    public function authenticate(Request $request) 
    {   

        $entriesLeft = session('entries');

        $data = request()->validate([
            'username' =>  'required',
            'password' => 'required',
        ]);
        
        $username = $request->username;
        $password = md5($request->password);

        $users = User::where('username',$username)->where('password',$password)->limit(1)->get();
        $a = User::where('username',$username)->where('password',$password)->where('active',1)->limit(1)->get(DB::raw('year(bday) as year'));
        
        foreach($a as $ag){
            $agy = $ag->year;
        }

        foreach($users as $user){
            $name = $user->name;
            $role = $user->role;
            $id = $user->id;
            $active =$user->active;
        }

        if(count($users)){
            if($active === 1){
                if($role==='admin'){
                    session(['name' => $name]);
                    session(['id' => $id]);
                    session(['role' => $role]);
                    return redirect('/admin');
                } elseif($role==='client'){
                    session(['name' => $name]);
                    session(['id' => $id]);
                    session(['role' => $role]);
                    session(['age'=> now()->year - $agy]);
                    $cart = Cart::where('user_id',$id)->count();
                    session(['cart' => $cart]);
                    return redirect('/shop');
                } else {
                    session(['name' => '']);
                    session(['id' => '']);
                    session(['role' => '']);    
                    session(['age' => '']);
                    return redirect('/');
                }
            } elseif($active === 0){
                return redirect()->back()->with('msgerr','Your account has been locked, try to reset your password or contact us.');
            }
        } else {
            if($entriesLeft == 1){
                $usertoLock = User::where('username',$request->username)->get();

                foreach($usertoLock as $us){
                    $use = $us->id;
                }

                if(count($usertoLock)){
                    $this->lockUser($use);
                    return redirect()->back()->with('msgerr','Notice: Your account has been locked');
                }else{
                    session(['entries' => '3']);
                    return redirect()->back()->with('msgerr','Notice: We cannot find your account');
                }
            }else {
                $entries = $entriesLeft - 1;
                session(['entries' => $entries]);
                return redirect()->back()->with('msgerr','Username and Password mismatched. Entries Left: ' . $entries);
            }
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
                $user->active = 1;
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

        $users = User::count() * 2;
        $transactions = Transaction::count() * 3;
        $code = "U" . $users . "T" . $transactions;
        $msg = "Holla! this is XYT, your OTP is " . $code;

        if($request->password1===$request->password2){
            try{
                $user = new User;
                $user->name = $request->fullname;
                $user->email = $request->email;
                $user->phonenumber = $request->phonenumber;
                $user->address = $request->address;
                $user->bday = $request->bday;
                $user->username = $request->username;
                $user->role='client';
                $user->active = 0;
                $user->password = md5($request->password1);
                $user->securequestion = $request->question;
                $user->secureanswer = md5($request->answer);
                $user->code = md5($code);
                $user->save();
            } catch (Throwable $e){
                return redirect()->back()->with('msgerr', 'Username already used, try another one');
            }

            //itexmo
            $res = $this->itexmo($request->phonenumber,$msg,$this->apiCode,$this->apiPassword);
            if ($res == ""){
                echo "iTexMo: No response from server!!!
                Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
                Please CONTACT US for help. ";	
            }
            else if ($res == 0){
                return redirect('/numberverification')->with('pno',$request->phonenumber);
            } else {	
                echo "Error Num ". $res . " was encountered!";
            }
            // end of itexmo
        } else {
            return redirect()->back();
        }
    }

    public function phonenumberValidation(Request $request){
        $user = User::where('phonenumber',$request->phonenumber)->get();
        foreach($user as $item){
            $code = $item->code;
            $id = $item->id;
        }
        $code2 = md5($request->code);
        if($code===$code2){
            $userr = User::find($id);
            $userr->active = 1;
            $userr->save();
            return redirect('/login')->with('msg','User has been verified.');
        } else {
            return redirect()->back()->with('pno',$request->phonenumber);
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

    function lockUser($id){
        try{
            $user = User::find($id);
            $user->active = 0;
            $user->save();
            session(['entries' => '3']);
        } catch(Throwable $e) {
            return redirect()->back()->with('msgerr','Notice: We cannot find your account');
        } 
    }

    public function backupDatabase(){
        try{
            
            if (!file_exists('D:/backup')) {
                mkdir('D:/backup', 0777, true);
            }

            define("BACKUP_PATH", "D:/backup/");

            date_default_timezone_set("Asia/Hong_Kong");

            $server_name   = "localhost";
            $username      = "root";
            $database_name = "xyt";
            $date_string   = date("m-d-Y_h-i-s-a");

            $cmd = "C:/xampp/mysql/bin/mysqldump --routines -h {$server_name} -u {$username} {$database_name} > " . BACKUP_PATH . "{$date_string}_{$database_name}.sql";

            exec($cmd);

            return redirect('/admin')->with('db-alert', 'DATABASE SUCCESSFULLY BACKED UP');
            
        } catch(throwable $e){
            die($e);
        }
    }   

    public function restoreDatabase(Request $request){
          try{

            $path = "D:/backup/" . $request->file;
            $username      = "root";
            $database_name = "xyt";

            $cmd = "C:/xampp/mysql/bin/mysql -u {$username} {$database_name} < $path";
            exec($cmd);

            return redirect('/admin')->with('rd-alert', 'DATABASE SUCCESSFULLY RESTORED');

          } catch(Throwable $e){
              die($e);
          }
    }

    //validation controller...end
}
