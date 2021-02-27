<?php
include 'program/koneksi.php';
session_start();
if (isset($_SESSION['username'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/layout.css?v=2" type="text/css">
    <title>Home</title>
</head>
<body>
    <section class="barslide">
        <div class="img">
        <img src="img/Untitled-1.png" >
        <?php
        $user=mysqli_query($koneksi,"SELECT * FROM user WHERE username='$_SESSION[username]'");
        $usera=mysqli_fetch_array($user);
        ?>
        <p id="bold">
        <?php echo $usera['username'] ;?></p>
        </div>
        <div class="nav-bar">
            <ul>
                <li class=""><a href="home.php">Home</a></li>
                <li><a href="about.php" id="home">About</a></li>
                <li><a href="add_data_buku.php">Add Data Buku</a></li>
                <li><a href="#">Add Data User</a></li>
                <li><a href="#">Add Data Peminjam</a></li>
                <li><a href="#">Pinjam Buku</a></li>
                <li><a href="#">Kembalikan Buku</a></li>
                <li><a href="#">Sign Out</a></li>
            </ul>
        </div>
    </section>

    <section class="container">
        <div class="header">
                <img src="img/logo.png" />
                <h3>
                    Selamat Datang :
                    <?php echo $usera['username']; ?>
                </h3>
        </div>
        <div class="content">
        <div class="rie">
            <img src="img/rie.png" class="baru-rie" />
            <div class="about">
                <img src="img/buku.png" />
                <p class="">
                
                </p>
            </div>
            <div class="about">
                <img src="img/buku.png" />
                <p class="">
                
                </p>
            </div>
            <div class="about">
                <img src="img/buku.png" />
                <p class="">
                
                </p>
            </div>
        </div>
        </div>
    </section>
</body>
</html>
<?php
}
else{
    echo "<script>alert('perhatikan masuk login dahulu');location.href='index.php';</script>";
}
?>