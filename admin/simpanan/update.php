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
mysqli_query($koneksi,"UPDATE tdsimpanan SET kd_nasabah='$kd_nasabah', tgl_simpanan='$tgl_simpanan', simpanan_pokok='$simpanan_pokok', simpanan_wajib='$simpanan_wajib', simpanan_lain='$simpanan_lain', jumlah_simpanan='$jumlah_simpanan' WHERE no_simpanan='$no_simpanan'");

// mengalihkan halaman kembali ke data_nasabah.php
header("location:./");

?>