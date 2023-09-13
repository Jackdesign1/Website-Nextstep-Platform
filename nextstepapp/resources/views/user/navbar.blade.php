
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nextstep - Home</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylein.css') }}?{{ time() }}">
</head>
<body>
@php
            $loggedInUser = Auth::user(); // Retrieve the currently logged-in user
            @endphp
<nav class="navbar">
    <div class="navbar-left">
        <img src="../assets/img/logo_nextstep.png" class="logo_ns" href="home.php">
        <div class="search-bar">
            <input type="text" class="search-input" placeholder="Cari...">
            <button class="search-button">Cari</button>
        </div>
        <div class="nav-link-center">
        <a class="nav-link" href="/dashboard"><img src="../assets/img/home.png"></a>
        <a class="nav-link" href="/friends"><img src="../assets/img/friends.png"></a>
        <a class="nav-link" href="/work"><img src="../assets/img/link.png"></a>
        <a class="nav-link" href="#"><img src="../assets/img/notification.png"></a>
        <a class="nav-link" href="#"><img src="../assets/img/marketplace.png"></a>
      </div>
        <div class="dropdown">
            <input type="checkbox" id="group-toggle" class="toggle">
            <label for="group-toggle" class="group-link">
  
    @if (!empty($loggedInUser->profil_picture))
        <img src="{{ asset('storage/public/assets/img/' . $loggedInUser->profil_picture) }}" alt="Profile Picture">
      @else
        <img src="{{ asset('storage/public/assets/img/profile.jpg') }}" alt="Profile Picture">
      @endif
</label>

            <div class="dropdown-content">
                       
            <a href="/editprofil">Edit Profile</a>
            <a href="/profil">Check Profile</a>
            <a href="/">Logout</a>

            </div>
        </div>
    </div>
</nav>
</body>
</html>
