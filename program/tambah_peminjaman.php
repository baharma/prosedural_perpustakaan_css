<?php
include 'koneksi.php';
$nama_buku=$_POST['nama_buku'];
$namapeminjam=$_POST['namapeminjam'];
$jumlah_pinjam=$_POST['jumlah_pinjam'];
$status=$_POST['status'];
$tanggang_pinjam=$_POST['tanggang_pinjam'];
$tanggal_kembali=$_POST['tanggal_kembali'];
$query=mysqli_query($koneksi,"INSERT INTO dataproses value(null,'$nama_buku','$namapeminjam','$jumlah_pinjam','$status','$tanggang_pinjam','$tanggal_kembali')");
if ($query) {
    echo"<script>alert('berhasil join');location.href='../add_data_peminjam.php';</script>";
}else{
    echo"<script>alert('gagal');location.href='../add_data_peminjam.php';</script>";
}
?>