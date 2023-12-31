<?php include 'header.php' ?>    
  <hr>
  <div class="w3-container">
    <h5>Menu :</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Tutup Menu</a>
    <a href="./" class="w3-bar-item w3-button w3-padding w3-red"><i class="fa fa-dashboard fa-fw"></i>  Dashboard</a>
    <div class="w3-bar-item w3-button" onclick="myAccFunc()"><i class="fa fa-address-book fa-fw"></i>  Inputan Data Informasi <i class="fa fa-caret-down"></i></div>
    <div id="demoAcc" class="w3-hide w3-white w3-card-4">
      <a href="nasabah/" class="w3-bar-item w3-button">Nasabah</a>
      <a href="alat-sewa/ " class="w3-bar-item w3-button">Alat Sewa</a>
    </div>
    <a href="review-data-previkasi/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-check-circle fa-fw"></i>  Review Data & Previkasi</a>
    <div class="w3-bar-item w3-button" onclick="myAccFunc0()"><i class="fa fa-book fa-fw""></i>  Inputan Data Transaksi <i class="fa fa-caret-down"></i></div>
    <div id="demoAcc0" class="w3-hide w3-white w3-card-4">
      <a href="simpanan/" class="w3-bar-item w3-button">Data Simpanan</a>
      <a href="pinjaman/" class="w3-bar-item w3-button">Pengajuan Pinjaman</a>
      <a href="pembayaran-angsuran/" class="w3-bar-item w3-button">Pembayaran Angsuran</a>
      <a href="penyewaan/" class="w3-bar-item w3-button">Data Penyewaan Alat</a>
    </div>
    <a href="data-laporan/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-align-left fa-fw"></i>  Data Laporan</a>
  </div>
</nav>
  
<!-- Efek Overlay ketika membuka sidebar di layar kecil -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
  
<!-- !Konten Page! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  
<!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Dashboard Saya</b></h5>
  </header>

<!-- Dashboard Info 1-->
  <h5 class="w3-container">Data Informasi</h5>
  <div class="w3-row-padding w3-margin-bottom">
    <?php
    include '../koneksi/koneksi_mysql.php';
    $tdnasabah = mysqli_query($koneksi,"SELECT * FROM tdnasabah");
    $jumlah_nasabah = mysqli_num_rows($tdnasabah);
    ?>
    <div class="w3-half">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-drivers-license w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $jumlah_nasabah; ?></h3>
        </div>
        <div class="w3-clear">
          <h4>Nasabah Terdaftar</h4>
        </div>
      </div>
    </div>

    <?php
    include '../koneksi/koneksi_mysql.php';
    $tdalatsewa = mysqli_query($koneksi,"SELECT * FROM tdalatsewa");
    $jumlah_alat_sewa = mysqli_num_rows($tdalatsewa);
    ?>
    <div class="w3-half">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-wrench w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $jumlah_alat_sewa; ?></h3>
        </div>
        <div class="w3-clear">
          <h4>Alat Sewa</h4>
        </div>
      </div>
    </div>

  <!-- Dashboard Info 2-->
    <?php
    include '../koneksi/koneksi_mysql.php';
    $tdsimpanan = mysqli_query($koneksi,"SELECT * FROM tdsimpanan");
    $jumlah_simpanan = mysqli_num_rows($tdsimpanan);
    ?>
    <div class="w3-quarter" style="margin-top:10px;">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-tasks w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $jumlah_simpanan; ?></h3>
        </div>
        <div class="w3-clear">
          <h4>Data Simpanan</h4>
        </div>
      </div>
    </div>

    <?php
    include '../koneksi/koneksi_mysql.php';
    $tdpinjaman = mysqli_query($koneksi,"SELECT * FROM tdpinjaman");
    $jumlah_pinjaman = mysqli_num_rows($tdpinjaman);
    ?>
    <div class="w3-quarter" style="margin-top:10px;">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-tasks w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $jumlah_pinjaman; ?></h3>
        </div>
        <div class="w3-clear">
          <h4>Pengajuan Pinjaman</h4>
        </div>
      </div>
    </div>

    <?php
    include '../koneksi/koneksi_mysql.php';
    $tdpembayaranangsuran = mysqli_query($koneksi,"SELECT * FROM tdpembayaranangsuran");
    $jumlah_pembayaranangsuran = mysqli_num_rows($tdpembayaranangsuran);
    ?>
    <div class="w3-quarter" style="margin-top:10px;">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-tasks w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $jumlah_pembayaranangsuran; ?></h3>
        </div>
        <div class="w3-clear">
          <h4>Pembayaran Angsuran</h4>
        </div>
      </div>
    </div>

    <?php
    include '../koneksi/koneksi_mysql.php';
    $tdpenyewaan = mysqli_query($koneksi,"SELECT * FROM tdpenyewaan");
    $jumlah_penyewaan = mysqli_num_rows($tdpenyewaan);
    ?>
    <div class="w3-quarter" style="margin-top:10px;">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-tasks w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $jumlah_penyewaan; ?></h3>
        </div>
        <div class="w3-clear">
          <h4>Data Penyewaan Alat</h4>
        </div>
      </div>
    </div>

    <!-- Dashboard Info 3-->
    <div class="w3-col" style="margin-top:10px;">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-tasks w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>0</h3>
        </div>
        <div class="w3-clear">
          <h4>Laporan valid</h4>
        </div>
      </div>
    </div>
  <hr>
  
  <div class="w3-container">
    <h5>Status Kas</h5>
    <p>Kas Masuk</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:25%">Rp. 0.000,00</div>
    </div>
    <p>Kas Keluar</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:25%">Rp. 0.000,00</div>
    </div>
  </div>
  <hr>
  
  <!-- Kontak Pesan -->
  <div class="w3-container" id="kontak_pesan">
    <h5>Kontak Pesan</h5>
    <table class="w3-table-all">
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
        <td><a href="#" class="w3-button w3-red">Lihat</a></td>
      </tr>
    </table>
  </div>
  <hr>

  <!-- Profil Admin -->
  <div class="w3-container" id="profil_admin">
    <h5>Profil Admin</h5>
    <label class="w3-label" for="nip">NIP</label>
    <input type="number" class="w3-input w3-border" value="" readonly>
    <label for="nama">Nama</label>
    <input type="text" class="w3-input w3-border" value="" readonly>
    <label for="jabatan">Jabatan</label>
    <input type="text" class="w3-input w3-border" value="" readonly>
    <p>Foto Profil</p>
    <div class="w3-card" style="width:50%;">
      <img id="myimagefile" alt="foto_profil" style="width:100%">
      <div class="w3-container">
        <input type="file" id="myimagefile" name="myimagefile">
      </div>
    </div>
    
    <!-- Ganti Password Modal -->
    <label for="password">Password</label>
    <input type="password" class="w3-input w3-border" value="" readonly>
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-red">Ubah Password</button>
    <div id="id01" class="w3-modal">
      <div class="w3-modal-content w3-card-4">
        <header class="w3-container w3-red">
          <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
          <h2>Ubah Password</h2>
        </header>
        <div class="w3-container">
          <label class="w3-label" for="password_lama">Password Lama</label>
          <input type="password" class="w3-input w3-border" placeholder="Masukkan Password Lama" required>
          <label class="w3-label" for="password_lama">Password Baru</label>
          <input type="password" class="w3-input w3-border" placeholder="Masukkan Password Baru" required>
          <label class="w3-label" for="password_lama">Ulangi Password Baru</label>
          <input type="password" class="w3-input w3-border" placeholder="Ulangi Password Baru" required>
          <input type="submit" class="w3-button w3-red" value="Ubah Password">
        </div>
      </div>
    </div>
  </div>
  <hr>

</div>
<?php include 'footer.php' ?>