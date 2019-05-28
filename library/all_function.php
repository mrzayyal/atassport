<?php
include 'koneksi.php';

session_start();
 function cek_login(){	
	$hasil = 0;
	if (!empty($_SESSION["email"]) && !empty($_SESSION["pass"])){
		$hasil = 1;
	}
	return $hasil;
  }
  
function cek_user($email,$pass){

	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$sql 	 = "select * from dtmember where email='$email' and katasandi='$pass'";
	$query 	 = mysqli_query($link,$sql);
	$cekAda  = mysqli_num_rows($query);		
	return $cekAda;
}

function banner(){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$sql 	 = "select * from dt_banner";
	$query 	 = mysqli_query($sql,$link);
	while ($fetch = mysqli_fetch_array($query)) {
		$file = "foto_banner/".$fetch["foto"];
		?>
		<li>
			<img src="<?php echo $file ?>"/>
		</li>
		<?php
	}
}

function cek_email($email){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
    $mail = $email;
	$sql = "select * from dtmember where email='$mail'";
	$res = mysqli_query($sql,$link_sql);
	$jml = mysqli_num_rows($res);
	$hasil = 0;	
	if ($jml>0) {
	  $hasil = 1;
	}	
	return $hasil;
}

function index($halaman=1, $max_item = 8){	
$koneksi = new koneksi();
$link = $koneksi->sql_link();
$link_sql = $link;
$start = ($halaman>1) ? ($halaman * $max_item) - $max_item : 0;
$res = mysqli_query($link_sql,"SELECT * from dt_products WHERE status = 'ready' LIMIT ".$start.",".$max_item."");
?>
<div class="text-center"><h4><b style="border-bottom: 2px solid #b2b2b2;">OUR PRODUCTS</b></h4>
</div>
<br>
<br>
<?php 
while($_fetch = mysqli_fetch_array($res)){
	$id_product = $_fetch["id_product"];
	$nm_product = $_fetch["nm_product"];
	$ktgori = $_fetch["kategori"];
	$harga = $_fetch["hrg_product"];
	$foto = $_fetch["foto"];
?>
<li class="span3" style="padding-bottom:10px;">
	<div class="product-box">
		<span class="sale_tag"></span>														
		<a href='product_detail.php?id=<?php echo $id_product ?>&act=1'><img alt="" src="<?php echo "foto_products/".$foto?>"></a><br/>
			<a href='product_detail.php?id=$id_product&act=1' class="title" style="letter-spacing: 2px; color: #b2b2b2"><?php echo $nm_product ?></a><br/>
			<p class="category" style="color: #177702; font-weight: bold;"><?php echo "Rp. ".number_format($harga,0,",",".") ?></p>
	</div>
</li>       
<?php
	}
}

function paging(){	

$koneksi = new koneksi();
$link = $koneksi->sql_link();
$link_sql = $link;
$max_item = 4;		
$mysql = mysqli_query($link_sql,"SELECT * FROM dt_products");
$rows = mysqli_num_rows($mysql);
$nopages = ceil($rows/$max_item);
return $nopages;
}

function dt_products1(){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$sql = "select * from dt_products where status = 'tersedia' ";
	$res = mysqli_query($sql,$link_sql);
	for ($max_img=1; $max_img<=4;){ 
		$dtproduct = mysqli_fetch_array($res);		
			$id = $dtproduct["id_product"];
			echo"<li class='span3'>
				<div class='product-box'>
					<span class='sale_tag'></span>
					<p><a href='product_detail.php?id=$id&act=1'><img src='foto_products/".$dtproduct['foto']."' alt='' /></a></p>
					<a href='product_detail.php?id=$id&act=1' class='title'>".$dtproduct["nm_product"]." </a><br/>
					<a href='products.php' class='category'>Commodo consequat</a>
					<p class='price'>Rp.".$dtproduct["hrg_product"]." </p>
					<a onclick='detail(\"".$id."\")'' class='btn btn-info btn-xs'>lihat</a>
				</div>
			</li>";
			 $max_img++;
	}
}

function detail_brg($id){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$sql = "select * from dt_products where id_product = '$id' ";
	$res = mysqli_query($link_sql,$sql);
	$detail_product = mysqli_fetch_array($res);	
	?>
	<address>
	<strong style="letter-spacing: 3px; text-transform: uppercase;"><span style="color:#177702;" ><?php echo $detail_product['nm_product']; ?></span></strong><br>
	<strong style="letter-spacing: 3px; text-transform: uppercase;">Id Product  <span style="color:#177702;" ><?php echo $detail_product['id_product']; ?></span></strong><br>
	<strong style="letter-spacing: 3px; text-transform: uppercase;">Status Product  <span style="color:#177702;"><?php echo $detail_product['status']; ?></span></strong><br>								
	</address>								
	<h4><strong><?php echo"Rp. ".number_format($detail_product['hrg_product'],0,",","."); ?></strong></h4>
	<?php
}
function plh_ukuran($id){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$sql = "select ukuran from dt_products where id_product = '$id' ";
	$res = mysqli_query($link_sql,$sql);
	$detail_ukuran = mysqli_fetch_array($res);	
	$ukuran[] = $detail_ukuran["ukuran"];
	$str_ukuran= implode("", $ukuran);
	$n_ukuran= explode(",", $str_ukuran);
	return $n_ukuran;

}

function plh_warna($id){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$sql = "select warna from dt_products where id_product = '$id' ";
	$res = mysqli_query($link_sql,$sql);
	$detail_warna = mysqli_fetch_array($res);	
	$warna[] = $detail_warna["warna"];
	$str_warna = implode("", $warna);
	$n_warna = explode(",", $str_warna);
	return $n_warna;

}

function harga($id){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$sql = "select hrg_product from dt_products where id_product = '$id' ";
	$res = mysqli_query($link_sql,$sql);
	$detail_harga = mysqli_fetch_array($res);		
	$harga[] = $detail_harga["hrg_product"];
	return $harga;

}

function order_brg($id,$ttl_order,$ukuran,$warna,$ttl_harga,$email,$brand){
	$id_member = $_SESSION["id_member"];
	$tgl_order = date("Y-m-d");
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;	
	$query_getid = "SELECT * FROM dt_products where id_product = '$id'";
	$sql_getid = mysqli_query($link_sql,$query_getid);
	$fetch_product = mysqli_fetch_array($sql_getid);
	$nm_product = $fetch_product["nm_product"];
	$kategori = $fetch_product["kategori"];
	$hrg_product = $fetch_product["hrg_product"];
	$keterangan = $fetch_product["keterangan"];	
	$id_order = last_id();
	$sql = "INSERT INTO 
	dt_order(id_order,id_product,id_member,nm_product,kategori,hrg_product,jmh_order,keterangan,warna,ukuran,ttl_harga,tgl_order,upload,status_pembayaran,email,status_order,brand) 

VALUES('$id_order','$id','$id_member','$nm_product','$kategori','$hrg_product','$ttl_order','$keterangan','$warna','$ukuran','$ttl_harga','$tgl_order','none','none','$email','process','$brand')";
	$res = mysqli_query($link_sql,$sql);

	if ($res) {
		echo "<script language='javascript'>alert('Data Pesanan Berhasil Disimpan');</script>";
			echo "<script language='javascript'>window.location = 'index.php?page=cart'</script>";
	}
	else{die(mysqli_error($link_sql));}
	
}
function last_id(){
	$id_member = $_SESSION["id_member"];
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;		
	//lihat id order
	$query1 = mysqli_query($link_sql,"SELECT id_order FROM dt_order where id_member = '$id_member'");
	$num = mysqli_num_rows($query1);
	if ($num > 0) {		
	$id_awal = 001;
	$query_order = mysqli_query($link_sql,"SELECT id_order FROM dt_order where id_member = '$id_member' ORDER BY id_order DESC LIMIT 1");
	$fetch = mysqli_fetch_array($query_order);
	$arf[] = $fetch["id_order"];
	$imp = implode("", $arf);
	$n_order = (int)$imp + $id_awal;

	}else{
		$n_order = 001;
	}

	return $n_order;
}

function cek_order(){
	$id_member = $_SESSION["id_member"];
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$query= "SELECT * FROM dt_order where id_member = '$id_member' AND upload= 'none'";
	$sql_order = mysqli_query($link,$query);
	$row = mysqli_num_rows($sql_order);

	return $row;
}

function get_order(){	
	$id_member = $_SESSION["id_member"];
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$sql_getid = mysqli_query($link_sql,"SELECT * FROM dt_order where id_member = '$id_member' AND upload ='none'");
	while ($fetch_product = mysqli_fetch_array($sql_getid)) {
	$id_order = $fetch_product["id_order"];				
	$id_product = $fetch_product["id_product"];			
	$nm_product = $fetch_product["nm_product"];			
	$hrg_product = $fetch_product["hrg_product"];			
	$ttl_harga = $fetch_product["ttl_harga"];			
	$ukuran = $fetch_product["ukuran"];			
	$warna = $fetch_product["warna"];			
	$jmh_order = $fetch_product["jmh_order"];			
	$tgl_order = $fetch_product["tgl_order"];				
	$sql_foto = mysqli_query($link_sql,"SELECT foto FROM dt_products where nm_product = '$nm_product'");
	$fetch_foto = mysqli_fetch_array($sql_foto);
	$foto = $fetch_foto["foto"];
	?>
	<tr>
		<td><a href='cart.php?act=del&id_ord=<?php echo $id_order?>&id_member=<?php echo $id_member ?>'><i class="fa fa-trash-o"></i></a></td>
		<td><?php echo $id_order;?></td>
		<td><?php echo $id_product;?></td>
		<td><a href='product_detail.php?id=<?php echo $id_product ?>&act=1'><img class="img-product" alt="" src="<?php echo "foto_products/".$foto?>"></a></td>
		<td><?php echo $nm_product;?></td>
		<?php echo '<td><input type="text" placeholder='.$jmh_order.' class="input-mini" readonly></td>';?>
		<td><?php echo "Rp. ".number_format($hrg_product,0,',','.');?></td>
		<td><?php echo "Rp. ".number_format($ttl_harga,0,',','.');?></td>
		<td><?php echo $ukuran;?></td>
		<td><?php echo $warna;?></td>
		<td><?php echo $tgl_order;?></td>
	</tr>			  
		
	<?php
	}
}
function get_total(){
	$id_member = $_SESSION["id_member"];
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$sql_count = mysqli_query($link_sql,"SELECT SUM(ttl_harga) as totalharga FROM dt_order WHERE id_member = '$id_member' AND upload ='none' AND status_pembayaran ='none'");
	$fetch_count = mysqli_fetch_array($sql_count);	
	$ttl_harga[] = $fetch_count["totalharga"];
	$str_total = implode("", $ttl_harga);
	return $str_total;
}

function pengiriman(){

	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$sql_kurir = mysqli_query($link_sql,"SELECT * FROM dt_pengiriman");
	while($fetch_kurir = mysqli_fetch_array($sql_kurir)){

		$dt_kurir[] = $fetch_kurir;
	}	
	
	return $dt_kurir;
}
function get_idorder($id_member){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$status = "none";
	$sql_order = mysqli_query($link_sql,"SELECT id_order FROM dt_order WHERE id_member = '$id_member' AND upload ='$status'");	
	$num = mysqli_num_rows($sql_order);
	if ($num > 0 ) {		
		while ($fetch_order = mysqli_fetch_array($sql_order)) {
			$id=  $fetch_order["id_order"];
			echo"<option value=".$id."> ".$id."</option>";
		}
	}
	else{

	}

}

function confirm_order($id_order){	
	$id_member = $_SESSION["id_member"];
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$sql_order = mysqli_query($link_sql,"SELECT * FROM dt_order 
		INNER JOIN dt_products ON dt_order.id_product = dt_products.id_product
		WHERE id_order = '$id_order' AND id_member = '$id_member'");	
	$fetch_order = mysqli_fetch_array($sql_order);
	$data[] = $fetch_order;			
	return $data;
}

	function confirm_pembayaran($id_order,$an_rek,$bank_tjn,$tgl_trf,$nom_trf,$nm_foto,$tmp_name){
		$koneksi = new koneksi();
		$link = $koneksi->sql_link();
		$link_sql = $link;
		$id_member = $_SESSION["id_member"];
		$file = "bukti_trf/";
		$upd_status = "success";
		if (file_exists($file)) {
			if(!file_exists($file."/$id_member")){
				if(mkdir($file."/".$id_member)){
					if (move_uploaded_file($tmp_name,$file."/".$id_member."/".$nm_foto)) {
				$sql = mysqli_query($link_sql,"INSERT INTO dt_upload
					(id_order,id_member,an_rek,bank_tjn,nom_trf,bukti_trf,tgl_trf)
					VALUES('$id_order','$id_member','$an_rek','$bank_tjn','$nom_trf','$nm_foto','$tgl_trf')");

				$sql2 = mysqli_query($link_sql,"UPDATE dt_order set upload ='$upd_status' WHERE id_order = '$id_order' AND id_member='$id_member'");
						if ($sql == true && $sql2 == true) {										
							echo "<script language='JavaScript'>";
								echo "alert('Data Transaksi Berhasil Disimpan'); ";
								echo "document.location='index.php?page=checkout';";
	 							echo "</script>";	
						}
						else{
							mysqli_error($link_sql);
						}
					}			
				}
			}		
			//else make folder
			elseif(file_exists($file."/$id_member")){
				if (move_uploaded_file($tmp_name,$file."/".$id_member."/".$nm_foto)) {
				$sql = mysqli_query($link_sql,"INSERT INTO dt_upload
					(id_order,id_member,an_rek,bank_tjn,nom_trf,bukti_trf,tgl_trf)
					VALUES('$id_order','$id_member','$an_rek','$bank_tjn','$nom_trf','$nm_foto','$tgl_trf')");			
				$sql2 = mysqli_query($link_sql,"UPDATE dt_order set upload ='$upd_status' WHERE id_order = '$id_order' AND id_member='$id_member'");
					if ($sql == true && $sql2 == true) {					
							echo "<script language='JavaScript'>";
							echo "alert('Data Transaksi Berhasil Disimpan'); ";
							echo "document.location='index.php?page=checkout';";
	 						echo "</script>";	
					}
					else{
						echo mysqli_error($link_sql);
					}
				}			
			}
		}
	}

function order_histori(){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$query_histori = "SELECT * FROM dt_order WHERE status_pembayaran = 'success' AND upload='success' ";
	$sql = mysqli_query($link_sql,$query_histori);
	while ($fetch = mysqli_fetch_array($sql)) {
		$data[] = $fetch;
	}
	return $data;
}

function profil(){

	$id_member = $_SESSION["id_member"];
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$query_histori = "SELECT * FROM dtmember WHERE id_member = '$id_member'";
	$sql = mysqli_query($link_sql,$query_histori);
	$fetch = mysqli_fetch_array($sql);
	$data[] = $fetch;	
	return $data;
}

function get_image($id_product){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$sql = mysqli_query($link_sql,"SELECT foto,nm_product FROM dt_products WHERE id_product = '$id_product'");
	$fetch = mysqli_fetch_array($sql);
	$foto = $fetch["foto"];
	$nm_product = $fetch["nm_product"];
	?>
	<a href="<?php echo "foto_products/".$foto?>" class="thumbnail" data-fancybox-group="group1" title="<?php echo $nm_product ?>"><img alt="" src="<?php echo "foto_products/".$foto?>"></a>
	<?php	
}

function get_products($id_product){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$sql = mysqli_query($link_sql,"SELECT * FROM dt_products WHERE id_product = '$id_product'");
	$fetch_product = mysqli_fetch_array($sql);
	$data[] = $fetch_product;
	return $data;

}

function contact(){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$sql = mysqli_query($link_sql,"SELECT * FROM contact_us");
	$fetch_product = mysqli_fetch_array($sql);
	$data[] = $fetch_product;
	return $data;
}
 function best_seller(){
 	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$link_sql = $link;
	$sql = mysqli_query($link_sql,"SELECT COUNT(id_product) AS adet, id_product FROM  dt_order WHERE id_order !=000 GROUP BY id_product
ORDER BY adet  DESC");
	while ($fetch_product = mysqli_fetch_array($sql))
	{	
	if ($fetch_product) {
		$row = $fetch_product["adet"];		
	?>
	<img src="themes/images/ladies/3.jpg" alt="Praesent tempor sem sodales">
	<?php
	}
	
	else{die(mysql_error());}
}
 }

function product_carousel($start=0, $max_item=8){
 $koneksi = new koneksi();
$link = $koneksi->sql_link();
$link_sql = $link;
$res = mysqli_query($link_sql,"SELECT * from dt_products WHERE status = 'ready'");
?>

<div class="active item">
<ul class="thumbnails listing-products">
<?php
	for ($i=0; $i<3; $i++) { 
	$fetch = mysqli_fetch_array($res);
	$id_product	 = $fetch["id_product"];
	$nm_product	 = $fetch["nm_product"];
	$ktgori 	 = $fetch["kategori"];
	$harga 		 = $fetch["hrg_product"];
	$foto 		 = $fetch["foto"];
?>
		<li class="span3">
			<div class="product-box">
				<span class="sale_tag"></span>												
				<a href="product_detail.php?id=<?php echo $id_product?>&act=1"><img alt="" src="<?php echo "foto_products/".$foto?>"></a><br/>
				<a href="product_detail.html" class="title"><span style="color:#177702; font-size: 10px;"><?php echo $nm_product ?></span></a><br/>
				<p class="category" style="font-weight: bold;"><?php echo "Rp. ".number_format($harga,0,",",".")?></p>
			</div>
		</li>
<?php
}
?>
</ul>
</div>
<div class="item">
	<ul class="thumbnails listing-products">
		<?php
		for ($i=0; $i<3; $i++) { 
		$fetch = mysqli_fetch_array($res);
		$id_product	 = $fetch["id_product"];
		$nm_product	 = $fetch["nm_product"];
		$ktgori 	 = $fetch["kategori"];
		$harga 		 = $fetch["hrg_product"];
		$foto 		 = $fetch["foto"];
		?>
		<li class="span3">
			<div class="product-box">
				<span class="sale_tag"></span>												
				<a href="product_detail.html"><img alt="" src="<?php echo "foto_products/".$foto?>"></a><br/>
				<a href="product_detail.html" class="title"><?php echo $nm_product ?></a><br/>
				<a href="#" class="category"><?php echo $ktgori ?></a>
				<p class="category"><?php echo "Rp. ".number_format($harga,0,",",".")?></p>
			</div>
		</li>
	<?php
	}
	?>
	</ul>
	</div>
<?php
 }

function get_jasa(){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$sql 	 = "SELECT * FROM dt_pengiriman";
	$sql_kurir 	 = mysqli_query($link,$sql);
	while ($fetch_kurir = mysqli_fetch_array($sql_kurir)) {
		$data[] = $fetch_kurir;
	}
	return $data;

}

function delete_order($id_order,$id_member)
{
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$query = mysqli_query($link_sql,"DELETE FROM dt_order WHERE id_order = '$id_order' AND id_member = '$id_member'");		
	if (isset($id_member)&&isset($id_order)) {
		if($query){
			echo "<script language='javascript'>alert('Pesenan Berhasil Di Batalkan');</script>";
			echo "<script language='javascript'>window.location = 'cart.php'</script>";
		}
		else{
			die(mysqli_error());
		}
	}
	else{

	}
}

function edit_profile($id_member,$nama,$email,$notelp,$alamat,$kota,$password){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();	
	$query = mysqli_query($link,"UPDATE dtmember set nama = '$nama', email = '$email', tlp = '$notelp', alamat = '$alamat', kota = '$kota', katasandi = '$password' WHERE id_member='$id_member'");
	if ($query) {
		echo "<script language='javascript'>alert('Data Profil Berhasil Di Perbaharui');</script>";
		echo "<script language='javascript'>window.location = 'profil.php'</script>";
	}
	else{
		die(mysqli_error());	
	}
}
function komplain($id_member,$nama,$email,$message,$tgl){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();	
	echo $nama,$email,$message,$tgl;
	$query = mysqli_query($link,"INSERT INTO dt_komplain nama,email,message,tgl VALUES('$nama','$email','$message','$tgl')");
	if ($query) {
		echo "<script language='javascript'>alert('Pesan Berhasil Di Kirim');</script>";
		echo "<script language='javascript'>window.location = 'profil.php'</script>";
	}
	else{
		die(mysqli_error());	
	}
}

function atasan($halaman=1, $max_item = 8){	
$koneksi = new koneksi();
$link = $koneksi->sql_link();
$link_sql = $link;
$start = ($halaman>1) ? ($halaman * $max_item) - $max_item : 0;
$res = mysqli_query($link_sql,"SELECT * from dt_products WHERE status = 'ready' AND kategori = 'atasan' LIMIT ".$start.",".$max_item."");
while($_fetch = mysqli_fetch_array($res)){
	$id_product = $_fetch["id_product"];
	$nm_product = $_fetch["nm_product"];
	$ktgori = $_fetch["kategori"];
	$harga = $_fetch["hrg_product"];
	$foto = $_fetch["foto"];
?>
<li class="span3">
	<div class="product-box">
		<span class="sale_tag"></span>														
		<a href='product_detail.php?id=<?php echo $id_product ?>&act=1'><img alt="" src="<?php echo "foto_products/".$foto?>"></a><br/>
			<a href='product_detail.php?id=$id_product&act=1' class="title" style="letter-spacing: 2px; color: #b2b2b2"><?php echo $nm_product ?></a><br/>
			<p class="category" style="color: #177702; font-weight: bold;"><?php echo "Rp. ".number_format($harga,0,",",".") ?></p>
	</div>
</li>       
<?php
	}
}

function paging_atasan(){	

$koneksi = new koneksi();
$link = $koneksi->sql_link();
$link_sql = $link;
$max_item = 4;		
$mysql = mysqli_query($link_sql,"SELECT * FROM dt_products WHERE status = 'ready' AND kategori = 'atasan'");
$rows = mysqli_num_rows($mysql);
$nopages = ceil($rows/$max_item);
return $nopages;
}



function bawahan($halaman=1, $max_item = 8){	
$koneksi = new koneksi();
$link = $koneksi->sql_link();
$link_sql = $link;
$start = ($halaman>1) ? ($halaman * $max_item) - $max_item : 0;
$res = mysqli_query($link_sql,"SELECT * from dt_products WHERE status = 'ready' AND kategori = 'atasan' LIMIT ".$start.",".$max_item."");
while($_fetch = mysqli_fetch_array($res)){
	$id_product = $_fetch["id_product"];
	$nm_product = $_fetch["nm_product"];
	$ktgori = $_fetch["kategori"];
	$harga = $_fetch["hrg_product"];
	$foto = $_fetch["foto"];
?>
<li class="span3">
	<div class="product-box">
		<span class="sale_tag"></span>														
		<a href='product_detail.php?id=<?php echo $id_product ?>&act=1'><img alt="" src="<?php echo "foto_products/".$foto?>"></a><br/>
			<a href='product_detail.php?id=$id_product&act=1' class="title" style="letter-spacing: 2px; color: #b2b2b2"><?php echo $nm_product ?></a><br/>
			<p class="category" style="color: ##177702; font-weight: bold;"><?php echo "Rp. ".number_format($harga,0,",",".") ?></p>
	</div>
</li>       
<?php
	}
}

function paging_bawahan(){	

$koneksi = new koneksi();
$link = $koneksi->sql_link();
$link_sql = $link;
$max_item = 4;		
$mysql = mysqli_query($link_sql,"SELECT * FROM dt_products WHERE status = 'ready' AND kategori = 'atasan'");
$rows = mysqli_num_rows($mysql);
$nopages = ceil($rows/$max_item);
return $nopages;
}

function brand(){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$query = "SELECT * FROM dt_brand";
	$sql = mysqli_query($link,$query);
	while ($dt = mysqli_fetch_array($sql)) {
			$data[] = $dt;
	}
	return $data;
}

function get_kategori(){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$query = "SELECT * FROM dt_kategori";
	$sql = mysqli_query($link,$query);
	while ($dt = mysqli_fetch_array($sql)) {
			$data[] = $dt;
	}
	return $data;
}

function cont_brand($brand){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$query = mysqli_query($link,"SELECT * FROM dt_products WHERE brand ='$brand' AND status ='ready'");
	$num = mysqli_num_rows($query);
	if ($num > 0) {
		while($fetch = mysqli_fetch_array($query)){
			$data[] =  $fetch;
		}
		return json_encode($data);
	}
}

function get_brand($id){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$query = "SELECT * FROM dt_products WHERE id_product ='$id'";
	$sql = mysqli_query($link,$query);
	$dt = mysqli_fetch_array($sql);
	return $dt;
}

function cont_kategori($kategori){
	$koneksi = new koneksi();
	$link = $koneksi->sql_link();
	$query = mysqli_query($link,"SELECT * FROM dt_products WHERE kategori ='$kategori' AND status ='ready'");
	$num = mysqli_num_rows($query);
	if ($num > 0) {
		while($fetch = mysqli_fetch_array($query)){
			$data[] = $fetch;
		}
		
		return json_encode($data);
	}
}
?>	