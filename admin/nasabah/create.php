<?php
// koneksi database
include '../koneksi/koneksi_mysql.php';

// menangkap data yang di kirim dari form
$kd_nasabah = $_POST['kd_nasabah'];
$nama_nasabah = $_POST['nama_nasabah'];
$tgl_masuk = $_POST['tgl_masuk'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$pendidikan = $_POST['pendidikan'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$pekerjaan = $_POST['pekerjaan'];
$nomor_hp = $_POST['nomor_hp'];

// menginput data ke database
mysqli_query($koneksi,"INSERT INTO tdnasabah VALUES('$kd_nasabah','$nama_nasabah','$tgl_masuk','$tempat_lahir','$tgl_lahir','$pendidikan','$alamat','$jenis_kelamin','$pekerjaan','$nomor_hp')");

// mengalihkan halaman kembali ke data_nasabah.php
header("location:./");

?>