<?php
// koneksi database
include '../koneksi/koneksi_mysql.php';

// menangkap data kd_nasabah yang di kirim dari url
$kd_nasabah = $_GET['kd_nasabah'];

// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM tdnasabah WHERE kd_nasabah='$kd_nasabah'");

// mengalihkan halaman kembali ke data_nasabah.php
header("location:./");

?>