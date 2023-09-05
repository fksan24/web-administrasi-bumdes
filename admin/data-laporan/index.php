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
    <a href="../review-data-previkasi/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-check-circle fa-fw"></i>  Review Data & Previkasi</a>
    <div class="w3-bar-item w3-button" onclick="myAccFunc0()"><i class="fa fa-book fa-fw""></i>  Inputan Data Transaksi <i class="fa fa-caret-down"></i></div>
    <div id="demoAcc0" class="w3-hide w3-white w3-card-4">
        <a href="../simpanan/" class="w3-bar-item w3-button">Data Simpanan</a>
        <a href="../pinjaman/" class="w3-bar-item w3-button">Pengajuan Pinjaman</a>
        <a href="../pembayaran-angsuran/" class="w3-bar-item w3-button">Pembayaran Angsuran</a>
        <a href="../penyewaan/" class="w3-bar-item w3-button">Data Penyewaan Alat</a>
    </div>
    <a href="./" class="w3-bar-item w3-button w3-red w3-padding"><i class="fa fa-align-left fa-fw"></i>  Data Laporan</a>
  </div>
</nav>
  
<!-- Efek Overlay ketika membuka sidebar di layar kecil -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
  
<!-- !Konten Page! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h4><b><i class="fa fa-align-left"></i> Data Laporan</b></h4>
  </header>

  <!-- Index 1 -->
  <div class="w3-container">
    <div class="w3-responsive">
      <h5>Data Simpanan</h5>
      <a href="print-simpanan.php" target="_blank" class="w3-button w3-red w3-right">Cetak</a>
      <table class="w3-table-all">
        <tr>
          <th>No. </th>
          <th>Nomor Simpanan</th>
          <th>Kode Nasabah</th>
          <th>Tanggal Simpanan</th>
          <th>Simpanan Pokok</th>
          <th>Simpanan Wajib</th>
          <th>Simpanan Lain</th>
          <th>Jumlah Simpanan</th>
        </tr>
        <?php
        // Pagination
        $batas = 10;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
				$previous = $halaman - 1;
				$next = $halaman + 1;
				
				$data = mysqli_query($koneksi,"SELECT * FROM tdsimpanan");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
 
				$tdsimpanan = mysqli_query($koneksi,"SELECT * FROM tdsimpanan LIMIT $halaman_awal, $batas");
				$nomor = $halaman_awal+1;
        $tdsimpanan = mysqli_query($koneksi, "SELECT * FROM tdsimpanan");
        while($tds = mysqli_fetch_array($tdsimpanan)){
        ?>
        <tr>
          <td><?php echo $nomor++; ?></td>
          <td><?php echo $tds['no_simpanan']; ?></td>
          <td><?php echo $tds['kd_nasabah']; ?></td>
          <td><?php echo tgl_indo($tds['tgl_simpanan']); ?></td>
          <td><?php echo rupiah($tds['simpanan_pokok']); ?></td>
          <td><?php echo rupiah($tds['simpanan_wajib']); ?></td>
          <td><?php echo rupiah($tds['simpanan_lain']); ?></td>
          <td><?php echo rupiah($tds['jumlah_simpanan']); ?></td>
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
      <h5>Data Pengajuan Pinjaman</h5>
      <a href="print-pinjaman.php" target="_blank" class="w3-button w3-red w3-right">Cetak</a>
      <table class="w3-table-all">
        <tr>
          <th>No. </th>
          <th>Nomor Pinjaman</th>
          <th>Kode Nasabah</th>
          <th>Tanggal Pinjaman</th>
          <th>Pokok Pinjaman</th>
          <th>Lama Pinjaman</th>
          <th>Total Pinjaman</th>
          <th>Bunga%</th>
          <th>Besarnya Pinjaman</th>
        </tr>
        <?php
        // Pagination
        $batas = 10;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
				$previous = $halaman - 1;
				$next = $halaman + 1;
				
				$data = mysqli_query($koneksi,"SELECT * FROM tdpinjaman");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
 
				$tdpinjaman = mysqli_query($koneksi,"SELECT * FROM tdpinjaman LIMIT $halaman_awal, $batas");
				$nomor = $halaman_awal+1;
        $tdpinjaman = mysqli_query($koneksi, "SELECT * FROM tdpinjaman");
        while($tdp = mysqli_fetch_array($tdpinjaman)){
        ?>
        <tr>
          <td><?php echo $nomor++; ?></td>
          <td><?php echo $tdp['no_pinjaman']; ?></td>
          <td><?php echo $tdp['kd_nasabah']; ?></td>
          <td><?php echo tgl_indo($tdp['tgl_pinjaman']); ?></td>
          <td><?php echo rupiah($tdp['pokok_pinjaman']); ?></td>
          <td><?php echo $tdp['lama_pinjaman']; ?> Bulan</td>
          <td><?php echo rupiah($tdp['total_pinjaman']); ?></td>
          <td><?php echo $tdp['bunga']; ?>%</td>
          <td><?php echo rupiah($tdp['besarnya_pinjaman']); ?></td>
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

  <!-- Index 3 -->
  <div class="w3-container">
    <div class="w3-responsive">
      <h5>Data Pembayaran Angsuran</h5>
      <a href="print-pembayaran-angsuran.php" target="_blank" class="w3-button w3-red w3-right">Cetak</a>
      <table class="w3-table-all">
        <tr>
          <th>No. </th>
          <th>Nomor Angsuran</th>
          <th>Nomor Pinjaman</th>
          <th>Angsuran ke</th>
          <th>Tanggal Angsuran</th>
          <th>Jumlah Angsuran</th>
        </tr>
        <?php
        // Pagination
        $batas = 10;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
				$previous = $halaman - 1;
				$next = $halaman + 1;
				
				$data = mysqli_query($koneksi,"SELECT * FROM tdpinjaman");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
 
				$tdpinjaman = mysqli_query($koneksi,"SELECT * FROM tdpinjaman LIMIT $halaman_awal, $batas");
				$nomor = $halaman_awal+1;
        $tdpembayaranangsuran = mysqli_query($koneksi, "SELECT * FROM tdpembayaranangsuran");
        while($tdpa = mysqli_fetch_array($tdpembayaranangsuran)){
        ?>
        <tr>
          <td><?php echo $nomor++; ?></td>
          <td><?php echo $tdpa['no_angsuran']; ?></td>
          <td><?php echo $tdpa['no_pinjaman']; ?></td>
          <td><?php echo $tdpa['angsuranke']; ?></td>
          <td><?php echo tgl_indo($tdpa['tgl_angsuran']); ?></td>
          <td><?php echo rupiah($tdpa['jumlah_angsuran']); ?></td>
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

  <!-- Index 4 -->
  <div class="w3-container">
    <div class="w3-responsive">
      <h5>Data Penyewaan Alat</h5>
      <a href="print-penyewaan-alat.php" target="_blank" class="w3-button w3-red w3-right">Cetak</a>
      <table class="w3-table-all">
        <tr>
          <th>No. </th>
          <th>Nomor Sewa</th>
          <th>Kode Nasabah</th>
          <th>Alat Sewa</th>
          <th>Tanggal Sewa</th>
          <th>Lama Sewa</th>
          <th>Harga Sewa</th>
          <th>Total Sewa Perbulan</th>
        </tr>
        <?php
        // Pagination
        $batas = 10;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
				$previous = $halaman - 1;
				$next = $halaman + 1;
				
				$data = mysqli_query($koneksi,"SELECT * FROM tdpinjaman");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
 
				$tdpinjaman = mysqli_query($koneksi,"SELECT * FROM tdpinjaman LIMIT $halaman_awal, $batas");
				$nomor = $halaman_awal+1;
        $tdpenyewaan = mysqli_query($koneksi, "SELECT * FROM tdpenyewaan");
        while($tdpe = mysqli_fetch_array($tdpenyewaan)){
        ?>
        <tr>
          <td><?php echo $nomor++; ?></td>
          <td><?php echo $tdpe['no_sewa']; ?></td>
          <td><?php echo $tdpe['kd_nasabah']; ?></td>
          <td><?php echo $tdpe['id_alat']; ?></td>
          <td><?php echo tgl_indo($tdpe['tgl_sewa']); ?></td>
          <td><?php echo $tdpe['lama_sewa']; ?></td>
          <td><?php echo rupiah($tdpe['harga_sewa']); ?></td>
          <td><?php echo rupiah($tdpe['total_sewa']); ?></td>
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