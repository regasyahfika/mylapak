<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $namaMerek = $_POST['namaMerek'];

    $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_merek (nama_merek) VALUES ('$namaMerek')");
    if ($querySimpan) {
        echo "<script> alert('Data Merek Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=merek';</script>";
        //echo "masuk";
    } else {
        echo "<script> alert('Data Merek Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_merek';</script>";
    }
}
?>