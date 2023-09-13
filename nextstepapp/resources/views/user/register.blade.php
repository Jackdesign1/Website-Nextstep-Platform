<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/reglog.css') }}?{{ time() }}">
  </head>
  <body>
    <div class="registration-container">
      <h2>Registration</h2>
      <form action="{{route('simpanuser')}}" method="post" autocomplete="off">
      @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required oninput="validateUsername(this)">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <label for="confirmpassword">Confirm Password:</label>
        <input type="password" name="confirmpassword" id="confirmpassword" required><br>
        <button type="submit" name="submit">Register</button>
      </form>
      <a href="/login">already have account? login</a>
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
