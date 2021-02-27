<?php
session_start();
include 'koneksi.php';
$username =$_POST['username'];
$password =$_POST['password'];
$query=mysqli_query( $koneksi,"SELECT * FROM user where username='$username' and password='$password' ");
$data=mysqli_num_rows($query);
if ($data > 0) {
    $hasil=mysqli_fetch_array($query);
    $username=$hasil['username'];
    $_SESSION['username']=$username;
    echo"<script>alert('login berhasil'); location.href='../home.php'</script>";
}
else{
    echo"<script>alert('gagal login');location.href='../index.php'</script>";
}
?>