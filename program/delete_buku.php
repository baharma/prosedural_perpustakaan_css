<?php
include 'koneksi.php';
$data=$_GET['data'];
$query=mysqli_query($koneksi,"DELETE from buku WHERE id_buku='$data'");
if ($query) {
    echo "<script>alert('berhasil Delete');location.href='../add_data_buku.php'</script>";
}
?>