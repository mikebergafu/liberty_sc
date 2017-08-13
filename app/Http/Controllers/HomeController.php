<?php
/**
 * Created by PhpStorm.
 * User: Mike-berg
 * Date: 12-08-2017
 * Time: 15:20
 */
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
Class HomeController extends BaseController{
    public function login(){
        return view('login');
    }

    public function doLogin(Request $req){
        //validate User inputs
        $validator=Validator::make(
            $req->all(),
            [
              'email' => 'required|email',
              'password' => 'required'
            ]
            );
        if($validator->fails()){
            return redirect('/')
            ->withErrors($validator)
            ->withInput();
        }
        //get user inputs
        $email=$req->input('email');
        $password=$req->input('password');

        //proceed to login
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            //sessions
            $user=Auth::user();
            $name=$user->fullname;
            return redirect('/dash')->with('data',['name'=> $name],'message',['type'=>'success', 'text'=>'Successfully Logged in']);
        }
        return redirect('/')->with('message',['type'=>'warning', 'text'=>'Login Unsuccessfully! Please Check Your Username or Password']);

    }

    public function doRegister(Request $req){
        //validate User inputs
        $validator=Validator::make(
            $req->all(),
            [
                'fullname' => 'required',
                'email' => 'required|email',
                'password' => 'required'
                //'password_confirm' => 'required'
            ]
        );
        if($validator->fails()){
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }
        //get user inputs
        $fullname=$req->input('fullname');
        $email=$req->input('email');
        $password=$req->input('password');
        //return $email.''.$password;

        DB::table('users')->insert(
            [
                'fullname'=>$fullname,
                'email'=>$email,
                'password'=>bcrypt($password)
            ]
        );
        return redirect('/register')->with('message',['type'=>'success', 'text'=>'Successfully Registered']);
    }

    public function register(){
        return view('register');
    }

    public function admin(){
        return view('dash');
    }

    public function getData(){
        $user=Auth::user();
        return $user;
    }
}