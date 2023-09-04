<?php
// koneksi database
include '../koneksi/koneksi_mysql.php';

// menangkap data yang di kirim dari form
$nama_alat = $_POST['nama_alat'];
$harga_sewa = $_POST['harga_sewa'];
$keterangan = $_POST['keterangan'];

// menginput data ke database
mysqli_query($koneksi,"INSERT INTO tdalatsewa VALUES('','$nama_alat','$harga_sewa','$keterangan')");

// mengalihkan halaman kembali ke data_nasabah.php
header("location:./");

?>