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
                <li><a href="add_data_user.php" id="home">Add Data User</a></li>
                <li><a href="add_data_peminjam.php">Add Data Peminjam</a></li>
                <li><a href="peminjaman_buku.php">Pinjam Buku</a></li>
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
                            <td>Username</td>
                            <td>Password</td>
                            <td>Nama Lengkap</td>
                            <td>Level</td>
                            <td>Edit / Delete</td>
                        </tr>
                    </thead>
                <?php 
                $no=1;
                    $sql=mysqli_query($koneksi,"SELECT * FROM user");
                    while ($ulang=mysqli_fetch_array($sql)) {
                        
                    
                ?>
                    <tbody>
                        <tr>
                            <th class="no"><?php echo $no; ?></th>
                            <th><?php echo $ulang['username'] ?></th>
                            <th><?php echo $ulang['password']?></th>
                            <th><?php echo $ulang['namalengkap']; ?></th>
                            <th><?php echo $ulang['level']; ?></th>
                            <th><a href="edit/edit_user.php?edit=<?php echo $ulang['id_user']; ?>">Edit</a> | 
                            <a href="program/delete_user.php?data=<?php echo $ulang['id_user']; ?> ">Delete</a></th>
                        </tr>
                    </tbody>
                    <?php
                    $no++;
                    }
                    ?>
                </table>
            </div>
            <div class="form">
                <form method="post" action="program/tambah_user.php">
                    <div class="kiri">
                        <div class="box-form">
                            <p>Username<p>
                            <input type="text" name="username" placeholder="Username" >
                        </div>
                        <div class="box-form">
                            <p>password<p>
                            <input type="text" name="password" placeholder="Password" >
                        </div>
                    </div>
                    <div class="kanan">
                        <div class="box-form">
                            <p>Nama Lengkap<p>
                            <input type="text" name="namalengkap" placeholder="Nama Lengkap" >
                        </div>
                        <div class="box-form">
                            <input type="hidden" name="level" value="admin">
                        </div>
                        <br/>
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