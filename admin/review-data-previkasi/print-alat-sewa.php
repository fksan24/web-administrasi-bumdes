<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Aplikasi Administrasi Bumdes Desa Onto">
        <meta name="keywords" content="PHP, CSS, JavaScript">
        <meta name="author" content="Kelompok 1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak Data Alat Sewa - Bumdes Desa Onto</title>
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
      <h5>Data Informasi Nasabah</h5>
      <table class="fk-table-all">
        <tr>
            <th>No. </th>
            <th>Nama Alat</th>
            <th>Harga Sewa</th>
            <th>Keterangan</th>
        </tr>
        <?php
        $no = 1;
        $tdalatsewa = mysqli_query($koneksi, "SELECT * FROM tdalatsewa");
        while($tda = mysqli_fetch_array($tdalatsewa)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $tda['nama_alat']; ?></td>
            <td><?php echo rupiah($tda['harga_sewa']); ?></td>
            <td><?php echo $tda['keterangan']; ?></td>
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