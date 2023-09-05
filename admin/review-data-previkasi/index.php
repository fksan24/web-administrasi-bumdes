<?php include '../header.php' ?>
<?php
include '../koneksi/koneksi_mysql.php';
include '../format/tgl_indo.php';
include '../format/format_rupiah.php';
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
    <a href="../review-data-previkasi/" class="w3-bar-item w3-button w3-red w3-padding"><i class="fa fa-check-circle fa-fw"></i>  Review Data & Previkasi</a>
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
    <h4><b><i class="fa fa-check-circle"></i> Review Data & Previkasi</b></h4>
  </header>

    <!-- Index 1-->
    <div class="w3-container">
    <div class="w3-responsive">
      <h5>Data Informasi Nasabah</h5>
      <div class="w3-cell-row">
        <form action="review_data_previkasi.php" method="get">
          <input class="w3-input w3-border w3-cell" type="text" name="cari_nama" placeholder="Cari..." style="width:100px">
          <input class="w3-button w3-red w3-border" type="submit" value="Cari">
        </form>
      </div>
      <?php
      if(isset($_GET['cari_nama'])){
        $cari_nama = $_GET['cari_nama'];
        echo "<b>Hasil Pencarian : ".$cari_nama."</b>";
      }
      ?>
      <a href="print-nasabah.php" target="_blank" class="w3-button w3-red w3-right">Cetak</a>
      <table class="w3-table-all">
        <tr>
          <th>No. </th>
          <th>Kode Nasabah</th>
          <th>Nama</th>
          <th>Tanggal Masuk</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Pendidikan</th>
          <th>Alamat</th>
          <th>Jenis Kelamin</th>
          <th>Pekerjaan</th>
          <th>Nomor HP</th>
        </tr>
        <?php
        if(isset($_GET['cari_nama'])){
          $cari_nama = $_GET['cari_nama'];
          $tdnasabah = mysqli_query($koneksi,"SELECT * FROM tdnasabah WHERE nama_nasabah LIKE '%".$cari_nama."%'");
        }else{
          $tdnasabah = mysqli_query($koneksi,"SELECT * FROM tdnasabah");
        }
        // Pagination
        $batas = 10;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
				$previous = $halaman - 1;
				$next = $halaman + 1;
				
				$data = mysqli_query($koneksi,"SELECT * FROM tdnasabah");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
 
				$tdnasabah = mysqli_query($koneksi,"SELECT * FROM tdnasabah LIMIT $halaman_awal, $batas");
				$nomor = $halaman_awal+1;
				while($tdn = mysqli_fetch_array($tdnasabah)){
        ?>
        <tr>
          <td><?php echo $nomor++; ?></td>
          <td><?php echo $tdn['kd_nasabah']; ?></td>
          <td><?php echo $tdn['nama_nasabah']; ?></td>
          <td><?php echo tgl_indo($tdn['tgl_masuk']); ?></td>
          <td><?php echo $tdn['tempat_lahir']; ?></td>
          <td><?php echo tgl_indo($tdn['tgl_lahir']); ?></td>
          <td><?php echo $tdn['pendidikan']; ?></td>
          <td><?php echo $tdn['alamat']; ?></td>
          <td><?php echo $tdn['jenis_kelamin']; ?></td>
          <td><?php echo $tdn['pekerjaan']; ?></td>
          <td><?php echo $tdn['nomor_hp']; ?></td>
        </tr>
        <?php
        }
        ?>
      </table>
      <div class="w3-bar w3-red w3-center">
        <a <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?>" class="w3-button">&laquo;</a>
        <?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
        <a href="?halaman=<?php echo $x ?>" class="w3-button"><?php echo $x; ?></a>
        <?php  
        }
				?>
        <a <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?> class="w3-button">&raquo;</a>
      </div>
    </div>
  </div>
  <hr>

  <!-- Index 2 -->
  <div class="w3-container">
    <div class="w3-responsive">
      <h5>Data Informasi Alat Sewa</h5>
      <div class="w3-cell-row">
        <form action="review_data_previkasi.php" method="get">
          <input class="w3-input w3-border w3-cell" type="text" name="cari_nama_alat" placeholder="Cari..." style="width:100px">
          <input class="w3-button w3-red w3-border" type="submit" value="Cari">
        </form>
      </div>
      <?php
      if(isset($_GET['cari_nama_alat'])){
        $cari_nama_alat = $_GET['cari_nama_alat'];
        echo "<b>Hasil Pencarian : ".$cari_nama_alat."</b>";
      }
      ?>
      <a href="print-alat-sewa.php" target="_blank" class="w3-button w3-red w3-right">Cetak</a>
      <table class="w3-table-all">
        <tr>
          <th>No. </th>
          <th>Nama Alat</th>
          <th>Harga Sewa</th>
          <th>Keterangan</th>
        </tr>
        <?php
        if(isset($_GET['cari_nama_alat'])){
          $cari_nama_alat = $_GET['cari_nama_alat'];
          $tdalatsewa = mysqli_query($koneksi,"SELECT * FROM tdalatsewa WHERE nama_alat LIKE '%".$cari_nama_alat."%'");
        }else{
          $tdalatsewa = mysqli_query($koneksi,"SELECT * FROM tdalatsewa");
        }
        // Pagination
        $batas = 10;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
				$previous = $halaman - 1;
				$next = $halaman + 1;
				
				$data = mysqli_query($koneksi,"SELECT * FROM tdalatsewa");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
 
				$tdalatsewa = mysqli_query($koneksi,"SELECT * FROM tdalatsewa LIMIT $halaman_awal, $batas");
				$nomor = $halaman_awal+1;
				while($tda = mysqli_fetch_array($tdalatsewa)){
        ?>
        <tr>
          <td><?php echo $nomor++; ?></td>
          <td><?php echo $tda['nama_alat']; ?></td>
          <td><?php echo rupiah($tda['harga_sewa']); ?></td>
          <td><?php echo $tda['keterangan']; ?></td>
        </tr>
        <?php
        }
        ?>
      </table>
      <div class="w3-bar w3-red w3-center">
        <a <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?>" class="w3-button">&laquo;</a>
        <?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
        <a href="?halaman=<?php echo $x ?>" class="w3-button"><?php echo $x; ?></a>
        <?php  
        }
				?>
        <a <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?> class="w3-button">&raquo;</a>
      </div>
    </div>
  </div>
  <hr>
<?php include '../footer.php' ?>