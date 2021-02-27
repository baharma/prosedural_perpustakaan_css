<?php
include 'koneksi.php';
$data=$_GET['data'];
$query=mysqli_query($koneksi,"DELETE from user WHERE id_user='$data'");
if ($query) {
    echo "<script>alert('berhasil Delete');location.href='../add_data_user.php'</script>";
}
?>