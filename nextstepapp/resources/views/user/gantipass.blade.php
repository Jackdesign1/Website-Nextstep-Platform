<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupa Password</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/reglog.css') }}?{{ time() }}">
</head>
<body>

@include('header')

<div class="login-container">
  <h2>Lupa Password</h2>
  <form method="POST" action="{{ route('gantipass') }}">
    @csrf
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <label for="confirm">Konfirmasi Password:</label>
    <input type="password" id="confirm" name="confirm" required>
    <button type="submit" name="submit">Submit</button>
  </form>

  <a class="register-link" href="/login">Back</a>
</div>
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
