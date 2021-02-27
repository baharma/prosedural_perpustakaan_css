<?php
include 'koneksi.php';
$id_user=$_POST['id_user'];
$username=$_POST['username'];
$password=$_POST['password'];
$namalengkap=$_POST['namalengkap'];
$level=$_POST['level'];
$query="UPDATE user SET username='$username', password='$password', namalengkap='$namalengkap', level='$level' where id_user='$id_user'";
$data=mysqli_query($koneksi,$query);
if ($data) {
    echo"<script>alert('berhasil terupdate');location.href='../add_data_user.php'</script>";
}
?>