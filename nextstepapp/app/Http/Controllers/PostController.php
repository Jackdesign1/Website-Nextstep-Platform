<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Validasi form
    $request->validate([
        'deskripsi' => 'required|min:5',
        'foto' => 'image|mimes:jpeg,jpg,png|max:2048', // Aturan validasi untuk file gambar
    ]);

    // Proses unggahan gambar jika ada
    if ($request->hasFile('foto')) {
        // Upload gambar baru ke direktori penyimpanan yang sesuai
        $foto = $request->file('foto');
        $imagePath = $foto->storeAs('public/assets/img/', $foto->hashName());

    
        // Hapus gambar lama jika ada
        if ($request->hasFile('foto') && $request->id) {
            $post = Post::find($request->id);
            if ($post && $post->foto) {
                Storage::delete('public/assets/img/' . $post->foto);
            }
        }
        
        
        // Simpan data postingan beserta nama gambar ke database
        Post::create([
            'id' => $request->id,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto->hashName(),
        ]);
    } else {
        // Jika tidak ada gambar yang diunggah, simpan data postingan tanpa gambar
        Post::create([
            'id' => $request->id,
            'deskripsi' => $request->deskripsi,
        ]);
    }

    // Ambil data postingan terbaru untuk ditampilkan
    $posts = Post::latest()->paginate(5);

    // Render view dengan data postingan yang terbaru
    if ($request->ajax()) {
        // Return response JSON untuk indikasi sukses dan pesan sukses
        return response()->json(['message' => 'Postingan berhasil disimpan', 'posts' => $posts]);
    } else {
        // Jika permintaan bukan melalui AJAX, kembalikan tampilan HTML
        return view('user.dashboard', compact('posts'));
    }
}

    // public function store(StorePostRequest $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Post $post)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Post $post)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(UpdatePostRequest $request, Post $post)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Post $post)
    // {
    //     //
    // }
}
