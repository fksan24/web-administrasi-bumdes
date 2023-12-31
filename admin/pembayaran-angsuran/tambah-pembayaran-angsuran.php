<?php include '../header.php' ?>
<!-- Kode Otomatis no_pimpanan -->
<?php
include '../koneksi/koneksi_mysql.php';

$query = mysqli_query($koneksi, "SELECT max(no_angsuran) as no_angsuranTerbesar FROM tdpembayaranangsuran");
$data = mysqli_fetch_array($query);
$noAngsuran = $data['no_angsuranTerbesar'];

$urutan = (int) substr($noAngsuran, 10, 3);

$urutan++;

$angka = "4073";
$huruf = "-PBAG-";
$noAngsuran = $angka . $huruf . sprintf("%03s", $urutan);
?>
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
    <a href="./" class="w3-button w3-red">Kembali</a>
  </header>

  <!-- Index -->
  <div class="w3-container">
    <h5>Data Pembayaran Angsuran Baru</h5>
    <form method="post" action="create.php">
        <label for="no_angsuran">Nomor Angsuran :</label>
        <input class="w3-input w3-border" type="text" name="no_angsuran" size="13" maxlength="13" required value="<?php echo $noAngsuran ?>" readonly>
        <label for="no_pinjaman">Nomor Pinjaman :</label>
        <select id="no_pinjaman" name="no_pinjaman" class="w3-input w3-border">
          <option value="">Pilih Nomor Pinjaman Nasabah:</option>
          <?php
          include '../koneksi/koneksi_mysql.php';
          $tdpinjaman = mysqli_query($koneksi, "SELECT * FROM tdpinjaman");
          while($tdp = mysqli_fetch_array($tdpinjaman)){
            echo '<option value="'.$tdp['no_pinjaman'].'">
            '.$tdp['no_pinjaman'].'</option>';
          }
          ?>
        </select>
        <label for="angsuranke">Angsuran ke :</label>
        <input class="w3-input w3-border" type="number" name="angsuranke" min="1" max="12" required>
        <label for="tgl_angsuran">Tanggal Angsuran :</label>
        <input class="w3-input w3-border" type="date" name="tgl_angsuran" required>
        <label for="jumlah_angsuran">Jumlah Angsuran :</label>
        <input class="w3-input w3-border" type="number" name="jumlah_angsuran" required>
        <span onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-red">Tambahkan +</span>
        <div id="id01" class="w3-modal">
          <div class="w3-modal-content w3-card-4">
            <header class="w3-container w3-red">
              <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
              <h2>Peringatan!</h2>
            </header>
            <div class="w3-container">
              <p>Apakah Anda ingin menambahkan?</p>
              <input type="submit" class="w3-button w3-red" value="Ya!">
              <a href="./tambah-pembayaran-angsuran.php" class="w3-button w3-red">Tidak!</a>
            </div>
          </div>
        </div>
        <button type="reset" class="w3-button w3-red">Hapus -</button>
    </form>
  </div>
  <hr>
<?php include '../footer.php' ?>