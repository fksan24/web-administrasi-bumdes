<?php
// koneksi database
include '../koneksi/koneksi_mysql.php';

// menangkap data kd_nasabah yang di kirim dari url
$id_alat = $_GET['id_alat'];

// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM tdalatsewa WHERE id_alat='$id_alat'");

// mengalihkan halaman kembali ke data_nasabah.php
header("location:./");

?>