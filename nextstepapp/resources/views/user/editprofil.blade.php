<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Edit Profile</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/checkprofile.css') }}?{{ time() }}">
</head>

<body>
@include('user/navbar')
@php
  $loggedInUser = Auth::user(); // Mendapatkan pengguna yang sedang login
@endphp

<div class="edit-profile-container">
  <h1>Edit Profile</h1>
  <form action="{{ route('editp', ['id' => $loggedInUser->id]) }}" method="post" enctype="multipart/form-data">
    @csrf <!-- Tambahkan CSRF token untuk keamanan -->

    <label for="profile_picture">Profile Picture</label>
    <input type="file" id="profile_picture" name="image" accept="image/jpeg,image/png">
<img id="preview_image" src="{{ asset('storage/assets/img/' . (!empty($loggedInUser->profile_picture) ? $loggedInUser->profile_picture : 'profile.jpg')) }}" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px; display: none;">


<script>
  // Fungsi untuk menampilkan gambar yang diupload pada form
  function previewImage() {
    var fileInput = document.getElementById('profile_picture');
    var previewImage = document.getElementById('preview_image');

    // Mengatur event listener ketika gambar dipilih
    fileInput.addEventListener('change', function() {
      var file = fileInput.files[0];
      var reader = new FileReader();

      // Mengatur event listener ketika pembacaan file selesai
      reader.addEventListener('load', function() {
        previewImage.src = reader.result;
        previewImage.style.display = 'block'; // Tampilkan gambar
      });

      if (file) {
        reader.readAsDataURL(file); // Membaca file sebagai URL data
      }
    });
  }

  // Panggil fungsi previewImage saat halaman selesai dimuat
  window.addEventListener('DOMContentLoaded', previewImage);
</script>



      <label for="name">Name</label>
      <input type="text" id="name" name="name" value="{{ old('name', $loggedInUser->name) }}">
      @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="username">Username:</label>
        <input type="text" name="username" id="username"  value="{{ old('email', $loggedInUser->username) }}" required oninput="validateUsername(this)">
      @error('username')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email', $loggedInUser->email) }}">
      @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
      <label for="password">Password</label>
      <input type="password" id="password" name="password" value="{{ old('email', $loggedInUser->email) }}">
      @error('password')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
      <label for="title">Title</label>
      <input type="text" id="title" name="title" value="{{ old('title', $loggedInUser->title) }}">
      @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
      <label for="bio">Bio</label>
      <textarea id="bio" name="bio">{{ old('bio', $loggedInUser->bio) }}</textarea>
      @error('bio')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror

      <button type="submit">Save Changes</button>
    </form>
  </div>
  <script>
  function validateUsername(input) {
    // Hapus karakter "@" yang ada di awal
    input.value = input.value.replace(/^@/, '');

    // Tambahkan "@" di awal jika tidak ada
    if (!input.value.startsWith('@')) {
      input.value = '@' + input.value;
    }
  }
</script>
</body>

</html>