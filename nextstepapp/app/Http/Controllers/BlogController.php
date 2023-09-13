<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
      public function index()
      {
        // $blog = DB::select('SELECT tb_blog.*, tb_user.name FROM tb_blog JOIN tb_user ON tb_blog.id_user = tb_user.id ORDER BY tb_blog.id_berita DESC');
 
        // return view('blog', ['blog' => $blog]);
        $data = array(
            'title' => 'blog page'
        );
        return view('blog',$data);
     }
 
    //  public function tambahBlog()
    // {
    //     return view('tambahBlog');
    // }

    // public function simpansantri(Request $request)
    // {
    //     $santri = SantriModel::create([
    //         'nm_santri' => $request->nm_santri,
    //         'tmp_lahir' => $request->tmp_lahir,
    //         'tgl_lahir' => $request->tgl_lahir,
    //         'alamat' => $request->alamat,
    //         'no_hp' => $request->no_hp,
    //     ]);

    //     return redirect()->route('tampilsantri');
    // }
}
