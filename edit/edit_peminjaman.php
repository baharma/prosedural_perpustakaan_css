<?php
    include '../program/koneksi.php';
session_start();
if (isset($_SESSION['username'])) {
    $edit=$_GET['data'];
            $sql=mysqli_query($koneksi,"SELECT * FROM dataproses WHERE id='$edit'");
            $fatt=mysqli_fetch_array($sql);
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/layout.css?v=1.1" type="text/css">
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
                <form method="POST" action="../program/simpan_edit_peminjaman.php">
                    <div class="kiri">
                        <div class="box-form">
                            <p>Nama Buku<p>
                            <input type="hidden" name="id" placeholder="" value="<?php echo $fatt['id']; ?>">
                            <select class="select" name="nama_buku">
                                <option><?php echo $fatt['nama_buku']; ?></option>
                                <?php
                                $data1=mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku");
                                while ($data2= mysqli_fetch_array($data1)) {
                                ?>
                                    <option><?php echo $data2['nama_buku'];  }?></option>
                            </select>
                        </div>
                        <div class="box-form">
                            <p>Nama Peminjam<p>
                            <input type="text" name="namapeminjam" placeholder="Password"  value="<?php echo $fatt['namapeminjam']; ?>">
                        </div>
                        <div class="box-form">
                            <p>Jumlah pinjam<p>
                            <input type="text" name="jumlah_pinjam" placeholder="Password"  value="<?php echo $fatt['jumlah_pinjam']; ?>">
                        </div>
                    </div>
                    <div class="kanan">
                        <div class="box-form">
                            <p>status<p>
                            <select name="status" class="select">
                                <option><?php echo $fatt['status']?></option>
                                <option>Belum</option>
                                <option>Kembali</option>
                            </select>
                        </div>
                        <div class="box-form">
                            <p>tanggal pinjam<p>
                            <input type="text" name="tanggang_pinjam" placeholder="Password"  value="<?php echo $fatt['tanggang_pinjam']; ?>">
                        </div>
                        <div class="box-form">
                            <p>tanggal pengembalian<p>
                            <input type="text" name="tanggal_kembali" placeholder="Password"  value="<?php echo $fatt['tanggal_kembali']; ?>">
                        </div>
                        <br/>
                        <input type="submit" name="submit" value="Simpan" />
                    </div>
                </form>
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