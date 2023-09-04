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
mysqli_query($koneksi,"INSERT INTO tdpembayaranangsuran VALUES('$no_angsuran','$no_pinjaman','$angsuranke','$tgl_angsuran','$jumlah_angsuran')");

// mengalihkan halaman kembali ke data_pengajuan_pinjaman.php
header("location:./");

?>