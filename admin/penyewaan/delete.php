<?php
// koneksi database
include '../koneksi/koneksi_mysql.php';

// menangkap data kd_nasabah yang di kirim dari url
$no_sewa = $_GET['no_sewa'];

// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM tdpenyewaan WHERE no_sewa='$no_sewa'");

// mengalihkan halaman kembali ke data_nasabah.php
header("location:./");

?>