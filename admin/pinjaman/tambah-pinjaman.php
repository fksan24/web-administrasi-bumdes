<?php include '../header.php' ?>
<body class="w3-light-grey">
<!-- Cek apakah sudah login -->
<?php
session_start();
if($_SESSION['jabatan']==""){
  header("location:/webapladministrasibumdes/login/?pesan=belum_login");
}
?>
<!-- Kode Otomatis no_pimpanan -->
<?php
include '../koneksi/koneksi_mysql.php';

$query = mysqli_query($koneksi, "SELECT max(no_pinjaman) as no_pinjamanTerbesar FROM tdpinjaman");
$data = mysqli_fetch_array($query);
$noPinjaman = $data['no_pinjamanTerbesar'];

$urutan = (int) substr($noPinjaman, 7, 3);

$urutan++;

$angka = "705";
$huruf = "-PJ-";
$noPinjaman = $angka . $huruf . sprintf("%03s", $urutan);
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
            <a href="./" class="w3-button w3-red">Tidak!</a>
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
    <div class="w3-bar-item w3-button" onclick="myAccFunc()"><i class="fa fa-address-book fa-fw"></i>  Inputan Data Informasi <i class="fa fa-caret-down"></i></div>
    <div id="demoAcc" class="w3-hide w3-white w3-card-4">
      <a href="../nasabah/" class="w3-bar-item w3-button">Nasabah</a>
      <a href="../alat-sewa/" class="w3-bar-item w3-button">Alat Sewa</a>
    </div>
    <a href="../review-data-previkasi/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-check-circle fa-fw"></i>  Review Data & Previkasi</a>
    <div class="w3-bar-item w3-button w3-red" onclick="myAccFunc0()"><i class="fa fa-book fa-fw""></i>  Inputan Data Transaksi <i class="fa fa-caret-down"></i></div>
    <div id="demoAcc0" class="w3-hide w3-white w3-card-4">
        <a href="../simpanan/" class="w3-bar-item w3-button">Data Simpanan</a>
        <a href="../pinjaman/" class="w3-bar-item w3-button w3-red">Pengajuan Pinjaman</a>
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
    <h4><b><i class="fa fa-book"></i> Inputan Data Transaksi</b></h4>
    <a href="./" class="w3-button w3-red">Kembali</a>
  </header>

  <!-- Index -->
  <div class="w3-container">
    <h5>Data Pengajuan Pinjaman Baru</h5>
    <form method="post" action="create.php">
        <label for="no_pinjaman">Nomor Pinjaman :</label>
        <input class="w3-input w3-border" type="text" size="10" maxlength="10" name="no_pinjaman" required value="<?php echo $noPinjaman ?>" readonly>
        <label for="kd_nasabah">Kode Nasabah :</label>
        <select id="kd_nasabah" name="kd_nasabah" class="w3-input w3-border">
          <option value="">Pilih Nasabah:</option>
          <?php
          include '../koneksi/koneksi_mysql.php';
          $tdnasabah = mysqli_query($koneksi, "SELECT * FROM tdnasabah");
          while($tdn = mysqli_fetch_array($tdnasabah)){
            echo '<option value="'.$tdn['kd_nasabah'].'">
            '.$tdn['kd_nasabah'].'</option>';
          }
          ?>
        </select>
        <label for="tgl_pinjaman">Tanggal Pinjaman :</label>
        <input class="w3-input w3-border" type="date" name="tgl_pinjaman" required>
        <div class="hitung_pinjaman">
          <label for="pokok_pinjaman">Pokok Pinjaman :</label>
          <input class="w3-input w3-border" type="number" id="pokok_pinjaman" name="pokok_pinjaman" required>
          <label for="lama_pinjaman">Lama Pinjaman :</label>
          <input class="w3-input w3-border" type="number" id="lama_pinjaman" name="lama_pinjaman" min="1" max="12" required>
          <label for="total_pinjaman">Total Pinjaman :</label>
          <input class="w3-input w3-border" type="number" id="total_pinjaman" name="total_pinjaman" required readonly>
          <label for="bunga">Bunga% :</label>
          <input class="w3-input w3-border" type="number" id="bunga" name="bunga" min="1" max="100" required>
          <input type="hidden" id="bunga_pertahun" readonly>
          <input type="hidden" id="bunga_perbulan" readonly>
          <label for="besarnya_pinjaman">Besarnya Pinjaman :</label>
          <input class="w3-input w3-border" type="number" type="number" id="besarnya_pinjaman" name="besarnya_pinjaman" required>
        </div>
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
              <a href="tambah-pinjaman.php" class="w3-button w3-red">Tidak!</a>
            </div>
          </div>
        </div>
        <button type="reset" class="w3-button w3-red">Hapus -</button>
    </form>
  </div>
  <hr>
<?php include '../footer.php' ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
  $(".hitung_pinjaman").keyup(function(){
    var pokok_pinjaman = parseInt($("#pokok_pinjaman").val())
    var lama_pinjaman = parseInt($("#lama_pinjaman").val())

    var total_pinjaman = pokok_pinjaman / lama_pinjaman;
    $("#total_pinjaman").attr("value",total_pinjaman)

    var bunga = parseInt($("#bunga").val())

    var bunga_pertahun = (bunga/100) * pokok_pinjaman;
    $("#bunga_pertahun").attr("value",bunga_pertahun)
    var bunga_perbulan = bunga_pertahun / lama_pinjaman;
    $("#bunga_perbulan").attr("value",bunga_perbulan)

    var besarnya_pinjaman = total_pinjaman + bunga_perbulan;
    $("#besarnya_pinjaman").attr("value",besarnya_pinjaman)
  });
</script>