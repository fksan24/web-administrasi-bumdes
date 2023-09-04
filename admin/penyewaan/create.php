<?php
// koneksi database
include '../koneksi/koneksi_mysql.php';

// menangkap data yang di kirim dari form
$no_sewa = $_POST['no_sewa'];
$kd_nasabah = $_POST['kd_nasabah'];
$id_alat = $_POST['id_alat'];
$tgl_sewa = $_POST['tgl_sewa'];
$lama_sewa = $_POST['lama_sewa'];
$harga_sewa = $_POST['harga_sewa'];
$total_sewa = $_POST['total_sewa'];

// menginput data ke database
mysqli_query($koneksi,"INSERT INTO tdpenyewaan VALUES('$no_sewa','$kd_nasabah','$id_alat','$tgl_sewa','$lama_sewa','$harga_sewa','$total_sewa')");

// mengalihkan halaman kembali ke data_pengajuan_pinjaman.php
header("location:./");

?>