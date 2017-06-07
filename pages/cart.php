<?php  
$sid = session_id();
?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
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
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					$sql = mysqli_query($koneksi, "SELECT * FROM tbl_order, tbl_produk WHERE 
					tbl_order.id_session='$sid' AND tbl_order.id_produk=tbl_produk.id_produk");       
					while($d=mysqli_fetch_array($sql)){
					$subtotal    = $d['harga']* $d['jumlah'];
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
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>

				<?php } ?>
					</tbody>
				</table>
			</div>
			<a href="cekout.php" class="btn btn-default add-to-cart"></i>Selesai Belanja</a>
		</div>
	</section> <!--/#cart_items-->