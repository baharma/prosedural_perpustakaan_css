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
                <li class=""><a href="home.php" >Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="add_data_buku.php" >Add Data Buku</a></li>
                <li><a href="add_data_user.php">Add Data User</a></li>
                <li><a href="add_data_peminjam.php" id="home">Add Data Peminjam</a></li>
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
        </div> <div class="content">
            <div class="table-content">
                <table class="table">
                    <thead class="table-head">
                        <tr class="bottom">
                            <td>No</td>
                            <td>Nama Buku</td>
                            <td>Nama Peminjam</td>
                            <td>Jumlah Buku</td>
                            <td>Status</td>
                            <td>Tanggal Pinjam</td>
                            <td>Tanggal Kembali</td>
                            <td>Edit | Delete</td>
                        </tr>
                    </thead>
                <?php 
                $no=1;
                    $sql=mysqli_query($koneksi,"SELECT * FROM dataproses");
                    while ($ulang=mysqli_fetch_array($sql)) {
                        
                    
                ?>
                    <tbody>
                        <tr>
                            <th class="no"><?php echo $no; ?></th>
                            <th><?php echo $ulang['nama_buku'] ?></th>
                            <th><?php echo $ulang['namapeminjam']?></th>
                            <th><?php echo $ulang['jumlah_pinjam']; ?></th>
                            <th><?php echo $ulang['status']; ?></th>
                            <th><?php echo $ulang['tanggang_pinjam']; ?></th>
                            <th><?php echo $ulang['tanggal_kembali']; ?></th>
                            <th><a href="edit/edit_peminjaman.php?data=<?php echo $ulang['id']; ?>" >Edit</a> | <a href="program/delete_peminjam.php?del=<?php echo $ulang['id']; ?>">Delete</a></th>
                        </tr>
                    </tbody>
                    <?php
                    $no++;
                    }
                    ?>
                </table>
            </div>
            <div class="form">
                <form method="post" action="program/tambah_peminjaman.php">
                    <div class="kiri">
                        <div class="box-form">
                            <p>Nama Buku<p>
                            <select name="nama_buku" class="select">
                                <?php
                                $result =mysqli_query($koneksi,"SELECT * FROM buku");
                                while($row=mysqli_fetch_array($result)){
                                    echo'<option value="'.$row['nama_buku'].'">'.$row['nama_buku'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="box-form">
                            <p>Nama Peminjam<p>
                            <input type="text" name="namapeminjam" placeholder="Nama Peminjam" >
                        </div>
                            <div class="box-form">
                            <p>Jumlah Pinjam<p>
                            <select class="select" name="jumlah_pinjam">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>
                    </div>
                    <div class="kanan">
                        <div class="box-form">
                            <input type="hidden" name="status" placeholder="Status" value="Belum">
                        </div>
                            <div class="box-form">
                            <p>Tanggal Pinjam<p>
                            <input type="text" name="tanggang_pinjam" placeholder="Tanggal Pinjam"  value="<?php echo date('Y-m-d'); ?>">
                        </div>
                            <div class="box-form">
                            <input type="hidden" name="tanggal_kembali" placeholder="Tanggal Kembali"  value="0">
                        </div>
                        <input type="submit" name="submit" value="Simpan" />
                    </div>

                </form>
            </div>
        </div>
    </section>
    <footer>
        <p>Intagram: @aditya.baharma.1899<p>
    </footer>
</body>
</html>
<?php
}
else{
    echo "<script>alert('perhatikan masuk login dahulu');location.href='index.php';</script>";
}
?>