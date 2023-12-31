<?php include '../header.php' ?>
<!-- Kode Otomatis no_simpanan -->
<?php
//menghubungkan dengan koneksi database
include '../koneksi/koneksi_mysql.php';

//mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(no_simpanan) as no_simpananTerbesar FROM tdsimpanan");
$data = mysqli_fetch_array($query);
$noSimpanan = $data['no_simpananTerbesar'];

//mengambil angka dari kode nasabah terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan int
$urutan = (int) substr($noSimpanan, 9, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode nasabah baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya 120
$angka = "612";
$huruf = "-SMNN-";
$noSimpanan = $angka . $huruf . sprintf("%03s", $urutan);
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
        <a href="./" class="w3-bar-item w3-button w3-red">Data Simpanan</a>
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
    <h4><b><i class="fa fa-book"></i> Inputan Data Transaksi</b></h4>
    <a href="./" class="w3-button w3-red">Kembali</a>
  </header>

  <!-- Index -->
  <div class="w3-container">
    <h5>Data Simpanan Baru</h5>
    <form method="post" action="create.php">
        <label for="no_simpanan">Nomor Simpanan :</label>
        <input class="w3-input w3-border w3-dark-grey" type="text" name="no_simpanan" size="12" maxlength="12" required="required" value="<?php echo $noSimpanan ?>" readonly>
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
        <label for="tgl_simpanan">Tanggal Simpanan :</label>
        <input class="w3-input w3-border" type="date" name="tgl_simpanan" required>

        <div class="hitungan_simpanan">
          <label for="simpanan_pokok">Simpanan Pokok :</label>
          <input class="w3-input w3-border" type="number" id="simpanan_pokok" name="simpanan_pokok" required>
          <label for="simpanan_wajib">Simpanan Wajib :</label>
          <input class="w3-input w3-border" type="number" id="simpanan_wajib" name="simpanan_wajib" required>
          <label for="simpanan_lain">Simpanan Lain :</label>
          <input class="w3-input w3-border" type="number" id="simpanan_lain" name="simpanan_lain" required>
          <label for="jumlah_simpanan">Jumlah Simpanan :</label>
          <input class="w3-input w3-border" type="number" id="jumlah_simpanan" name="jumlah_simpanan" required readonly>
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
              <a href="./tambah-simpanan.php" class="w3-button w3-red">Tidak!</a>
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
  $(".hitungan_simpanan").keyup(function(){
    var simpanan_pokok = parseInt($("#simpanan_pokok").val())
    var simpanan_wajib = parseInt($("#simpanan_wajib").val())
    var simpanan_lain = parseInt($("#simpanan_lain").val())

    var jumlah_simpanan = simpanan_pokok + simpanan_wajib + simpanan_lain;
    $("#jumlah_simpanan").attr("value",jumlah_simpanan)
  });
</script>
