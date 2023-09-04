<?php
//mengaktifkan session php
session_start();

//menghubungkan dengan koneksi
include '../koneksi/koneksi_mysql.php';

//menangkap data yang dikirim dari form
$nip = $_POST['nip'];
$password = $_POST['password'];

//menyeleksi data admin dengan nip dan password yang sesuai
$login = mysqli_query($koneksi,"select * from tdlogin where nip='$nip' and password='$password'");

//menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

if($cek > 0){

    $data = mysqli_fetch_assoc($login);

    //cek jika user login sebagai admin
    if($data['jabatan']=="Ketua"){

        //buat session login dan nip
        $_SESSION['nip'] = $nip;
        $_SESSION['jabatan'] = "Ketua";
        //alihkan ke halaman dashboard admin
        header("location:../admin/");

    //cek jika user login sebagai sekretaris
    }else if($data['jabatan']=="Sekretaris"){
        //buat session login dan nip
        $_SESSION['nip'] = $nip;
        $_SESSION['jabatan'] = "Sekretaris";
        //alihkan ke halaman dashboard
        header("location:../user/");

    }else if($data['jabatan']=="Bendahara"){
        //buat session login dan nip
        $_SESSION['nip'] = $nip;
        $_SESSION['jabatan'] = "Bendahara";
        //alihkan ke halaman dashboard
        header("location:../user/");
    }else{

        //alihkan ke halaman login kembali
        header("location:index.php?pesan=gagal");
    }
} else{
    header("location:index.php?pesan=gagal");
}

?>