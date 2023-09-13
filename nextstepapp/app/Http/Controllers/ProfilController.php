<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;


class ProfilController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'profil page'
        );
        $users = User::paginate(10); // Menggunakan Paginator dengan 10 item per halaman

        return view('user.profil', compact('users'));
    }
    public function showProfile()
    {
        // Ambil data postingan dan pengguna yang diperlukan
        $posts = Post::with('user')->paginate(10);
        $users = User::all();

        return view('user.friends', compact('posts', 'users'));
    }
    // public function editProfile()
    // {
    //     // Ambil data postingan dan pengguna yang diperlukan
    //      //get post by ID
    //      $users = User::findOrFail($id);

    //      //render view with post
    //      return view('user.editprofil', compact('post'));
    // }
}
