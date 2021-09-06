<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //

    public function register(){
    	return view('register');
    }

    public function registerSubmit(Request $request){
    	$request->validate([
    		'name' => 'required',
    		'email' => 'required|email|unique:users',
    		'password' => 'required'
    	]);
    	try{
    		$token = \Str::random(60);
    		User::create(['name'=>$request->name,'email'=>$request->email,'password'=>bcrypt($request->password),'remember_token'=>$token]);
            try{
                $details = [
                    'link' => env('APP_URL').'verify/'.$token
                ];
                \Mail::to($request->email)->send(new \App\Mail\VerifyMail($details));
            }
            catch(\Exception $e){
                // dd($e->getMessage());
            }

    	}
    	catch(\Exception $e){
    		// dd($e->getMessage());
            return redirect('register')->with('error', "Something went wrong..!! Please try again later");
    	}
        return redirect('register')->with('success', "We sent a verification mail");
    }

    public function verify($token){
        try{
            $data = User::where('remember_token', $token)->first();
            if($data){
                User::where('remember_token', $token)->update(['status'=>1]);
                echo "Email verified successfully";
            }else{
                echo "Token is invalid or expired";
            }
        }
        catch(\Exception $e){
            // dd($e->getMessage());
        }
    }

    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);
        $data = User::where('email', $request->email)->where('status',1)->first();
        if($data){
            if (\Hash::check($request->password, $data->password)) {
                echo "Login successfully";
            }else{
                return redirect('login')->with('error','username or password is incorrect');    
            }
        }else{
            return redirect('login')->with('error','email is not verified');
        }
    }
}
