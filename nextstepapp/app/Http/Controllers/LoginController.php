<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'login page'
        );
        return view('user/login',$data);
    }
    public function actionLogin(Request $request)
    {
    $data = [
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ];

    if (Auth::Attempt($data)) {
        return redirect('/dashboard');
    }else{
        Session::flash('error', 'Email atau Password Salah');
        return redirect('/login');
    }
    }
    public function actionLogout()
    {
        Auth::logout();
        return redirect('/');
    }

}
