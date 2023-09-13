<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class WorkController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'work page'
        );
        $posts = Post::with('user')->paginate(10);
        $users = User::all();
        return view('user.work', compact('posts', 'users'));
    }
}
