<?php
include 'koneksi.php';
$data=$_GET['del'];
$query=mysqli_query($koneksi,"DELETE FROM dataproses WHERE id='$data'");
if ($query) {
    echo "<script>alert('berhasil di hapus');location.href='../add_data_peminjam.php'</script>";
}
?>