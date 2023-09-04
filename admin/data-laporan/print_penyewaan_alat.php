<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Aplikasi Administrasi Bumdes Desa Onto">
        <meta name="keywords" content="PHP, CSS, JavaScript">
        <meta name="author" content="Kelompok 1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak Data Penyewaan Alat - Bumdes Desa Onto</title>
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
      <h5>Data Transaksi Penyewaan Alat</h5>
      <table class="fk-table-all">
        <tr>
          <th>No. </th>
          <th>Nomor Sewa</th>
          <th>Kode Nasabah</th>
          <th>Alat Sewa</th>
          <th>Tanggal Sewa</th>
          <th>Lama Sewa</th>
          <th>Harga Sewa</th>
          <th>Total Sewa Perbulan</th>
        </tr>
        <?php
        $no = 1;
        $tdpenyewaan = mysqli_query($koneksi, "SELECT * FROM tdpenyewaan");
        while($tdpe = mysqli_fetch_array($tdpenyewaan)){
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $tdpe['no_sewa']; ?></td>
          <td><?php echo $tdpe['kd_nasabah']; ?></td>
          <td><?php echo $tdpe['id_alat']; ?></td>
          <td><?php echo tgl_indo($tdpe['tgl_sewa']); ?></td>
          <td><?php echo $tdpe['lama_sewa']; ?></td>
          <td><?php echo rupiah($tdpe['harga_sewa']); ?></td>
          <td><?php echo rupiah($tdpe['total_sewa']); ?></td>
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