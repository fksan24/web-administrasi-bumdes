<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Aplikasi Administrasi Bumdes Desa Onto">
        <meta name="keywords" content="PHP, CSS, JavaScript">
        <meta name="author" content="Kelompok 1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Bumdes Desa Onto</title>
        <link rel="stylesheet" type="text/css" href="mycssfk.css">
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="stylesheet" type="text/css" href="mycsscolorfk.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif;}
        </style>
    </head>
<body class="fk-light-grey">
<!-- Cek apakah sudah login -->
<?php
session_start();
if($_SESSION['jabatan']==""){
  header("location:login_admin.php?pesan=belum_login");
}
?>
  
<!-- Container Atas -->
<div class="fk-bar fk-top fk-red fk-large" style="z-index:4">
    <button class="fk-bar-item fk-button fk-hide-large fk-hover-none fk-hover-text-light-grey" onclick="fk_open();"><i class="fa fa-bars"></i> Menu</button>
    <span class="fk-bar-item fk-right">Aplikasi Administrasi Bumdes Desa Onto</span>
</div>

<!-- Menu/Sidebar -->
<nav class="fk-sidebar fk-collapse fk-white fk-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="fk-container fk-row">
    <div class="fk-col s4">
      <img src="logo_bumdes_desa_onto.png" class="fk-margin-right" style="width:60px">
    </div>
    <div class="fk-col s8 fk-bar">
      <span>Selamat Datang, <strong><?php echo $_SESSION['nip']; ?> sebagai <?php echo $_SESSION['jabatan']; ?></strong></span><br>
      <a href="#kontak_pesan" class="fk-bar-item fk-button"><i class="fa fa-envelope"></i></a>
      <a href="#profil_admin" class="fk-bar-item fk-button"><i class="fa fa-user"></i></a>
      <!-- Modal Log-out/Keluar -->
      <button onclick="document.getElementById('id00').style.display='block'" class="fk-button"><i class="fa fa-sign-out"></i></button>
      <div id="id00" class="fk-modal">
        <div class="fk-modal-content fk-card-4">
          <header class="fk-container fk-red">
            <span onclick="document.getElementById('id00').style.display='none'" class="fk-button fk-display-topright">&times;</span>
            <h2>Peringatan!</h2>
          </header>
          <div class="fk-container">
            <p>Apakah Anda ingin keluar?</p>
            <a href="logout.php" class="fk-button fk-red">Ya!</a>
            <a href="dashboard.php" class="fk-button fk-red">Tidak!</a>
          </div>
        </div>
      </div>

    </div>
  </div>
  <hr>
  <div class="fk-container">
    <h5>Menu :</h5>
  </div>
  <div class="fk-bar-block">
    <a href="#" class="fk-bar-item fk-button fk-padding-16 fk-hide-large fk-dark-grey fk-hover-black" onclick="fk_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Tutup Menu</a>
    <a href="dashboard.php" class="fk-bar-item fk-button fk-padding fk-red"><i class="fa fa-dashboard fa-fw"></i>  Dashboard</a>
    <div class="fk-bar-item fk-button" onclick="myAccFunc()"><i class="fa fa-address-book fa-fw"></i>  Inputan Data Informasi <i class="fa fa-caret-down"></i></div>
    <div id="demoAcc" class="fk-hide fk-white fk-card-4">
      <a href="data_nasabah.php" class="fk-bar-item fk-button">Nasabah</a>
      <a href="data_alat_sewa.php" class="fk-bar-item fk-button">Alat Sewa</a>
    </div>
    <a href="review_data_previkasi.php" class="fk-bar-item fk-button fk-padding"><i class="fa fa-check-circle fa-fw"></i>  Review Data & Previkasi</a>
    <div class="fk-bar-item fk-button" onclick="myAccFunc0()"><i class="fa fa-book fa-fw""></i>  Inputan Data Transaksi <i class="fa fa-caret-down"></i></div>
    <div id="demoAcc0" class="fk-hide fk-white fk-card-4">
      <a href="data_simpanan.php" class="fk-bar-item fk-button">Data Simpanan</a>
      <a href="data_pengajuan_pinjaman.php" class="fk-bar-item fk-button">Pengajuan Pinjaman</a>
      <a href="data_pembayaran_angsuran.php" class="fk-bar-item fk-button">Pembayaran Angsuran</a>
      <a href="data_penyewaan_alat.php" class="fk-bar-item fk-button">Data Penyewaan Alat</a>
    </div>
    <a href="data_laporan.php" class="fk-bar-item fk-button fk-padding"><i class="fa fa-align-left fa-fw"></i>  Data Laporan</a>
  </div>
</nav>
  
<!-- Efek Overlay ketika membuka sidebar di layar kecil -->
<div class="fk-overlay fk-hide-large fk-animate-opacity" onclick="fk_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
  
<!-- !Konten Page! -->
<div class="fk-main" style="margin-left:300px;margin-top:43px;">
  
<!-- Header -->
  <header class="fk-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Dashboard Saya</b></h5>
  </header>

  <!-- Dashboard Info 1-->
  <h5 class="fk-container">Data Informasi</h5>
  <div class="fk-row-padding fk-margin-bottom">
    <?php
    include 'koneksi_mysql.php';
    $tdnasabah = mysqli_query($koneksi,"SELECT * FROM tdnasabah");
    $jumlah_nasabah = mysqli_num_rows($tdnasabah);
    ?>
    <div class="fk-half">
      <div class="fk-container fk-red fk-padding-16">
        <div class="fk-left"><i class="fa fa-drivers-license fk-xxxlarge"></i></div>
        <div class="fk-right">
          <h3><?php echo $jumlah_nasabah; ?></h3>
        </div>
        <div class="fk-clear">
          <h4>Nasabah Terdaftar</h4>
        </div>
      </div>
    </div>

    <?php
    include 'koneksi_mysql.php';
    $tdalatsewa = mysqli_query($koneksi,"SELECT * FROM tdalatsewa");
    $jumlah_alat_sewa = mysqli_num_rows($tdalatsewa);
    ?>
    <div class="fk-half">
      <div class="fk-container fk-red fk-padding-16">
        <div class="fk-left"><i class="fa fa-wrench fk-xxxlarge"></i></div>
        <div class="fk-right">
          <h3><?php echo $jumlah_alat_sewa; ?></h3>
        </div>
        <div class="fk-clear">
          <h4>Alat Sewa</h4>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Dashboard Info 2-->
  <h5 class="fk-container">Data Transaksi</h5>
  <div class="fk-row-padding fk-margin-bottom">
    <?php
    include 'koneksi_mysql.php';
    $tdsimpanan = mysqli_query($koneksi,"SELECT * FROM tdsimpanan");
    $jumlah_simpanan = mysqli_num_rows($tdsimpanan);
    ?>
    <div class="fk-quarter">
      <div class="fk-container fk-red fk-padding-16">
        <div class="fk-left"><i class="fa fa-tasks fk-xxxlarge"></i></div>
        <div class="fk-right">
          <h3><?php echo $jumlah_simpanan; ?></h3>
        </div>
        <div class="fk-clear">
          <h4>Data Simpanan</h4>
        </div>
      </div>
    </div>

    <?php
    include 'koneksi_mysql.php';
    $tdpinjaman = mysqli_query($koneksi,"SELECT * FROM tdpinjaman");
    $jumlah_pinjaman = mysqli_num_rows($tdpinjaman);
    ?>
    <div class="fk-quarter">
      <div class="fk-container fk-red fk-padding-16">
        <div class="fk-left"><i class="fa fa-tasks fk-xxxlarge"></i></div>
        <div class="fk-right">
          <h3><?php echo $jumlah_pinjaman; ?></h3>
        </div>
        <div class="fk-clear">
          <h4>Pengajuan Pinjaman</h4>
        </div>
      </div>
    </div>

    <?php
    include 'koneksi_mysql.php';
    $tdpembayaranangsuran = mysqli_query($koneksi,"SELECT * FROM tdpembayaranangsuran");
    $jumlah_pembayaranangsuran = mysqli_num_rows($tdpembayaranangsuran);
    ?>
    <div class="fk-quarter">
      <div class="fk-container fk-red fk-padding-16">
        <div class="fk-left"><i class="fa fa-tasks fk-xxxlarge"></i></div>
        <div class="fk-right">
          <h3><?php echo $jumlah_pembayaranangsuran; ?></h3>
        </div>
        <div class="fk-clear">
          <h4>Pembayaran Angsuran</h4>
        </div>
      </div>
    </div>

    <?php
    include 'koneksi_mysql.php';
    $tdpenyewaan = mysqli_query($koneksi,"SELECT * FROM tdpenyewaan");
    $jumlah_penyewaan = mysqli_num_rows($tdpenyewaan);
    ?>
    <div class="fk-quarter">
      <div class="fk-container fk-red fk-padding-16">
        <div class="fk-left"><i class="fa fa-tasks fk-xxxlarge"></i></div>
        <div class="fk-right">
          <h3><?php echo $jumlah_penyewaan; ?></h3>
        </div>
        <div class="fk-clear">
          <h4>Data Penyewaan Alat</h4>
        </div>
      </div>
    </div>
  <hr>
  
  <!-- Kontak Pesan -->
  <div class="fk-row-padding fk-margin-bottom" id="kontak_pesan">
    <div class="fk-container">
      <h5>Kontak Pesan</h5>
      <table class="fk-table-all">
        <tr>
          <th>No. </th>
          <th>Nama</th>
          <th>Email</th>
          <th>Judul</th>
          <th>Isi Pesan</th>
          <th>Opsi</th>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><a href="#" class="fk-button fk-red">Lihat</a></td>
        </tr>
      </table>
    </div>
  </div>
  <hr>

  <!-- Profil Admin -->
  <div class="fk-row-padding fk-margin-bottom" id="profil_admin">
    <div class="fk-container">
      <h5>Profil Admin</h5>
      <label class="fk-label" for="nip">NIP</label>
      <input type="number" class="fk-input fk-border" value="<?php echo $_SESSION['nip']; ?>" readonly>
      <label for="nama">Nama</label>
      <input type="text" class="fk-input fk-border" value="<?php echo $_SESSION['nama_admin']; ?>" readonly>
      <label for="jabatan">Jabatan</label>
      <input type="text" class="fk-input fk-border" value="<?php echo $_SESSION['jabatan']; ?>" readonly>
    </div>
    
  <!-- Ganti Password Modal -->

    <div class="fk-container">
      <label for="password">Password</label>
      <input type="password" class="fk-input fk-border" value="<?php echo $_SESSION['password']; ?>" readonly>
      <button onclick="document.getElementById('id01').style.display='block'" class="fk-button fk-red">Ubah Password</button>
      <div id="id01" class="fk-modal">
        <div class="fk-modal-content fk-card-4">
          <header class="fk-container fk-red">
            <span onclick="document.getElementById('id01').style.display='none'" class="fk-button fk-display-topright">&times;</span>
            <h2>Ubah Password</h2>
          </header>
          <div class="fk-container">
            <label class="fk-label" for="password_lama">Password Lama</label>
            <input type="password" class="fk-input fk-border" placeholder="Masukkan Password Lama" required>
            <label class="fk-label" for="password_lama">Password Baru</label>
            <input type="password" class="fk-input fk-border" placeholder="Masukkan Password Baru" required>
            <label class="fk-label" for="password_lama">Ulangi Password Baru</label>
            <input type="password" class="fk-input fk-border" placeholder="Ulangi Password Baru" required>
            <input type="submit" class="fk-button fk-red" value="Ubah Password">
          </div>
        </div>
      </div>
    </div>
  </div>  
  <hr>
  

</div>
<!-- Footer -->
<footer class="fk-container fk-padding-16 fk-red">
  <a href="#home" class="fk-button fk-light-grey"><i class="fa fa-arrow-up fk-margin-right"></i>Kembali ke atas</a>
  <p>@copyrightprojectkelompok1</p>
</footer>
  
  <!-- Akhir konten page -->

  <!-- Java Script -->
  <script>
    // Ambil Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Ambil DIV dengan efek overlay
    var overlayBg = document.getElementById("myOverlay");

    // Tampilan antara menampilkan dan menyembunyikan sidebar, dan menambahkan efek overlay
    function fk_open() {
      if (mySidebar.style.display === 'block') {
      mySidebar.style.display = 'none';
      overlayBg.style.display = "none";
    } else {
      mySidebar.style.display = 'block';
      overlayBg.style.display = "block";
      }
    }

    // Close the sidebar with the close button
    function fk_close() {
      mySidebar.style.display = "none";
      overlayBg.style.display = "none";
    }

    function myAccFunc() {
      var x = document.getElementById("demoAcc");
      if (x.className.indexOf("fk-show") == -1) {
        x.className += " fk-show";
        x.previousElementSibling.className += " fk-red";
      } else {
        x.className = x.className.replace(" fk-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" fk-red", "");
      }
    }

    function myAccFunc0() {
      var x = document.getElementById("demoAcc0");
      if (x.className.indexOf("fk-show") == -1) {
        x.className += " fk-show";
        x.previousElementSibling.className += " fk-red";
      } else {
        x.className = x.className.replace(" fk-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" fk-red", "");
      }
    }
  </script>

</body>
</html>