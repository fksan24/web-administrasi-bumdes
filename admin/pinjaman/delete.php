<?php
// koneksi database
include '../koneksi/koneksi_mysql.php';

// menangkap data kd_nasabah yang di kirim dari url
$no_pinjaman = $_GET['no_pinjaman'];

// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM tdpinjaman WHERE no_pinjaman='$no_pinjaman'");

// mengalihkan halaman kembali ke data_nasabah.php
header("location:./");

?>