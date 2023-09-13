<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'about page'
        );
        return view('about',$data);
    }
}
