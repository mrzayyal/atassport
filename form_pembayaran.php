<?php
include 'library/all_function.php';
$dt_order = confirm_order($_GET["id_order"]);
?>
<div class="" style="margin-top: -20px;">
<table class="table table-border">
	<thead>
		<th>DATA PRODUCT</th>
	</thead>
	<?php
	foreach ($dt_order as $data) {
	$id_order 		= $data["id_order"];			
	$nm_product 	= $data["nm_product"];			
	$id_product 	= $data["id_product"];			
	$hrg_product 	= $data["hrg_product"];			
	$ttl_harga 		= $data["ttl_harga"];			
	$ukuran 			= $data["ukuran"];			
	$warna			= $data["warna"];			
	$jmh_order 		= $data["jmh_order"];			
	$tgl_order 		= $data["tgl_order"];			
	$tgl_order 		= $data["tgl_order"];			
	$nm_foto		= $data["foto"];			
	$img 			= "foto_products/".$nm_foto;
	?>
	<tbody>		
		<tr>
			<td><?php echo "<img src=".$img.">"; ?></td>
		</tr>		
		<tr>
			<td>ID Product</td>
			<td><?php echo $id_order; ?></td>
		</tr>		
		<tr>
			<td>Nama Product</td>
			<td><?php echo $nm_product; ?></td>
		</tr>

		<tr>
			<td>Harga Product</td>
		<td><?php echo "Rp. ".number_format($hrg_product,0,',','.');?></td>
		</tr>

		<tr>
			<td>Jumlah Pesanan</td>
			<td><?php echo $jmh_order; ?></td>
		</tr>

		<tr>
			<td>Warna</td>
			<td><?php echo $warna; ?></td>
		</tr>

		<tr>
			<td>Ukuran</td>
			<td><?php echo $ukuran; ?></td>
		</tr>

		<tr>
			<td>Tanggal Pemesanan</td>
			<td><?php echo $tgl_order; ?></td>
		</tr>

		<tr>
			<td>Total Harga Pesanan</td>
		<td><?php echo "Rp. ".number_format($ttl_harga,0,',','.');?></td>
		</tr>
	</tbody>
	<?php
}
?>
</table>

<button class='btn-info btn btn-sm' id='btn-mod' data-toggle="modal" data-target="#myModal">Konfirmasi</button>


<div id="myModal" style="display: none;" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">FORM KONFIRMASI PEMBAYARAN</h4>
      </div>
      <div class="modal-body">
      	<!-- < Form Pembayaran -->
	<form name="upload" method="POST" enctype="multipart/form-data">
		<div class="form-group">										
		<label style="font-weight: bold">ID ORDER</label>
			<input type="text" class="form-control" name="id_order" placeholder="Masukan ID Transaksi Pembayaran" value="<?php echo $id_order; ?>" style="width: 300px;" readonly>
	</div>
	<br/>
	<div class="form-group">										
		<label style="font-weight: bold">NAMA PEMILIK REKENING</label>
			<input type="nama" class="form-control" name="an_rek" placeholder="Masukan Nama Pemilik Rekening" style="width: 300px;" required>
	</div>
	<br/>
	<div class="form-group">										
		<label style="font-weight: bold">NOMINAL TRANSFER</label>
			<?php echo '<input type="nama" class="form-control" name="nom_trf" onchange="val_harga(\''.$ttl_harga.'\',this.value)" placeholder="Masukan Nama Pemilik Rekening" style="width: 300px;" required>';?><span id="vnote"></span>
	</div>
	<br/>
	<div class="form-group">										
		<label style="font-weight: bold">PILIH BANK TUJUAN TRANSFER</label>
			<select class="form-control" name="bank_tjn">
				<option value="BCA">BCA</option>
				<option value="MANDIRI">MANDIRI</option>
			</select>
	</div>
	<br/>
	<div class="form-group">										
		<label style="font-weight: bold">FOTO BUKTI PEMBAYARAN</label>
			<input type="FILE" class="form-control" name="upload_foto" required>
	</div>
	<br/>	
	<div class="form-group">     
     <button type="submit" class="btn btn-default btn-sm" name="btn_upload" id='btn_upload' value="submit">Submit Pembayaran</button>
    </div>
</form>
<!-- < End -->
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" value="submit">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
</div>
<script>
	$(document).ready(function(){
		$("#btn-mod").click(function(){
			$("#myModal").css("display","block");
		})
	});

	
	
</script>