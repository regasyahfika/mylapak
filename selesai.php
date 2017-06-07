<?php
include "lib/koneksi.php";
$sid = session_id();
//fungsi untuk mendapatkan isi keranjang belanja
function isi_keranjang(){
	include "lib/koneksi.php";
	$isikeranjang = array();
	$sid = session_id();
	$sql = mysqli_query($koneksi, "SELECT * FROM tbl_order WHERE id_session='$sid'");
	while ($r = mysqli_fetch_array($sql)) {
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
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Check out</li>
				</ol>
			</div><!--/breadcrumbs-->
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-8">
						<div class="shopper-info">
						<p>Masukkan Data Konsumen</p>
						<form id="main-contact-form" class="contact-form row" action="terimakasih.php" name="contact-form" method="post">
							<input type="hidden" name="idorder" value="<?php echo $id_orders; ?>">
							<div class="form-group col-md-6">
							<input type="text" name="nama" class="form-control" required="required" placeholder="Nama">
							</div>
							<div class="form-group col-md-6">
							<input type="email" name="email" class="form-control" required="required" placeholder="Email">
							</div>
							<div class="form-group col-md-6">
							<input type="text" name="telpon" class="form-control" required="required" placeholder="No Telpon">
							</div>
							<div class="form-group col-md-6">
							<select class="form-control" name="kota">
							<?php
							$q=mysqli_query($koneksi, "SELECT * FROM tbl_biaya_kirim");
							while($r=mysqli_fetch_array($q)){
							?>
								<option value="<?php echo $r['biaya'];?>"><?php echo $r['kota'];?></option>
							<?php } ?>
							</select>
							</div>
							<div class="form-group col-md-12">
								<textarea name="alamat" id="alamat" required="required" class="form-control" rows="4" placeholder="Alamat"></textarea>
							</div>
							<div class="form-group col-md-12">
								<input type="submit" name="submit" class="btn btn-primary pull-right" value="Selesai">
							</div>
						</form>
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
				$r = mysqli_query($koneksi, "SELECT * FROM tbl_detail_order,tbl_produk
				WHERE tbl_detail_order.id_produk=tbl_produk.id_produk AND id_order='$id_orders'");
				
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
							<tr>
								<td colspan="4">&nbsp;</td>
								<td colspan="2">
									<table class="table table-condensed total-result">
										<tr>
											<td>Total</td>
											<td><span>Rp. <?php echo $total; ?></span></td>
										</tr>
									</table>
								</td>
							</tr>
				
				</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<?php
	}
	?>