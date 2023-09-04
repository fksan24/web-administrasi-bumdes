<?php include '../header.php' ?>
<body class="w3-light-grey">
<!-- Cek apakah sudah login -->
<?php
session_start();
if($_SESSION['jabatan']==""){
  header("location:/webapladministrasibumdes/login/?pesan=belum_login");
}
?>
  
<!-- Container Atas -->
<div class="w3-bar w3-top w3-red w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> Menu</button>
    <span class="w3-bar-item w3-right">Aplikasi Administrasi Bumdes Desa Onto</span>
</div>
  
<!-- Menu/Sidebar -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="../frontend/img/logo_bumdes_desa_onto.png" class="w3-margin-right" style="width:60px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Selamat Datang, <strong><?php echo $_SESSION['nip']; ?> sebagai <?php echo $_SESSION['jabatan']; ?></strong></span><br>
      <a href="dashboard.php/#kontak_pesan" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="dashboard.php/#profil_admin" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <!-- Modal Log-out/Keluar -->
      <button onclick="document.getElementById('id00').style.display='block'" class="w3-button"><i class="fa fa-sign-out"></i></button>
      <div id="id00" class="w3-modal">
        <div class="w3-modal-content w3-card-4">
          <header class="w3-container w3-red">
            <span onclick="document.getElementById('id00').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <h2>Peringatan!</h2>
          </header>
          <div class="w3-container">
            <p>Apakah Anda ingin keluar?</p>
            <a href="/webapladministrasibumdes/login/logout.php" class="w3-button w3-red">Ya!</a>
            <a href="./edit-alat-sewa.php" class="w3-button w3-red">Tidak!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Menu :</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Tutup Menu</a>
    <a href="../" class="w3-bar-item w3-button w3-padding"><i class="fa fa-dashboard fa-fw"></i>  Dashboard</a>
    <div class="w3-bar-item w3-button w3-red" onclick="myAccFunc()"><i class="fa fa-address-book fa-fw"></i>  Inputan Data Informasi <i class="fa fa-caret-down"></i></div>
    <div id="demoAcc" class="w3-hide w3-white w3-card-4">
      <a href="../nasabah/" class="w3-bar-item w3-button">Nasabah</a>
      <a href="../alat-sewa/" class="w3-bar-item w3-button w3-red">Alat Sewa</a>
    </div>
    <a href="../review-data-previkasi/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-check-circle fa-fw"></i>  Review Data & Previkasi</a>
    <div class="w3-bar-item w3-button" onclick="myAccFunc0()"><i class="fa fa-book fa-fw""></i>  Inputan Data Transaksi <i class="fa fa-caret-down"></i></div>
    <div id="demoAcc0" class="w3-hide w3-white w3-card-4">
      <a href="../simpanan/" class="w3-bar-item w3-button">Data Simpanan</a>
      <a href="../pinjaman/" class="w3-bar-item w3-button">Pengajuan Pinjaman</a>
      <a href="../pembayaran-angsuran/" class="w3-bar-item w3-button">Pembayaran Angsuran</a>
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
    <h4><b><i class="fa fa-address-book"></i> Inputan Data Informasi</b></h4>
    <a href="./" class="w3-button w3-red">Kembali</a>
  </header>

  <!-- Index -->
  <div class="w3-container">
    <h5>Data Alat Sewa Edit</h5>
    <?php
        include '../koneksi/koneksi_mysql.php';
        $id_alat = $_GET['id_alat'];
        $tdalatsewa = mysqli_query($koneksi, "SELECT * FROM tdalatsewa WHERE id_alat='$id_alat'");
        while($tda = mysqli_fetch_array($tdalatsewa)){
          ?>
    <form method="post" action="update.php">
        <input type="hidden" name="id_alat" value="<?php echo $tda['id_alat']; ?>">
        <label for="nama_alat">Nama Alat</label>
        <input class="w3-input w3-border" name="nama_alat" type="text" size="50" required value="<?php echo $tda['nama_alat']; ?>">
        <label for="harga_sewa">Harga Sewa</label>
        <input class="w3-input w3-border" name="harga_sewa" type="number" required value="<?php echo $tda['harga_sewa']; ?>">  <br> 
        <label for="-">Keterangan</label>
        <textarea class="w3-textarea w3-border" name="keterangan" style="height:200px"><?php echo $tda['keterangan']; ?></textarea><br>
        <span onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-red">Simpan</span>
        <div id="id01" class="w3-modal">
          <div class="w3-modal-content w3-card-4">
            <header class="w3-container w3-red">
              <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
              <h2>Peringatan!</h2>
            </header>
            <div class="w3-container">
              <p>Yakin data Anda sudah benar?</p>
              <input type="submit" class="w3-button w3-red" value="Ya!">
              <a href="./edit-alat-sewa.php" class="w3-button w3-red">Tidak!</a>
            </div>
          </div>
        </div>
        <button type="reset" class="w3-button w3-red">Hapus -</button>
    </form>
    <?php
    }
    ?>
  </div>
  <hr>
<?php include '../footer.php' ?>