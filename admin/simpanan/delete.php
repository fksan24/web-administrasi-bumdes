<?php
// koneksi database
include '../koneksi/koneksi_mysql.php';

// menangkap data kd_nasabah yang di kirim dari url
$no_simpanan = $_GET['no_simpanan'];

// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM tdsimpanan WHERE no_simpanan='$no_simpanan'");

// mengalihkan halaman kembali ke data_nasabah.php
header("location:./");

?>