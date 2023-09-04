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
mysqli_query($koneksi,"INSERT INTO tdpinjaman VALUES('$no_pinjaman','$kd_nasabah','$tgl_pinjaman','$pokok_pinjaman','$lama_pinjaman','$total_pinjaman','$bunga','$besarnya_pinjaman')");

// mengalihkan halaman kembali ke data_pengajuan_pinjaman.php
header("location:./");

?>