<?php 
session_start();
include "lib/koneksi.php";
$sid = session_id();
$id_pro=$_GET['id_produk']; 
$tanggal=date("Y-m-d");
$h=$_GET['harga'];

//di cek dulu apakah barang yang di beli sudah ada di tabel order temp
$sql = mysqli_query($koneksi, "SELECT id_produk FROM tbl_order WHERE id_produk='$id_pro' AND id_session='$sid'");
    $ketemu=mysqli_num_rows($sql);
	//echo $ketemu;
	//exit();
    if ($ketemu==0){
        // kalau barang belum ada, maka di jalankan perintah insert
        mysqli_query($koneksi, "INSERT INTO tbl_order (status_order, id_produk, jumlah, harga, id_session)
                VALUES ('P', '$id_pro', 1, '$h', '$sid')");
    } else {
        //  kalau barang ada, maka di jalankan perintah update
        mysqli_query($koneksi, "UPDATE tbl_order
                SET jumlah = jumlah + 1
                WHERE id_session ='$sid' AND id_produk='$id_pro'");       
    }   
    header('Location:keranjang.php'); 
?>
