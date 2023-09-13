<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class RegisterController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'register page'
        );
        return view('user/register',$data);
    }
}
