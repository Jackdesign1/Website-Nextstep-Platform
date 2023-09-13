<?php

$result = mysqli_query("SELECT tb_blog.*, tb_user.name FROM tb_blog JOIN tb_user ON tb_blog.id_user = tb_user.id ORDER BY tb_blog.id_berita DESC");

if (!$result) {
  die("Query error: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tampil Data</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}?{{ time() }}">
</head>
<body>

   @include('header')

    <?php
    while ($post = mysqli_fetch_array($result)) {
    ?>
    <div class="container_blog">
        <div class="judul-blog">
            <h2><?php echo $post["judul_berita"]; ?></h2>
        </div>
        
</div>

        <div class="penulis-blog">
            <?php if (!empty($post['profile_picture'])) : ?>
          <img src="<?php echo $post['profile_picture']; ?>" alt="Profile Picture" style="width :50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px;">
        <?php else : ?>
          <img src="assets/img/profile.jpg" alt="Profile Picture" alt="Default Profile Picture" style="width :50px; height: 50px; border-radius: 50px; margin-top: 15px; margin-right: 10px;">
        <?php endif; ?>

            <p><?= $post['name'] ?></p>
            <p><?= $post['id_tanggal'] ?></p>
        </div>
        <div class="isi-berita">
            <p><?php echo $post["isi_berita"]; ?></p>
        </div>
    </div>
    <?php
    }
    ?>

    <div class="menu">
        <ul>
            <li><a href="story-nextstep.php">Story</a></li>
            <li><a href="introduction-nextstep.php">Introduction</a></li>

        </ul>
    </div>

    <div class="badan">

    <?php 
    if(isset($_GET['page'])){
        $page = $_GET['page'];
 
        switch ($page) {
            case 'home':
                include "introduction-nextstep.php";
                break;
            case 'tentang':
                include "story-nextstep.php";
                break;       
            default:
                echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                break;
        }
    }
 
     ?>

@include('footer')

</body>
</html>