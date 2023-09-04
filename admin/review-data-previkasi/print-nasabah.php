<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Aplikasi Administrasi Bumdes Desa Onto">
        <meta name="keywords" content="PHP, CSS, JavaScript">
        <meta name="author" content="Kelompok 1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak Data Nasabah - Bumdes Desa Onto</title>
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
          <th>Kode Nasabah</th>
          <th>Nama</th>
          <th>Tanggal Masuk</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Pendidikan</th>
          <th>Alamat</th>
          <th>Jenis Kelamin</th>
          <th>Pekerjaan</th>
          <th>Nomor HP</th>
        </tr>
        <?php
        $no = 1;
        $tdnasabah = mysqli_query($koneksi, "SELECT * FROM tdnasabah");
        while($tdn = mysqli_fetch_array($tdnasabah)){
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $tdn['kd_nasabah']; ?></td>
          <td><?php echo $tdn['nama_nasabah']; ?></td>
          <td><?php echo tgl_indo($tdn['tgl_masuk']); ?></td>
          <td><?php echo $tdn['tempat_lahir']; ?></td>
          <td><?php echo tgl_indo($tdn['tgl_lahir']); ?></td>
          <td><?php echo $tdn['pendidikan']; ?></td>
          <td><?php echo $tdn['alamat']; ?></td>
          <td><?php echo $tdn['jenis_kelamin']; ?></td>
          <td><?php echo $tdn['pekerjaan']; ?></td>
          <td><?php echo $tdn['nomor_hp']; ?></td>
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