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
    <link rel="stylesheet" href="css/layout.css" type="text/css">
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
                <li class=""><a href="#" id="home">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Add Data Buku</a></li>
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
            <div class="box">
                
            </div>
            <div class=""></div>
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