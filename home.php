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
    <link rel="stylesheet" href="css/layout.css?v=1.1" type="text/css">
    <title>Home</title>
    <script type="text/javascript">
	var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
	var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var date = new Date();
            var day = date.getDate();
            var tgl =  date.getDay();
                tgl = days[tgl];
            var month = date.getMonth();


            function showTime() {
                var today = new Date();
                var curr_hour = today.getHours();
                var curr_minute = today.getMinutes();
                var curr_second = today.getSeconds();
            
                curr_hour = checkTime(curr_hour);
                curr_minute = checkTime(curr_minute);
                curr_second = checkTime(curr_second);
                document.getElementById('time').innerHTML=tgl + "," + day + " " + months[month]+","+curr_hour + ":" + curr_minute + ":" + curr_second;
            }
            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
            setInterval(showTime, 500);         
        </script>
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
                <li class=""><a href="home.php" id="home">Home</a></li>
                <li><a href="about.php">About</a></li>
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
        <?php 
        $data=mysqli_query($koneksi,"SELECT * FROM user");
        $jumlahuser=mysqli_num_rows($data);
        ?>
        <?php
        $buku=mysqli_query($koneksi,"SELECT SUM(jumlah_buku) AS  total FROM buku") or die(mysqli_error());
        $jumlahbuku=mysqli_fetch_array($buku);
        ?>
        <div class="content">
            <div class="box">
                <div class="boxs" style="background-color: #2fff67;">
                    <img src="img/Untitled-2.png" />
                    <h2>Jumlah User :<?php echo $jumlahuser; ?> </h2>
                    <p>User yang bisa login hanya yang terpampang diatas</p>
                </div>
                <div class="boxs" style="background-color: #4c49dd;">
                    <img src="img/buku.png" />
                    <h2>Jumlah Buku:<?php echo $jumlahbuku['total']; ?> </h2>
                    <p>User yang bisa login hanya yang terpampang diatas</p>
                </div>
                <div class="boxs" style="background-color: #e29837;" >
                    <img src="img/Untitled-2.png" />
                    <h2>Jumlah Peminjam</h2>
                    <p>User yang bisa login hanya yang terpampang diatas</p>
                </div>
            </div>
            <div class="baru">
            <p id="time"></p>
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