<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/reglog.css') }}?{{ time() }}">
</head>
<body>

@include('header')

<div class="login-container">
  <h2>Login</h2>
  <form method="POST" action="{{ route('actionlogin') }}" >
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit" name="submit">Login</button>
  </form>
  <a class="register-link" href="/register">Don't have an account? Register</a>
  <a class="register-link" href="/gantipass">Lupa Password</a>
</div>

<!-- user/login.blade.php -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        });
    @endif
</script>

</body>
</html>
