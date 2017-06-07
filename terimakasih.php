<?php 
session_start(); 
include "lib/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Home | E-Shopper</title>
<link href="asset/css/bootstrap.min.css" rel="stylesheet">
<link href="asset/css/font-awesome.min.css" rel="stylesheet">
<link href="asset/css/prettyPhoto.css" rel="stylesheet">
<link href="asset/css/price-range.css" rel="stylesheet">
<link href="asset/css/animate.css" rel="stylesheet">
<link href="asset/css/main.css" rel="stylesheet">
<link href="asset/css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]--> 
<link rel="shortcut icon" href="images/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>



<?php
$sid = session_id();
//fungsi untuk mendapatkan isi keranjang belanja
function isi_keranjang(){
	include 'lib/koneksi.php';
	$isikeranjang = array();
	$sid = session_id();
	$sql = mysqli_query($koneksi, "SELECT * FROM tbl_order WHERE id_session='$sid'");
	while ($r = mysqli_fetch_array($sql)){
		$isikeranjang[] = $r;
	}
	return $isikeranjang;
}

$tgl_skrg = date("Y-m-d");
//simpan data pemesanan
mysqli_query($koneksi, "INSERT INTO tbl_pembelian(tanggal_beli,status_order) VALUES ('$tgl_skrg','P')");

//mendapatkan nomor orders dari tabel pembelian
$id_orders = mysqli_insert_id($koneksi);

//panggil fungsi isikeranjang dan hitung jumlah produk yang dipesan
$isikeranjang = isi_keranjang();
$jml = count($isikeranjang);

//simpan data detail pemesanan
for ($i = 0; $i < $jml; $i++) {
	mysqli_query($koneksi, "INSERT INTO tbl_detail_order(id_order, id_produk, jumlah, harga)
	VALUES('$id_orders',{$isikeranjang[$i]['id_produk']},{$isikeranjang[$i]['jumlah']},{$isikeranjang[$i]['harga']})");
}
for ($i = 0; $i < $jml; $i++) {mysqli_query($koneksi, "DELETE FROM tbl_order WHERE id_order = {$isikeranjang[$i]['id_order']}");
} ?>
	<section id="cart_items">
		<div class="container">
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-8">
						<div class="shopper-info">
						<p>Terimakasih Atas Kepercayaan Anda Belanja Di Toko Online Kami, Berikut Detail Pembayaran Yang Harus dibayarkan.</p>
						<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
							<div class="form-group col-md-12">
							Id order : <?php echo $_POST['idorder']; ?>
							</div>
							<div class="form-group col-md-12">
							Nama : <?php echo $_POST['nama']; ?>
							</div>
							<div class="form-group col-md-12">
							Email : <?php echo $_POST['email']; ?>
							</div>
							<div class="form-group col-md-12">
							No Telpon : <?php echo $_POST['telpon']; ?>
							</div>
							<div class="form-group col-md-12">
							Alamat : <?php echo $_POST['alamat']; ?>
							</div>
						</form>
						<?php
						$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_member (id_order,nama,alamat,email,no_hp)
						VALUES ('$_POST[idorder]','$_POST[nama]','$_POST[alamat]','$_POST[email]','$_POST[telpon]')");
						?>
						</div>
					</div>
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
					</tr>
				</thead>
				<tbody>
				<?php
				$idor=$_POST['idorder'];
				$r = mysqli_query($koneksi, "SELECT * FROM tbl_detail_order,tbl_produk
				WHERE tbl_detail_order.id_produk=tbl_produk.id_produk AND id_order='$idor'");
				
				$total=0;
				while ($d = mysqli_fetch_array($r)) {
					$subtotal = $d['harga'] * $d['jumlah'];
					$total = $total + $subtotal;
						?>
							<tr>
								<td class="cart_product">
									<a href=""><img src="admin/upload/<?php echo $d['gambar'];?>" alt=""></a>
								</td>
								<td class="cart_description">
									<h4><a href=""><?php echo $d['nama_produk'];?></a></h4>
								</td>
								<td class="cart_price">
									<p><?php echo $d['harga'];?></p>
								</td>
								<td class="cart_quantity">
									<?php echo $d['jumlah'];?>
								</td>
								<td class="cart_total">
									<p class="cart_total_price"><?php echo $subtotal;?></p>
								</td>
							</tr>
							<?php } ?>
							<tr>
								<td colspan="4">&nbsp;</td>
								<td colspan="2">
									<table class="table table-condensed total-result">
										<tr>
											<td>Biaya Kirim</td>
											<td><span>Rp. <?php echo $_POST['kota']; ?></span></td>
										</tr>
										<tr>
											<td>Total</td>
											<td><span>Rp. <?php echo $total+$_POST['kota']; ?></span></td>
										</tr>
									</table>
								</td>
							</tr>
				
				</tbody>
				</table>

				<a href="index.php"><button class="btn btn-default get">Kembali</button></a>
			</div>
		</div>
	</section> <!--/#cart_items-->

	
	
	<script src="asset/js/jquery.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/jquery.scrollUp.min.js"></script>
<script src="asset/js/price-range.js"></script>
<script src="asset/js/jquery.prettyPhoto.js"></script>
<script src="asset/js/main.js"></script>
</body>
</html>