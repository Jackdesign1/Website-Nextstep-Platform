<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Profile</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}?{{ time() }}">
  <style>
    .search-container {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .search-container input[type="text"] {
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 25px;
      flex-grow: 1;
      margin-right: 10px;
    }

    .search-container select {
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 25px;
      min-width: 150px;
      margin-right: 10px;
    }

    .search-container button {
      background-color: seagreen;
      color: black;
      padding: 10px 20px;
      border: none;
      border-radius: 25px;
      cursor: pointer;
    }

    .join-nextstep {
      margin-top: 20px;
    }

    .dalam {
      margin-top: 10px;
      flex-direction: column;
      align-items: center;
    }

    .dalam button {
      background-color: white;
      color: black;
      padding: 10px 20px;
      border: 1px solid black;
      border-radius: 25px;
      cursor: pointer;
      display: inline-block;
      margin-right: 10px;
      text-align: center;
    }

    .dalam button:last-child {
      margin-right: 0;
    }

    .konten-join {
      background-color: seagreen;
      padding: 100px;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .konten-join button {
      margin-top: 50px;
      padding: 10px;
      border-radius: 25px;
      font-weight: bold;
      background-color: #ffff;
    }
  </style>
</head>
<body>
  @include('header')

  <div class="content">
    <div class="left-column">
      <h1>Find the right project</h1>
      <h1>for you :</h1>
      <br>
      <div class="search-container">
        <input type="text" id="projectName" name="projectName" placeholder="Search Project...">
        <select id="location" name="location">
          <option value="">Select Location</option>
          <option value="location1">Surabaya</option>
          <option value="location2">Sidoarjo</option>
          <option value="location3">Yogyakarta</option>
          <option value="location4">Jakarta</option>
          <!-- Add more location options if needed -->
        </select>
        <button type="submit">Search Project</button>
      </div>
      <div class="join-nextstep">
        <p>Or register now and we'll do the searching for you:</p>
        <div class="dalam">
          <button><p><img src="assets/img/mail.png" alt="NextStep Image" style="width :20px;">Register</p></button>
          <button><p><img src="assets/img/google.png" alt="NextStep Image" style="width :20px;" >Login with Google</p></button>
          <div class="dalam-1">
            <br>
            <p>I accept Nextstep GTC and acknowledge the Privacy Policy.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="right-column">
      <img src="assets/img/project.jpg" alt="NextStep Image">
    </div>
  </div>
  <div class="content">
    <div class="left-column">
      <h2>Explore Your Project Journey</h2>
      <p>Nextstep goes beyond your resume. Whether you're embarking on a new venture, seeking a change of direction, or pursuing your passion projects, we empower you to unleash your true potential in the realm of captivating projects. Discover the authentic you!</p>
    </div>
    <div class="right-column">
      <img src="assets/img/project-1.jpg" alt="NextStep Image">
    </div>
  </div>
  <div class="content">
    <div class="left-column"><img src="assets/img/project-2.jpg" alt="NextStep Image" style="width:800px;">
      
    </div>
    <div class="right-column">
      <h2>Endless Opportunities, Limitless Growth</h2>
      <p>Immerse yourself in a gallery of captivating projects, handpicked to match your preferences and aspirations. Define your career path, uncover personal development opportunities, and find the employers and company culture that resonate with your vision for success.</p>
    </div>
  </div>
  <div class="content">
    <div class="left-column">
      <h2>Connect with Your Dream Team</h2>
      <p>Join a community of over [Number] professionals and [Number] projects! Engage with industry experts, HR professionals, and recruiters from leading companies. Forge meaningful connections with individuals who share your drive for innovation and watch your projects soar!</p>
    </div>
    <div class="right-column">
      <img src="assets/img/project-3.jpg" alt="NextStep Image">
    </div>
  </div>
<div class="konten-join">
	<h1>Nextstep- A social media platform-based project community fostering collaboration and connecting people with exciting projects.</h1>
  <div class="join-button">
    	<button><p>Join now for free</p></button>
    </div>
</div>
</div>

  <!-- Tambahkan bagian lainnya sesuai kebutuhan Anda -->

  @include('footer')
</body>
</html>
