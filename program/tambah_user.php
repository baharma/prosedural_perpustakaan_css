<?php
include 'koneksi.php';
$username=$_POST['username'];
$password=$_POST['password'];
$namalengkap=$_POST['namalengkap'];
$level=$_POST['level'];

$query=mysqli_query($koneksi,"INSERT INTO user value(null,'$username','$password','$namalengkap','$level')");
if ($query) {
    echo "<script>alert('berhasil di buat');location.href='../add_data_user.php'</script>";
}
?>