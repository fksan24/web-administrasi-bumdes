<?php
// koneksi database
include '../koneksi/koneksi_mysql.php';

// menangkap data yang di kirim dari form
$no_simpanan = $_POST['no_simpanan'];
$kd_nasabah = $_POST['kd_nasabah'];
$tgl_simpanan = $_POST['tgl_simpanan'];
$simpanan_pokok = $_POST['simpanan_pokok'];
$simpanan_wajib = $_POST['simpanan_wajib'];
$simpanan_lain = $_POST['simpanan_lain'];
$jumlah_simpanan = $_POST['jumlah_simpanan'];

// menginput data ke database
mysqli_query($koneksi,"INSERT INTO tdsimpanan VALUES('$no_simpanan','$kd_nasabah','$tgl_simpanan','$simpanan_pokok','$simpanan_wajib','$simpanan_lain','$jumlah_simpanan')");

// mengalihkan halaman kembali ke data_simpanan.php
header("location:./");

?>