
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nextstep - Home</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylein.css') }}?{{ time() }}">
</head>
<body>
@include('user/navbar')
@php
  $loggedInUser = Auth::user(); // Mendapatkan pengguna yang sedang login
  $users = \App\Models\User::where('id', $loggedInUser->id)->paginate(10); // Menggunakan paginate untuk mengambil postingan
  @endphp
  <div class="container">
    <div class="container-1">
      <!-- Isi kontainer 1 di sini -->
    </div>
    <div class="container-2">
      <div class="column-center">
      <div class="column-center-left" style="border: none;">
 
  @if (!empty($loggedInUser->profil_picture))
        <img src="{{ asset('storage/public/assets/img/' . $loggedInUser->profil_picture) }}" alt="Profile Picture" style="width :50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px;">
      @else
        <img src="{{ asset('storage/public/assets/img/profile.jpg') }}" alt="Default Profile Picture" style="width :50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px;">
      @endif
       
        </div>
      <div class="column-center-right">
      <form action="{{route('posts.create')}}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="text" name="id" id="id" value="{{ old('id', $loggedInUser->id) }}" hidden><br>
        <textarea class="custom-textarea" name="deskripsi" placeholder="share your ideas into words........"></textarea>
        <label for="fileInput" class="custom-file-upload">
          <input type="file" id="fileInput" name="foto">
          <img src="../assets/img/document.png" alt="Document Icon">
        </label>
        <label for="fileInput" class="custom-file-upload">
          <input type="file" id="fileInput" name="foto">
          <img src="../assets/img/galery.png" alt="Document Icon">
        </label>

        <button type="submit" name="submit" style="float: right; margin-right: 10px; padding:5px; padding-left:15px; padding-right:15px; rect-align:center; color:white; background: green; border-radius:25px;">Post</button>
      </form>
    </div>
</div>

<div class="follow-touggle">
  <button>For You</button>
  <button>Followed</button>
</div>

@forelse($posts as $post)
  <div class="container-post-h">
    <div class="container-profil-h">
      <div class="container-profil-left">
      @php
        // Menggunakan Eloquent untuk mengambil data pengguna (user) yang terkait dengan post
        $user = \App\Models\User::join('tb_post', 'tb_user.id', '=', 'tb_post.id')
            ->where('tb_post.id', $post->id)
            ->select('tb_user.name', 'tb_user.profil_picture', 'tb_user.title', 'tb_user.profil_picture')
            ->first();
      @endphp
      @if (!empty($user->profil_picture))
        <img src="{{ asset('storage/public/assets/img/' . $user->profil_picture) }}" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px;">
      @else
        <img src="{{ asset('storage/public/assets/img/profile.jpg') }}" alt="Default Profile Picture" style="width: 50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px;">
      @endif
      </div>
      <div class="container-profil-right">
        @if($user)
          <p>{{ $user->name }}</p>
          <p>{{ $user->title }}</p>
        @endif
      </div>
    </div>
    <div class="container-isi-h">
      <p>{{ $post->deskripsi }}</p>
      <img src="{{asset('storage/public/assets/img/' . $post->foto) }}" alt="" style="width: 100px;">
    </div>
    <div class="container-isi-btn">
      <button><img src="../assets/img/like.png"></button>
      <button><img src="../assets/img/comment.png"></button>
      <button><img src="../assets/img/retweet.png"></button>
      <button><img src="../assets/img/send.png"></button>
    </div>
  </div>
@empty
  <div class="alert alert-danger">
    Data Post belum Tersedia.
  </div>
@endforelse

{{ $posts->links() }}

  </div>
  <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
    <script>
    // Fungsi untuk mengirimkan permintaan AJAX saat formulir disubmit
    $(document).ready(function () {
        $('#create-post-form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    if (response.message) {
                        alert(response.message); // Tampilkan pesan sukses
                        $('#create-post-form')[0].reset(); // Bersihkan formulir

                        // Cek apakah ada data postingan yang dikembalikan
                        if (response.posts) {
                            // Reload halaman hanya jika postingan berhasil disimpan
                            location.reload();
                        }
                    } else {
                        alert('Terjadi kesalahan. Postingan gagal disimpan.');
                    }
                },
                error: function () {
                    alert('Terjadi kesalahan. Postingan gagal disimpan.');
                }
            });
        });
    });
</script>

</body>

