<?php 
if (isset($_GET["act"]) == "del") {
	delete_order($_GET["id_ord"],$_GET["id_member"]);
}
?>

<div class="w-img text-center">
	<img src="icon/logo.png" class="logo-img">
</div>
<section class="main-content">				
	<div class="row">
		<div class="span11">					
			<h4 class="title"><span class="text"><strong style="color:#177702;">Daftar</strong> Belanjaan</span></h4>
			<table class="table table-striped table-cart">
				<thead>
					<tr>
						<td>Batal</td>
						<td>ID Order</td>
						<td>ID Product</td>
						<td>Foto Product</td>
						<td>Nama Product</td>
						<td>Jumlah Order</td>
						<td>Harga Product</td>
						<td>Total Harga</td>
						<td>Jenis</td>
						<td>Satuan</td>
						<td>Tanggal Order</td>
					</tr>
				</thead>
				<tbody>
					<?php
					echo get_order();
					?>
				</tbody>
			</table>			
			<hr>
			<p class="cart-total right">
				<?php $total = get_total(); ?>
		<strong>Total Pembayaran : Rp. </strong><?php echo number_format($total,0,',','.'); ?><br>
			</p>
			<hr/>
			<p class="btn-sbmt">				
				<a href="index.php?page=checkout"t class="btn btn-info btn-xs" type="submit" id="checkout" >submit <i class="fa fa-check"></i></a>
			</p>					
		</div>						
	</div>
</section>			
