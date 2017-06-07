<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idMerek = $_POST['id_merek'];
    $namaMerek = $_POST['nama_merek'];
    $queryEdit = mysqli_query($koneksi, "UPDATE tbl_merek SET nama_merek='$namaMerek' WHERE id_merek='$idMerek'");

    if ($queryEdit) {
        echo "<script> alert('Data Merek Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=merek';</script>";
    } else {
        echo "<script> alert('Data Merek Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_merek&id_merek='+'$idMerek';</script>";

    }
}
?>