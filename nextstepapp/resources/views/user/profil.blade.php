<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Nextstep - Profile</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/checkprofile.css') }}?{{ time() }}">
  <!-- Tambahkan link CSS untuk Toastr di sini -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body>
  @include('user/navbar')
 
  @php
  $loggedInUser = Auth::user(); // Mendapatkan pengguna yang sedang login
  @endphp

  <div class="profile-container">
    <!-- Konten profil pengguna -->
    <div class="profile-picture">
      @if (!empty($loggedInUser->profil_picture))
        <img src="{{ asset('storage/public/assets/img/' . $loggedInUser->profil_picture) }}" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px;">
      @else
        <img src="{{ asset('storage/public/assets/img/profile.jpg') }}" alt="Default Profile Picture" style="width: 50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px;">
      @endif
    </div>
    <div class="profile-info">
      <h1 class="profile-name">{{ $loggedInUser->name }}</h1>
      <p class="profile-name">{{ $loggedInUser->username }}</p>
      <p class="profile-title">{{ $loggedInUser->title }}</p>
      <p class="profile-bio">{{ $loggedInUser->bio }}</p>
    </div>
  </div>

  <div class="container-2">
    <button>Post</button>
    <button>Background</button>
  </div>  

  @if ($users->isEmpty())
    <div class="alert alert-danger">
      Data Post belum Tersedia.
    </div>
  @else
    @foreach($users as $user)
      @php
        // Menggunakan Eloquent untuk mengambil data pengguna (user) yang terkait dengan post
        $post = \App\Models\User::join('tb_post', 'tb_user.id', '=', 'tb_post.id')
            ->where('tb_user.id', $loggedInUser->id)
            ->select('tb_post.deskripsi', 'tb_post.foto')
            ->first();
      @endphp
      <div class="container-post">
        <!-- Konten postingan -->
        <div class="container-profil">
          <div class="container-profil-left">
            <!-- Mengambil gambar profil dari pengguna yang terkait dengan postingan -->
            @if (!empty($loggedInUser->profil_picture))
              <img src="{{ asset('storage/public/assets/img/' . $loggedInUser->profil_picture) }}" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px;">
            @else
              <img src="{{ asset('storage/public/assets/img/profile.jpg') }}" alt="Default Profile Picture" style="width: 50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px;">
            @endif
          </div>
          <div class="container-profil-right">
            <p>{{ $loggedInUser->name }}</p>
            <p>{{ $loggedInUser->title }}</p>
          </div>
        </div>
        <div class="container-isi">
          @if (!empty($post->deskripsi))
            <p>{{ $post->deskripsi }}</p>
          @endif
          @if (!empty($post->foto))
            <img src="../assets/img/{{ $post->foto }}" alt="" style="width: 100px;">
          @endif
        </div>
        <div class="container-isi">
          <button>like</button>
          <button>comment</button>
          <button>share</button>
        </div>
      </div>
    @endforeach

    {{ $users->links() }} <!-- Menampilkan tautan paginasi -->
  @endif

  <!-- Tambahkan skrip JavaScript untuk Toastr di sini -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  @if(session()->has('success'))
    <script>
      toastr.success('{{ session('success') }}', 'BERHASIL!'); 
    </script>
  @elseif(session()->has('error'))
    <script>
      toastr.error('{{ session('error') }}', 'GAGAL!'); 
    </script>
  @endif
</body>
</html>
