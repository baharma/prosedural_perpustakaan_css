<?php
include 'koneksi.php';
$id=$_POST['id'];
$nama_buku=$_POST['nama_buku'];
$namapeminjam=$_POST['namapeminjam'];
$jumlah_pinjam=$_POST['jumlah_pinjam'];
$status=$_POST['status'];
$tanggang_pinjam=$_POST['tanggang_pinjam'];
$tanggal_kembali=$_POST['tanggal_kembali'];
$query=mysqli_query($koneksi,"UPDATE dataproses SET nama_buku='$nama_buku', namapeminjam='$namapeminjam', jumlah_pinjam='$jumlah_pinjam', status='$status', tanggang_pinjam='$tanggang_pinjam', tanggal_kembali='$tanggal_kembali' WHERE id='$id'");
if ($query) {
    echo"<script>alert('berhasil di simpan');location.href='../add_data_peminjam.php'</script>";
}
?>