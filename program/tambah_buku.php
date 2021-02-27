<?php
include 'koneksi.php';
$nama_buku=$_POST['nama_buku'];
$Kode_buku=$_POST['Kode_buku'];
$nama_pengarang=$_POST['nama_pengarang'];
$jumlah_buku=$_POST['jumlah_buku'];
$query=mysqli_query($koneksi,"INSERT INTO buku VALUE(null,'$nama_buku','$Kode_buku','$nama_buku','$jumlah_buku')");
if ($query) {
    echo "<script>alert('berhasil tersimpan');location.href='../add_data_buku.php'</script>";
}
?>