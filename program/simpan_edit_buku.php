<?php
include 'koneksi.php';
$id_buku=$_POST['id_buku'];
$nama_buku=$_POST['nama_buku'];
$Kode_buku=$_POST['kode_buku'];
$nama_pengarang=$_POST['nama_pengarang'];
$jumlah_buku=$_POST['jumlah_buku'];
$query=mysqli_query($koneksi,"UPDATE buku SET nama_buku='$nama_buku', kode_buku='$kode_buku', nama_pengarang='$nama_pengarang', jumlah_buku='$jumlah_buku' WHERE id_buku='$id_buku'");
if ($query) {
    echo "<script>alert('berhasil terupdate');location.href='../add_data_buku.php'</script>";
}
?>