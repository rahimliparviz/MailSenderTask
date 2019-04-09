<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Mail\verifyEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }


    public function register(){
        return view('auth.register');
    }


    public function registerUser(RegisterUserRequest $request){

        $request->validated();
        $request['password'] = bcrypt($request->password);
        $request['token'] = Str::random(22);
        $user = User::create($request->all());
        Mail::send(new verifyEmail($user));
        Session::put('user',$user);
        return redirect('/');
    }

    public function loginUser(LoginUserRequest $request){

        $request->validated();
        $user = User::where('email',$request->email)->first();
        if( password_verify($request->password,$user->password)){
            Session::put('user',$user);
            return redirect('/');
        }

        return redirect('/login');
    }

    public function logout(){
        Session::flush();
        return redirect('/login');

    }

    public function confirm(){
        return view('confirm');
    }


    public function sendVerificationEmail($email,$token){
        $user = User::where(['email'=>$email,'token'=>$token])->first();
        if($user){
           $updatedUser = User::where(['email'=>$email,'token'=>$token])->update(['verified'=>1]);

            $user->verified = 1;
            $user->update();

            Session::put('user',$user);
            return redirect('/');

        }else{
            return redirect('/login');
        }
    }

}
