<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Aplikasi Administrasi Bumdes Desa Onto">
        <meta name="keywords" content="PHP, CSS, JavaScript">
        <meta name="author" content="Kelompok 1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak Data Pembayaran Angsuran - Bumdes Desa Onto</title>
        <link rel="stylesheet" type="text/css" href="mycssfk.css">
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="stylesheet" type="text/css" href="mycsscolorfk.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif;}
        </style>
    </head>
<body>

<?php
include '../koneksi/koneksi_mysql.php';
include '../format/tgl_indo.php';
include '../format/format_rupiah.php';
?>

    <!-- Index 1-->
    <div class="fk-container">
      <h5>Data Transaksi Pembayaran Angsuran</h5>
      <table class="fk-table-all">
        <tr>
          <th>No. </th>
          <th>Nomor Angsuran</th>
          <th>Nomor Pinjaman</th>
          <th>Angsuran ke</th>
          <th>Tanggal Angsuran</th>
          <th>Jumlah Angsuran</th>
        </tr>
        <?php
        $no = 1;
        $tdpembayaranangsuran = mysqli_query($koneksi, "SELECT * FROM tdpembayaranangsuran");
        while($tdpa = mysqli_fetch_array($tdpembayaranangsuran)){
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $tdpa['no_angsuran']; ?></td>
          <td><?php echo $tdpa['no_pinjaman']; ?></td>
          <td><?php echo $tdpa['angsuranke']; ?></td>
          <td><?php echo tgl_indo($tdpa['tgl_angsuran']); ?></td>
          <td><?php echo rupiah($tdpa['jumlah_angsuran']); ?></td>
        </tr>
        <?php
        }
        ?>
      </table>
  </div>

  <script>
    window.print();
  </script>

</body>
</html>