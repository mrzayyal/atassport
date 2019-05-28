<?php
include 'library/all_function.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>APOTEK MADINA</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/xnew_main.css" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
				
		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<script src="themes/js/jquery.fancybox.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4"><a href="index.html" class="logo pull-left"></a>
				</div>				
				<section class='nav_user'>			
					<?php include 'index/nav_user.php'; ?>
				</section>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">			
			<?php include 'index/navbar.php'; ?>
			
			<section class="main-content">				
				<div class="row">						
					<div class="span12 text-center">						
				<h3 style="text-transform: uppercase; color: #b2b2b2"><span style="color: #177770;">Product</span> Detail</h3>
					</div>
				</div>

				<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">
								<?php $data =  get_image($_GET['id']); ?>

							</div>
							<div class="span5">								
									<?php echo detail_brg($_GET['id']); ?>
							</div>
							<div class="span5">
								<?php
								if (isset($_POST["btn_order"])) {
									if (empty($_SESSION["email"]) && empty($_SESSION["pass"])){
										echo "<h5 style='color:red'>Maaf Silahkan Login Terlebih Dahulu Untuk Melakukan Pemesanan</h5>";
									}
									else{
										order_brg(
											$_POST["id"],
											$_POST["ttl_order"],
											$_POST["warna"],
											$_POST["ukuran"],
											$_POST["ttl_harga"],
											$_SESSION["email"],
											$_POST["brand"]
										);
									}
								}
								?>
								<form class="form-inline" method="POST" action="" name="fm_order">
									<?php $brand = get_brand($_GET["id"]); ?>
									<input type="hidden" name="brand" value=<?php $brand["brand"] ?>>
									<div class="form-group">
										<label style="font-weight: bold"></label>
										<?php echo "<input type='hidden' name='id' value=".$_GET["id"]." required>";?>
									</div>
									
									<div class="form-group">
										<label style="font-weight: bold">Banyak Jumlah Pesanan</label>										
									<br/>
									<?php
									$harga = harga($_GET["id"]);
									$hrg = implode("", $harga);
									echo"
											<select name='ttl_order' class='form-control' id='ttl_order' required>			
										<option value=''>Jumlah Pesanan</option>";
									$max_order = 10;
									for ($jmh_order=1; $jmh_order <= $max_order;) { 
									 echo"<option value='$jmh_order'>$jmh_order</option>"; 
									$jmh_order++;
									}?>
										</select>
									</div>
									<div class="form-group">
										<label style="font-weight: bold">Pilihan Warna </label>										
									<br/>
											<select name="warna" class="form-control" required>
											<option value=""> Pilih Warna</option>
										<?php
										$warna = plh_warna($_GET["id"]);
										foreach ($warna as $arwarna) {
											echo "<option value='".$arwarna."'>".$arwarna."</option>";
										}
										?>
									</select>
									</div>
									<div class="form-group">
										<label style="font-weight: bold">Pilihan Ukuran</label>
									<br/>
										<select name="ukuran" class="form-control" required>
											<option value=""> Pilih Ukuran</option>
										<?php
										$ukuran =plh_ukuran($_GET["id"]);
										foreach ($ukuran as $arukuran) {
											echo "<option value='".$arukuran."'>".$arukuran."</option>";
										}
										?>
										</select>
									</div>
									<div class="form-group">
										<label style="font-weight: bold">Pilihan Jasa Pengiriman</label>
									<br/>
										<?php echo" <select name='dt_pengiriman' class='form-control' onchange='jasa(\"".$hrg."\",this.value)' required>"?>
											<option value="">Pilih Jasa Pengiriman</option>
										<?php
										$jasa =get_jasa();
										foreach ($jasa as $arjasa) {
											echo "<option value='".$arjasa["nama"]."'>".$arjasa["nama"]."</option>";
										}
										?>	
									</select>
									</div>
									<div id="dt_jasa">										
									</div>

									<div class="form-group">
										<label style="font-weight: bold"></label>
									<input type="hidden" class="form-control" name="ttl_harga" id="ttl_harga"><p id="total" style="font-weight: bold"> </p>
									</div>
									
									<div class="form-group">
									<button name="btn_order"  value="order" class="btn btn-inverse" type="submit">Tambahkan</button>
									</div>
								</form>
							</div>							
						</div>
						<div class="row">
							<div class="span9">
								<ul class="nav nav-tabs" id="myTab">
									<br>
									<li class="active"><a href="#home">Keterangan Product</a></li>
									<li class=""><a href="#profile">Warna Dan Ukuran</a></li>
								</ul>							 
								<div class="tab-content">
									<?php $data = get_products($_GET["id"]); 
									foreach ($data as $fetch_data) {
										
										?>
									<div class="tab-pane active" id="home">
										<?php echo $fetch_data["keterangan"];?>
										
									</div>
									<div class="tab-pane" id="profile">
										<table class="table table-striped shop_attributes">
											<tbody>
												<tr class="">

													<th>Size</th>
													<td><?php echo $fetch_data["ukuran"];?></td>
												</tr>		
												<tr class="alt">
												<th>Colour</th>
												<td><?php echo $fetch_data["warna"];?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>							
							</div>		
							<?php
								}				
							?>
							<div class="span9">	
								<br>
								<h4 class="title">
									<span class="pull-left"><span class="text" style="color: #b2b2b2;"><strong style="color: #177770">Related</strong> Products</span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel-1" class="carousel slide">
									<div class="carousel-inner">
										<?php echo product_carousel();?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="span3 col">
					
				</div>
			</section>	
			<?php include 'index/footer.php'; ?>
		</div>

		<script src="themes/js/common.js"></script>
		<script>
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});
				
				$('#myCarousel-2').carousel({
                    interval: 2500
                });								
			});

			function jasa(hrg,nama){
			var detail = document.getElementById("detail_kurir");
			if (nama) {
				document.getElementById("dt_jasa").innerHTML="";
			}
			if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			} 
			else { // code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
			  if (this.readyState==4 && this.status==200) {
			    document.getElementById("dt_jasa").innerHTML=this.responseText;

			    $(document).ready(function(){			    	
				var jmh_beli = document.getElementById("ttl_order").value;
				var harga_jasa= document.getElementById("jasa_harga").value;
				var harga_total = (parseInt(jmh_beli) * parseInt(hrg)) + parseInt(harga_jasa);																
				document.getElementById('ttl_harga').value=harga_total;				
			    var hargatmp = (parseInt(jmh_beli) * parseInt(number_format(hrg,0,',','.'))) + parseInt(number_format(harga_jasa,0,',','.'));							
				document.getElementById('total').innerHTML="Total Harga Rp. "+number_format(hargatmp,3,',','.');				
			    	$("#ttl_order").change(function(event){			    					    	
				var jmh_beli = document.getElementById("ttl_order").value;
				var harga_jasa= document.getElementById("jasa_harga").value;				
				var harga_total = (parseInt(jmh_beli) * parseInt(hrg)) + parseInt(harga_jasa);																			
				document.getElementById('ttl_harga').value=harga_total;			
				var hargatmp = (parseInt(jmh_beli) * parseInt(number_format(hrg,0,',','.'))) + parseInt(number_format(harga_jasa,0,',','.'));							
				document.getElementById('total').innerHTML="Total Harga Rp. "+number_format(hargatmp,3,'.','.');
			    	})
			    });

			  }
			}
			xmlhttp.open("GET","user_akses/opt_kurir.php?name="+nama+'&hrg='+hrg,true);
			xmlhttp.send();
			}			

		function number_format(number, decimals, decPoint, thousandsSep){
		decimals = decimals || 0;
		number = parseFloat(number);
	
		if(!decPoint || !thousandsSep){
			decPoint = '.';
			thousandsSep = ',';
		}
	
		var roundedNumber = Math.round( Math.abs( number ) * ('1e' + decimals) ) + '';
		var numbersString = decimals ? roundedNumber.slice(0, decimals * -1) : roundedNumber;
		var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
		var formattedNumber = "";
	
		while(numbersString.length > 3){
			formattedNumber += thousandsSep + numbersString.slice(-3)
			numbersString = numbersString.slice(0,-3);
		}
	
		return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? (decPoint + decimalsString) : '');
		}
		</script>

    </body>
</html>