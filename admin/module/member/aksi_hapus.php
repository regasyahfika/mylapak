<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idMember = $_GET['id_member'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_member WHERE id_member='$idMember'");
    if ($queryHapus) {
        echo "<script> alert('Data Member Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=member';</script>";
    } else {
        echo "<script> alert('Data Member Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=member';</script>";

    }
}
?>