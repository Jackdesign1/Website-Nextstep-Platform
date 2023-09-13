<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>work</title>
	<style>

		
	</style>
</head>
<body>
@include('user/navbar')
 
 <!-- @php
 $loggedInUser = Auth::user(); // Mendapatkan pengguna yang sedang login
 $users = \App\Models\User::where('id', $loggedInUser->id)->paginate(10); // Menggunakan paginate untuk mengambil postingan
 @endphp

 @if($users->isEmpty())
  <div class="alert alert-danger">
    Data Post belum Tersedia.
  </div>
  @else -->
  @forelse($posts as $post)
  @php
        // Menggunakan Eloquent untuk mengambil data pengguna (user) yang terkait dengan post
        $user = \App\Models\User::join('tb_post', 'tb_user.id', '=', 'tb_post.id')
            ->where('tb_post.id', $post->id)
            ->select('tb_user.name', 'tb_user.profil_picture', 'tb_user.title', 'tb_user.profil_picture')
            ->first();
        @endphp
    	<div class="container-2">
  <div class="container-post-h">
    <div class="container-profil-h">
      <div class="container-profil-left">
      @if (!empty($user->profil_picture))
        <img src="{{ asset('storage/public/assets/img/' . $user->profil_picture) }}" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px;">
      @else
        <img src="{{ asset('storage/public/assets/img/profile.jpg') }}" alt="Default Profile Picture" style="width: 50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px;">
      @endif</div>
      <div class="container-profil-right">
      @if($user)
          <p>{{ $user->name }}</p>
          <p>{{ $user->title }}</p>
        @endif
      </div>
    </div>
    <div class="container-isi-h">
    @if (!empty($post->deskripsi))
        <p>{{ $post->deskripsi }}</p>
        @endif
        @if (!empty($post->foto))
          <img src="{{asset('storage/public/assets/img/' . $post->foto) }}" alt="" style="width: 100px;">
        @endif
      </div>
    <div class="container-isi-btn">
      <button><img src="../assets/img/like.png"></button>
      <button><img src="../assets/img/comment.png"></button>
      <button><img src="../assets/img/retweet.png"></button>
      <button><img src="../assets/img/send.png"></button>
    </div>
  </div>
    	</div>
        @endforeach

{{ $users->links() }} <!-- Menampilkan tautan paginasi -->
@endif
@if(session()->has('success'))
  <script>
    toastr.success('{{ session('success') }}', 'BERHASIL!'); 
  </script>
  @elseif(session()->has('error'))
  <script>
    toastr.error('{{ session('error') }}', 'GAGAL!'); 
  </script>
  <!-- @endif -->
</body>
</html>