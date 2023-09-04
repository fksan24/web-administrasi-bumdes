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

$query = mysqli_query($koneksi, "SELECT max(no_sewa) as no_sewaTerbesar FROM tdpenyewaan");
$data = mysqli_fetch_array($query);
$noSewa = $data['no_sewaTerbesar'];

$urutan = (int) substr($noSewa, 9, 3);

$urutan++;

$angka = "600";
$huruf = "-ATPY-";
$noSewa = $angka . $huruf . sprintf("%03s", $urutan);
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
            <a href="./edit-penyewaan-alat.php" class="w3-button w3-red">Tidak!</a>
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
        <a href="../pinjaman/" class="w3-bar-item w3-button">Pengajuan Pinjaman</a>
        <a href="../pembayaran-angsuran/" class="w3-bar-item w3-button">Pembayaran Angsuran</a>
        <a href="./" class="w3-bar-item w3-button w3-red">Data Penyewaan Alat</a>
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
    <h5>Data Penyewaan Alat Edit</h5>
    <?php
        include '../koneksi/koneksi_mysql.php';
        $no_sewa = $_GET['no_sewa'];
        $tdpenyewaan = mysqli_query($koneksi, "SELECT * FROM tdpenyewaan WHERE no_sewa='$no_sewa'");
        while($tdpe = mysqli_fetch_array($tdpenyewaan)){
    ?>
    <form method="post" action="update.php">
          <label for="no_sewa">Nomor Sewa :</label>
          <input class="w3-input w3-border" type="text" name="no_sewa" size="12" maxlength="12" required value="<?php echo $tdpe['no_sewa']; ?>" readonly>
          <label for="kd_nasabah">Kode Nasabah :</label>
          <select id="kd_nasabah" name="kd_nasabah" class="w3-input w3-border">
            <option><?php echo $tdpe['kd_nasabah']; ?></option>
            <option value=""></option>
            <option value="">- Pilih Kode Nasabah Lain -</option>
          <?php
          include '../koneksi/koneksi_mysql.php';
          $tdnasabah = mysqli_query($koneksi, "SELECT * FROM tdnasabah");
          while($tdn = mysqli_fetch_array($tdnasabah)){
            echo '<option value="'.$tdn['kd_nasabah'].'">
            '.$tdn['kd_nasabah'].' - '.$tdn['nama_nasabah'].'</option>';
          }
          ?>
        </select>
        <label for="id_alat">Nama Alat :</label>
          <select id="id_alat" name="id_alat" class="w3-input w3-border">
            <option><?php echo $tdpe['id_alat']; ?></option>
            <option value=""></option>
            <option value="">- Pilih Alat Sewa Lain -</option>
          <?php
          include '../koneksi/koneksi_mysql.php';
          $tdalatsewa = mysqli_query($koneksi, "SELECT * FROM tdalatsewa");
          while($tda = mysqli_fetch_array($tdalatsewa)){
            echo '<option value="'.$tda['id_alat'].'">
            '.$tda['id_alat'].' - '.$tda['nama_alat'].'</option>';
          }
          ?>
        </select>
          <label for="tgl_sewa">Tanggal Sewa :</label>
          <input class="w3-input w3-border" type="date" name="tgl_sewa" required value="<?php echo $tdpe['tgl_sewa']; ?>">
        <div class="hitung_sewa">
          <label for="lama_sewa">Lama Sewa :</label>
          <input class="w3-input w3-border" type="number" id="lama_sewa" name="lama_sewa" min="1" max="12" required value="<?php echo $tdpe['lama_sewa']; ?>">
          <label for="harga_sewa">Harga Sewa :</label>
          <input class="w3-input w3-border" type="number" id="harga_sewa" name="harga_sewa" required value="<?php echo $tdpe['harga_sewa']; ?>">
          <label for="total_sewa">Total Sewa Perbulan :</label>
          <input class="w3-input w3-border" type="number" id="total_sewa" name="total_sewa" required value="<?php echo $tdpe['total_sewa']; ?>">
        </div>
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
              <a href="./edit-penyewaan-alat.php" class="w3-button w3-red">Tidak!</a>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
  $(".hitung_sewa").keyup(function(){
    var lama_sewa = parseInt($("#lama_sewa").val())
    var harga_sewa = parseInt($("#harga_sewa").val())

    var total_sewa = harga_sewa / lama_sewa;
    $("#total_sewa").attr("value",total_sewa)
  });
</script>