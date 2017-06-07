<?php

// untuk mengecek apakah session 'username' dan 'passuser' sudah ada apa blm, session tersebut tercipta jika admin telah login, 
// jadi jika admin blm login makan tidak dpt mengakses file ini

// untuk memasukkan file config.php dan file koneksi.php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";
// untuk menangkap variabel 'namaKategori' yang dikirim oleh form_tambah.php
    $namaKategori = $_POST['namaKategori'];
// query untuk menyimpan ke tabel tbl_kategori
    $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_kategori (nama_kategori) VALUES ('$namaKategori')");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
    if ($querySimpan) {
        echo "<script> alert('Data Kategori Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=kategori';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
    } else {
        echo "<script> alert('Data Kategori Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_kategori';</script>";
    }

?>