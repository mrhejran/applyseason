<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Register;
use App\Message;
use App\Seemore;

class userController extends Controller
{
    public function registerFunction(Request $request)
    {
        if($request->name == "" || $request->email == "" || $request->password == "")
        {
            return redirect()->back()->withErrors('emptyLog');
        }else{
            $name = $request->name;
	        $email = $request->email;
	        $password = bcrypt($request->password);
	        $array = [
	            'name'        =>      $name,
	            'password'    =>      $password,
	            'email'       =>      $email,
	        ];
	        Register::create($array);
            $request->session()->put('email',$email);
    		return redirect('/user-panel');
        }
    }
    public function loginFunction(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $users = DB::table('users')->where('email', $email)->get();
        
            $dbPass = $users[0]->password;
            if(password_verify($password, $dbPass))
            {
                $request->session()->put('email',$email);
				$clicks = DB::select("SELECT clicks FROM seemore");
				$db_clicks = $clicks[0]->clicks;
				$new_click = $db_clicks + 1;
				DB::table('seemore')->update(['clicks' => $new_click]);

                return redirect('/user-panel');
            }else{
                return redirect()->back();
            }

    }
    public function logout(Request $request)
    {
    	session()->forget('email');
    	return redirect('/');
    }
    public function user_dashboard(Request $request)
    {
    	$data = DB::select("SELECT * FROM professor_data ORDER BY 1 DESC");
    	$s = 1;
        $value = $request->session()->get('email');
    	return view('user.user_panel',['data'=>$data, 's'=>$s, 'value'=>$value]);
    }
    public function user_ticket(Request $request)
    {
        $value = $request->session()->get('email');
        $results = DB::select('select name from users where email = ?', [$value]);
    	return view('user.user_ticket', ['value'=>$value]);
    }
    public function send_message(Request $request)
    {
        $email = $request->email;
        $message = $request->message;
        $status = 1;
        $array = [
	            'email'        =>      $email,
	            'message'      =>      $message,
	            'status'       =>      $status,
	        ];
        Message::create($array);
		echo "<script>alert('Message Sent to Admin')</script>";
		echo "<script>window.open('/user-ticket', '_self')</script>";
    }
    public function user__panel(){
    	$clicks = DB::select("SELECT clicks FROM seemore");
		$db_clicks = $clicks[0]->clicks;
		$new_click = $db_clicks + 1;
		DB::table('seemore')->update(['clicks' => $new_click]);
        return redirect('/user-panel');


    }

}
