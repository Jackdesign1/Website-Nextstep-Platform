<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Header</title>
  <style>
    /* Reset CSS untuk menghilangkan margin dan padding default */
    body, h1, p, img {
      margin: 0;
      padding: 0;
    }

    /* Ganti warna background dan warna teks pada footer */
    footer {
      background-color: #EFF6DC;
      color: #333;
      padding: 20px;
      display: flex;
      flex-wrap: wrap; /* Menyusun elemen-elemen secara wrap jika lebar layar tidak cukup */
      justify-content: center;
      gap: 200px;
      font-size: 18px;
      font-family: Arial, sans-serif; /* Menggunakan jenis font Arial atau font sans-serif sebagai fallback */
      border-top-left-radius: 25px;
      border-top-right-radius: 25px;
    }

    /* Gaya untuk container logo */
    .logo-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    /* Tambahkan gaya untuk logo */
    .logo {
      width: 150px;
      height: auto;
    }

    /* Gaya untuk paragraf lainnya di footer */
    .footer-content {
      text-align: left; /* Ubah menjadi left untuk menjaga konten kiri rata */
      display: flex; /* Menyusun elemen-elemen secara flex */
      flex-direction: column; /* Menyusun elemen-elemen secara vertikal */
      align-items: flex-start; /* Menjaga elemen-elemen sejajar di sisi kiri */
    }

    /* Gaya untuk menghilangkan titik pada ul li */
    ul {
      list-style-type: none;
      padding: 0;
    }

    .foot {
      background: seagreen;
      padding: 30px; /* Reduce padding top and bottom */
      text-align: center;
      font-size: 14px;
      color: #fff; /* White text color */
      display: flex; /* Arrange elements using flexbox */
      justify-content: center; /* Center elements horizontally */
      align-items: center; /* Center elements vertically */
    }

    /* Style for the select element to create space between text and select */
    select {
      margin-left: 10px; /* Add space between text and select */
    }
  </style>
</head>
<body>
  <footer>
    <div class="footer-content">
      <h3>About</h3>
      <ul>
        <li>About Us</li>
        <li>Help Center</li>
        <li>Blog</li>
        <li>Press</li>
        <li>Premium</li>
      </ul>
    </div>
    <div class="footer-content">
      <h3>Company & Contact</h3>
      <ul>
        <li>Careers</li>
        <li>Investor Relations</li>
        <li>Company Support</li>
        <li>Our Team</li>
        <li>Contact</li>
        <li>Partnership</li>
      </ul>
    </div>
    <div class="footer-content">
      <h3>Community</h3>
      <ul>
        <li>Forum</li>
        <li>Events</li>
        <li>Meetups</li>
        <li>Contributors</li>
        <li>Newsletter</li>
      </ul>
    </div>
  </footer>
  <div class="foot">
    <p>&copy; 2023 NextStep. All rights reserved. | Terms & Privacy Policy</p>
    <select>
      <option value="pilihan1">English</option>
      <option value="pilihan2">Indonesia</option>
    </select>
  </div>


  </div>
</body>
</html>
