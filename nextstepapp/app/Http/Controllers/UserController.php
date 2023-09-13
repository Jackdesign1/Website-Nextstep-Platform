<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(): View
{
    // Mendapatkan data pengguna (users) dengan paginasi
    $users = User::latest()->paginate(5);

    // Mengirimkan data pengguna ke tampilan 'profil.index'
    return view('profil.index', compact('users'));
}

    public function tampillogin()
    {
        return view('user.login');
    }
    public function tampilpass()
    {
        return view('user.gantipass');
    }

    public function tambahuser()
    {
        return view('user.registrasi');
    }

    public function simpanuser(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Tambahkan tanda kutip dan gunakan $request->password
        ]);
        // dd($request->all());

        return view('user.login');
    }
    public function edit()
    {
        //get post by ID
        //render view with post
        return view('user.editprofil');
    }
    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'image'   => 'image|mimes:jpeg,jpg,png|max:2048',
            'name'     => 'required|min:5',
            'username' => 'required|min:5',
            'email'    => 'required|min:5',
            'password' => 'required|min:5',
            'bio'     => 'required|min:5',
            'title'   => 'required|min:5',
        ]);
    
        // Dapatkan data pengguna berdasarkan ID
        $user = User::findOrFail($id);
    
        // Periksa apakah gambar diunggah
        // ...

if ($request->hasFile('image')) {
    // Upload gambar baru ke direktori penyimpanan yang sesuai
    $image = $request->file('image');
    $imagePath = $image->storeAs('public/assets/img/', $image->hashName());

    // Hapus gambar lama jika ada
    if ($user->profil_picture) {
        Storage::delete('public/assets/img/' . $user->profil_picture);
    }

    // Update data pengguna dengan gambar baru
    $user->update([
        'name'           => $request->name,
        'username'       => $request->username,
        'email'          => $request->email,
        'password'       => Hash::make($request->password), // Hash kata sandi baru
        'bio'            => $request->bio,
        'profil_picture' => $image->hashName(), // Simpan nama file gambar
        'title'          => $request->title,
    ]);
} else {
    // Update data pengguna tanpa mengganti gambar
    $user->update([
        'name'     => $request->name,
        'username' => $request->username,
        'email'    => $request->email,
        'password' => Hash::make($request->password), // Hash kata sandi baru
        'bio'      => $request->bio,
        'title'    => $request->title,
    ]);
}
return redirect()->route('user.profil')->with(['success' => 'Data Berhasil Diubah!']);
}

public function gantipass(Request $request): RedirectResponse
{
    // Periksa apakah password memenuhi persyaratan minimum panjang
    if (strlen($request->password) < 8) {
        return redirect()->back()->with('error', 'Password harus memiliki minimal 8 karakter.');
    }

    // Validasi form
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8',
        'confirm' => 'required|same:password',
    ]);

    // Temukan pengguna berdasarkan alamat email
    $user = User::where('email', $request->email)->first();

    // Periksa apakah pengguna ditemukan
    if (!$user) {
        session()->flash('error', 'Email tidak ditemukan.');
        return redirect()->back()->with('error', 'Email tidak ditemukan.');
    }

    // Generate token reset password
    $token = \Str::random(60);

    // Simpan kata sandi baru yang di-hash ke dalam tabel pengguna
    $user->update([
        'password' => Hash::make($request->password),
        'reset_password_token' => $token,
    ]);

    // Kirim email dengan link reset password ke pengguna (Anda perlu mengimplementasikan ini)

    return redirect()->route('login')->with(['success' => 'Permintaan reset password berhasil. Silakan cek email Anda.']);
}

     // Redirect ke halaman profil pengguna dengan pesan sukses
      
    

    }      
    

    
   

