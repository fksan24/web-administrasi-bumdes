<?php

$koneksi = mysqli_connect("localhost","root","","dbbumdes");

//Check connection
if (mysqli_connect_error()) {
    echo "Koneksi Database Gagal : " .mysqli_connect_error();
}

?>