<?php
namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'dashboard page'
        );

        // Mengambil data dengan Paginator
           // Mengambil data postingan dari model Post
    $posts = Post::latest()->paginate(5);

    // Menampilkan tampilan user.dashboard dan mengirimkan data $posts
    return view('user.dashboard', compact('data','posts'));

    
    }
    public function dashboard(): View
    {
        $data = array(
            'title' => 'dashboard page'
        );

        // Mengambil data dengan Paginator
           // Mengambil data postingan dari model Post
    $posts = Post::latest()->paginate(5);

    // Menampilkan tampilan user.dashboard dan mengirimkan data $posts
    return view('user.dashboard', compact('data','posts'));

    }
    
}
?>