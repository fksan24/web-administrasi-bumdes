<?php include '../header.php' ?>
  <hr>
  <div class="w3-container">
    <h5>Menu :</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Tutup Menu</a>
    <a href="../" class="w3-bar-item w3-button w3-padding"><i class="fa fa-dashboard fa-fw"></i>  Dashboard</a>
    <div class="w3-bar-item w3-button w3-red" onclick="myAccFunc()"><i class="fa fa-address-book fa-fw"></i>  Inputan Data Informasi <i class="fa fa-caret-down"></i></div>
    <div id="demoAcc" class="w3-hide w3-white w3-card-4">
      <a href="../nasabah/" class="w3-bar-item w3-button w3-red">Nasabah</a>
      <a href="../alat-sewa/" class="w3-bar-item w3-button">Alat Sewa</a>
    </div>
    <a href="../review-data-previkasi/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-check-circle fa-fw"></i>  Review Data & Previkasi</a>
    <div class="w3-bar-item w3-button" onclick="myAccFunc0()"><i class="fa fa-book fa-fw""></i>  Inputan Data Transaksi <i class="fa fa-caret-down"></i></div>
    <div id="demoAcc0" class="w3-hide w3-white w3-card-4">
      <a href="../simpanan/" class="w3-bar-item w3-button">Data Simpanan</a>
      <a href="../pinjaman/" class="w3-bar-item w3-button">Pengajuan Pinjaman</a>
      <a href="../pembayaran-angsuran/" class="w3-bar-item w3-button">Pembayaran Angsuran</a>
      <a href="../alat-sewa/" class="w3-bar-item w3-button">Data Penyewaan Alat</a>
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
    <h5>Data Nasabah Edit</h5>
    <?php
        include '../koneksi/koneksi_mysql.php';
        $kd_nasabah = $_GET['kd_nasabah'];
        $tdnasabah = mysqli_query($koneksi, "SELECT * FROM tdnasabah WHERE kd_nasabah='$kd_nasabah'");
        while($tdn = mysqli_fetch_array($tdnasabah)){
          ?>
    <form method="post" action="update.php">
        <label for="kd_nasabah">Kode Nasabah</label>
        <input class="w3-input w3-border" name="kd_nasabah" type="text" size="10" maxlength="10" required="required" value="<?php echo $tdn['kd_nasabah']; ?>" readonly>
        <label for="nama_nasabah">Nama</label>
        <input class="w3-input w3-border" name="nama_nasabah" type="text" size="50" required value="<?php echo $tdn['nama_nasabah']; ?>">
        <label for="tgl_masuk">Tanggal Masuk</label>
        <input class="w3-input w3-border" name="tgl_masuk" type="date" required value="<?php echo $tdn['tgl_masuk']; ?>">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input class="w3-input w3-border" name="tempat_lahir" type="text" size="50" required value="<?php echo $tdn['tempat_lahir']; ?>">
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input class="w3-input w3-border" name="tgl_lahir" type="date" required value="<?php echo $tdn['tgl_lahir']; ?>">
        <label for="pendidikan">Pendidikan</label>
        <input class="w3-input w3-border" list="pendidikan" name="pendidikan" size="15" required value="<?php echo $tdn['pendidikan']; ?>">
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
        <input class="w3-input w3-border" name="alamat" type="text" size="50" value="<?php echo $tdn['alamat']; ?>">
        <label for="jenis_kelamin">Jenis Kelamin</label><br>
        <input type="radio" id="pria" name="jenis_kelamin" value="Pria" value="<?php echo $tdn['jenis_kelamin']; ?>">
        <label for="pria">Pria</label><br>
        <input type="radio" id="wanita" name="jenis_kelamin" value="Wanita" value="<?php echo $tdn['jenis_kelamin']; ?>">
        <label for="wanita">Wanita</label><br>
        <label for="pekerjaan">Pekerjaan</label>
        <input class="w3-input w3-border" name="pekerjaan" type="text" size="50" value="<?php echo $tdn['pekerjaan']; ?>">
        <label for="nomor_hp">Nomor HP</label>
        <input class="w3-input w3-border" name="nomor_hp" type="text" size="13" maxlength="13" required value="<?php echo $tdn['nomor_hp']; ?>"><br>
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
              <a href="edit-nasabah" class="w3-button w3-red">Tidak!</a>
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