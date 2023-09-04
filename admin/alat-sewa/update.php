<?php
// koneksi database
include '../koneksi/koneksi_mysql.php';

// menangkap data yang di kirim dari form
$id_alat = $_POST['id_alat'];
$nama_alat = $_POST['nama_alat'];
$harga_sewa = $_POST['harga_sewa'];
$keterangan = $_POST['keterangan'];

// menginput data ke database
mysqli_query($koneksi,"UPDATE tdalatsewa SET nama_alat='$nama_alat', harga_sewa='$harga_sewa', keterangan='$keterangan' WHERE id_alat='$id_alat'");

// mengalihkan halaman kembali ke data_nasabah.php
header("location:./");

?>