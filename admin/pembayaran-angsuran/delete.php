<?php
// koneksi database
include '../koneksi/koneksi_mysql.php';

// menangkap data kd_nasabah yang di kirim dari url
$no_angsuran = $_GET['no_angsuran'];

// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM tdpembayaranangsuran WHERE no_angsuran='$no_angsuran'");

// mengalihkan halaman kembali ke data_nasabah.php
header("location:./");

?>