<?php include '../header.php' ?>
<body class="w3-light-grey">
<!-- Cek apakah sudah login -->
<?php
session_start();
if($_SESSION['jabatan']==""){
  header("location:../login/?pesan=belum_login");
}
?>

<?php
//menghubungkan dengan koneksi database
include '../koneksi/koneksi_mysql.php';

//mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(kd_nasabah) as kd_nasabahTerbesar FROM tdnasabah");
$data = mysqli_fetch_array($query);
$kodeNasabah = $data['kd_nasabahTerbesar'];

//mengambil angka dari kode nasabah terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan int
$urutan = (int) substr($kodeNasabah, 7, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode nasabah baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya 120
$angka = "12";
$huruf = "-NSB-";
$kodeNasabah = $angka . $huruf . sprintf("%03s", $urutan);
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
      <a href="./#kontak_pesan" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="./#profil_admin" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
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
    <div class="w3-bar-item w3-button w3-red" onclick="myAccFunc()"><i class="fa fa-address-book fa-fw"></i>  Inputan Data Informasi <i class="fa fa-caret-down"></i></div>
    <div id="demoAcc" class="w3-hide w3-white w3-card-4">
      <a href="./" class="w3-bar-item w3-button w3-red">Nasabah</a>
      <a href="../alat-sewa/" class="w3-bar-item w3-button">Alat Sewa</a>
    </div>
    <a href="review_data_previkasi.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-check-circle fa-fw"></i>  Review Data & Previkasi</a>
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
    <h5>Data Nasabah Baru</h5>
    <form method="post" action="create.php">
        <label for="kd_nasabah">Kode Nasabah</label>
        <input class="w3-input w3-border" name="kd_nasabah" type="text" size="10" maxlength="10" required="required" value="<?php echo $kodeNasabah ?>" readonly>
        <label for="nama_nasabah">Nama</label>
        <input class="w3-input w3-border" name="nama_nasabah" type="text" size="50" required>
        <label for="tgl_masuk">Tanggal Masuk</label>
        <input class="w3-input w3-border" name="tgl_masuk" type="date" required>
        <label for="tempat_lahir">Tempat Lahir</label>
        <input class="w3-input w3-border" name="tempat_lahir" type="text" size="50" required>
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input class="w3-input w3-border" name="tgl_lahir" type="date" required>
        <label for="pendidikan">Pendidikan</label>
        <input class="w3-input w3-border" list="pendidikan" name="pendidikan" size="15" required>
        <datalist id="pendidikan">
          <option value="SLTP/SD">
            <option value="SMP">
              <option value="D2/D1/SMA">
                <option value="D3">
                  <option value="S1">
                    <option value="S2">
                      <option value="S3">
        </datalist>
        <label for="alamat">Alamat</label>
        <input class="w3-input w3-border" name="alamat" type="text" size="50">
        <label for="jenis_kelamin">Jenis Kelamin</label><br>
        <input type="radio" id="pria" name="jenis_kelamin" value="Pria">
        <label for="pria">Pria</label><br>
        <input type="radio" id="wanita" name="jenis_kelamin" value="Wanita">
        <label for="wanita">Wanita</label><br>
        <label for="pekerjaan">Pekerjaan</label>
        <input class="w3-input w3-border" name="pekerjaan" type="text" size="50">
        <label for="nomor_hp">Nomor HP</label>
        <input class="w3-input w3-border" name="nomor_hp" type="text" size="13" maxlength="13" required><br>
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
              <a href="./tambah-nasabah.php" class="w3-button w3-red">Tidak!</a>
            </div>
          </div>
        </div>
        <button type="reset" class="w3-button w3-red">Hapus -</button>
    </form>
  </div>
  <hr>
<?php include '../footer.php' ?>