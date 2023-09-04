<?php
// koneksi database
include '../koneksi/koneksi_mysql.php';

// menangkap data yang di kirim dari form
$no_pinjaman = $_POST['no_pinjaman'];
$kd_nasabah = $_POST['kd_nasabah'];
$tgl_pinjaman = $_POST['tgl_pinjaman'];
$pokok_pinjaman = $_POST['pokok_pinjaman'];
$lama_pinjaman = $_POST['lama_pinjaman'];
$total_pinjaman = $_POST['total_pinjaman'];
$bunga = $_POST['bunga'];
$besarnya_pinjaman = $_POST['besarnya_pinjaman'];

// menginput data ke database
mysqli_query($koneksi,"UPDATE tdpinjaman SET kd_nasabah='$kd_nasabah', tgl_pinjaman='$tgl_pinjaman', pokok_pinjaman='$pokok_pinjaman', lama_pinjaman='$lama_pinjaman', total_pinjaman='$total_pinjaman', bunga='$bunga', besarnya_pinjaman='$besarnya_pinjaman' WHERE no_pinjaman='$no_pinjaman'");

// mengalihkan halaman kembali ke data_nasabah.php
header("location:./");

?>