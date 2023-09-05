<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Aplikasi Administrasi Bumdes Desa Onto">
        <meta name="keywords" content="PHP, CSS, JavaScript">
        <meta name="author" content="Kelompok 1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak Data Simpanan - Bumdes Desa Onto</title>
        <link rel="stylesheet" type="text/css" href="../frontend/css/w3.css">
        <link rel="stylesheet" type="text/css" href="../frontend/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="../frontend/css/w3color.css">
        <link rel="icon" type="image/x-icon" href="../frontend/img/icon-app.png">
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
    <div class="w3-container">
      <h5>Data Transaksi Simpanan</h5>
      <table class="w3-table-all">
        <tr>
          <th>No. </th>
          <th>Nomor Simpanan</th>
          <th>Kode Nasabah</th>
          <th>Tanggal Simpanan</th>
          <th>Simpanan Pokok</th>
          <th>Simpanan Wajib</th>
          <th>Simpanan Lain</th>
          <th>Jumlah Simpanan</th>
        </tr>
        <?php
        $no = 1;
        $tdsimpanan = mysqli_query($koneksi, "SELECT * FROM tdsimpanan");
        while($tds = mysqli_fetch_array($tdsimpanan)){
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $tds['no_simpanan']; ?></td>
          <td><?php echo $tds['kd_nasabah']; ?></td>
          <td><?php echo tgl_indo($tds['tgl_simpanan']); ?></td>
          <td><?php echo rupiah($tds['simpanan_pokok']); ?></td>
          <td><?php echo rupiah($tds['simpanan_wajib']); ?></td>
          <td><?php echo rupiah($tds['simpanan_lain']); ?></td>
          <td><?php echo rupiah($tds['jumlah_simpanan']); ?></td>
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