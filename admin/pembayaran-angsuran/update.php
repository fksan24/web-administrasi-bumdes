<?php
// koneksi database
include '../koneksi/koneksi_mysql.php';

// menangkap data yang di kirim dari form
$no_angsuran = $_POST['no_angsuran'];
$no_pinjaman = $_POST['no_pinjaman'];
$angsuranke = $_POST['angsuranke'];
$tgl_angsuran = $_POST['tgl_angsuran'];
$jumlah_angsuran = $_POST['jumlah_angsuran'];

// menginput data ke database
mysqli_query($koneksi,"UPDATE tdpembayaranangsuran SET no_pinjaman='$no_pinjaman', angsuranke='$angsuranke', tgl_angsuran='$tgl_angsuran', jumlah_angsuran='$jumlah_angsuran' WHERE no_angsuran='$no_angsuran'");

// mengalihkan halaman kembali ke data_nasabah.php
header("location:./");

?>