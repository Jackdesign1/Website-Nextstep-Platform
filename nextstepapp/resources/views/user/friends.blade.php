<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>friends</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/checkprofile.css') }}?{{ time() }}">
</head>
<body>
  @include('user/navbar')
  <div class="follow-toggle">
    <button>For You</button>
    <button>Followed</button>
  </div>

    <div class="container-2">
    <div class="container-post-h">
    @foreach($posts as $post)
    @php
        // Menggunakan Eloquent untuk mengambil data pengguna (user) yang terkait dengan post
        $user = \App\Models\User::join('tb_post', 'tb_user.id', '=', 'tb_post.id')
            ->where('tb_post.id', $post->id)
            ->select('tb_user.name', 'tb_user.profil_picture', 'tb_user.title', 'tb_user.profil_picture','tb_user.username')
            ->first();
        @endphp
      <div class="container-profil-h">
        <div class="container-profil-left">
          @if (!empty($user->profile_picture))
          <img src=" ../assets/img/{{ $user->profil_picture }}" alt="Default Profile Picture" style="width: 50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px;">
          @else
            <img src="../assets/img/profile.jpg" alt="Default Profile Picture" style="width: 50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px;">
          @endif
        </div>
        <div class="container-profil-right">
          <p>{{ $user->name }}</p>
          <p>{{ $user->username }}</p>
          <p>{{ $user->title }}</p>
          
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
        @endforeach
        {{ $posts->links() }}
      </div>
    </div>
  
  </div>
 
</body>
</html>
