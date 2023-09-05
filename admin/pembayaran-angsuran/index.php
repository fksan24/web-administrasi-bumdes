<?php include '../header.php' ?>
  <hr>
  <div class="w3-container">
    <h5>Menu :</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Tutup Menu</a>
    <a href="../" class="w3-bar-item w3-button w3-padding"><i class="fa fa-dashboard fa-fw"></i>  Dashboard</a>
    <div class="w3-bar-item w3-button" onclick="myAccFunc()"><i class="fa fa-address-book fa-fw"></i>  Inputan Data Informasi <i class="fa fa-caret-down"></i></div>
    <div id="demoAcc" class="w3-hide w3-white w3-card-4">
      <a href="../nasabah/" class="w3-bar-item w3-button">Nasabah</a>
      <a href="../alat-sewa/" class="w3-bar-item w3-button">Alat Sewa</a>
    </div>
    <a href="../review-data-previkasi/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-check-circle fa-fw"></i>  Review Data & Previkasi</a>
    <div class="w3-bar-item w3-button w3-red" onclick="myAccFunc0()"><i class="fa fa-book fa-fw""></i>  Inputan Data Transaksi <i class="fa fa-caret-down"></i></div>
    <div id="demoAcc0" class="w3-hide w3-white w3-card-4">
        <a href="../simpanan/" class="w3-bar-item w3-button">Data Simpanan</a>
        <a href="../pinjaman/" class="w3-bar-item w3-button">Pengajuan Pinjaman</a>
        <a href="../pembayaran-angsuran/" class="w3-bar-item w3-button w3-red">Pembayaran Angsuran</a>
        <a href="../penyewaan/" class="w3-bar-item w3-button">Data Penyewaan Alat</a>
    </div>
    <a href="../data-laporan/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-align-left fa-fw"></i>  Data Laporan</a>
  </div>
</nav>
  
<!-- Efek Overlay ketika membuka sidebar di layar kecil -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
  
<!-- !Konten Page! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h4><b><i class="fa fa-book"></i> Inputan Data Transaksi</b></h4>
  </header>

  <!-- Index -->
  <div class="w3-container">
    <div class="w3-responsive">
      <h5>Data Pembayaran Angsuran</h5>
      <a href="tambah-pembayaran-angsuran.php" class="w3-button w3-red">Tambah +</a>
      <table class="w3-table-all">
        <tr>
          <th>No. </th>
          <th>Nomor Angsuran</th>
          <th>Nomor Pinjaman</th>
          <th>Angsuran ke</th>
          <th>Tanggal Angsuran</th>
          <th>Jumlah Angsuran</th>
          <th>Opsi</th>
        </tr>
        <?php
        include '../koneksi/koneksi_mysql.php';
        include '../format/format_rupiah.php';
        include '../format/tgl_indo.php';
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
          <td>
            <a href="edit-pembayaran-angsuran.php?no_angsuran=<?php echo $tdpa['no_angsuran']; ?>" class="w3-button w3-red">Edit</a>
            <a href="delete.php?no_angsuran=<?php echo $tdpa['no_angsuran']; ?>" class="w3-button w3-red">Hapus!</a>
          </td>
        </tr>
        <?php
        }
        ?>
      </table>
    </div>
  </div>
  <hr>
<?php include '../footer.php' ?>