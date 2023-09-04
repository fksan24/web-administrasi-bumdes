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
mysqli_query($koneksi,"UPDATE tdpenyewaan SET kd_nasabah='$kd_nasabah', id_alat='$id_alat', tgl_sewa='$tgl_sewa', lama_sewa='$lama_sewa', harga_sewa='$harga_sewa', total_sewa='$total_sewa' WHERE no_sewa='$no_sewa'");

// mengalihkan halaman kembali ke data_nasabah.php
header("location:./");

?>