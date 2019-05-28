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
		<link href="themes/css/new_main.css" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
			<style type="text/css">
		.px{
			margin-top: -30px;
			margin-left: 360px;
		}	
		.wrap-content{
			margin:30px 20px;
			width: 940px;
		}
		#txt-top{
			text-align: center;
		}
		#form-content{			
			border:1px solid black;
			width: 950px;

		}
		.txt_head{
			text-align: center;
		}
		table{
    	width:100%;
		}
		table td{
		    white-space: nowrap;  /** added **/		    
		    font-size: 9px;	
		   	text-align: center;
		}
		table td:last-child{
		    width:100%;
		}
	</style>
	</head>
    <body>					
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">					
					<a href="index.html" class="logo pull-left"><img src="head.png" class="site_logo" alt=""></a>
				</div>
				<section class='nav_user'>			
					<div class="px">
					<?php include 'index/nav_user.php'; ?>
					</div>
				</section>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">			
			<?php include 'index/navbar.php'; ?>
			<section class="header_text sub">
			<img class="pageBanner" src="icon/logo_fix.jpg" alt="New products" >
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">
							<table class='table table-bordered tbl_master'>
							<thead>
							<tr>
							<th colspan='15'> <h3 class='txt_head' style="color:#177770">DATA HISTORI <span style="color: #b2b2b2"> ORDERAN ANDA </span></h3></th>
							</tr>
							</thead>
							<tbody>
							<tr>
							<td>ID ORDER</td>
							<td>ID MEMBER</td>
							<td>ID PRODUCTS</td>
							<td>NAMA PRODUCTS</td>
							<td>KATEGORI PRODUCTS</td>
							<td>Total Pembyaran</td>
							<td>KETERANGAN PRODUTCS</td>
							<td>JENIS</td>
							<td>SATUAN</td>
							<td>JUMLAH ORDER</td>
							<td>STATUS UPLOAD</td>
							<td>TANGGAL ORDER</td>
							<td>STATUS PEMBAYARAN</td>
							</tr>
							<?php
							$dt_histori = order_histori();
							foreach ($dt_histori as $data) {
							$id_order             = $data["id_order"];
							$id_product           = $data["id_product"];
							$id_member            = $data["id_member"];
							$nm_product           = $data["nm_product"];
							$kategori             = $data["kategori"];
							$ttl_harga         	  = $data["ttl_harga"];
							$keterangan           = $data["keterangan"]; 
							$jenis                = $data["jenis"]; 
							$satuan               = $data["satuan"]; 
							$upload               = $data["upload"];
							$jmh_order            = $data["jmh_order"];
							$tgl_order            = $data["tgl_order"];
							$status_pembayaran    = $data["status_pembayaran"];
							?>
  							<tr>
  							<td><?php echo $id_order; ?></td>
  							<td><?php echo $id_product; ?></td>
  							<td><?php echo $id_member; ?></td>
  							<td><?php echo $nm_product; ?></td>
  							<td><?php echo $kategori; ?></td>
  							<td><?php echo"Rp.".$ttl_harga; ?></td>
  							<td><?php echo $keterangan; ?></td>
  							<td><?php echo $jenis; ?></td>
  							<td><?php echo $satuan; ?></td>
  							<td><?php echo $jmh_order; ?></td>
  							<td><?php echo $upload; ?></td>  
  							<td><?php echo $tgl_order; ?></td>
  							<td><?php echo $status_pembayaran; ?></td>
  							</tr>
							<?php
							}
							?>
							</tbody>						
						</table>
							
	</div>
</div>
			</section>			
				<?php include 'index/footer.php'; ?>		
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script type="text/javascript">

			function fm_confirm(idorder){
				var content = document.getElementById("form-content");				
				var text	= document.getElementById("txt-top");
				if (idorder =="") {
					text.innerHTML="MOHON PILIH ID ORDERAN ANDA";
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
				  	text.innerHTML="";
				    document.getElementById("form-content").innerHTML=this.responseText;
				  }
				}
				xmlhttp.open("GET","form_pembayaran.php?id_order="+idorder,true);
				xmlhttp.send();
				}


function kurir(nama){
	var detail = document.getElementById("detail_kurir");
	if (nama) {
		document.getElementById("detail_kurir").innerHTML="";
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
	  	detail.style.display="block";
	    document.getElementById("detail_kurir").innerHTML=this.responseText;
	  }
	}
	xmlhttp.open("GET","user_akses/opt_kurir.php?name="+nama,true);
	xmlhttp.send();
	}

	function show_mdal($nm_kurir){

  var mdal_master = document.getElementById("mdal_master");
  var close = document.getElementById('btn_close');
  close.onclick = function() {
  mdal_master.style.display = "none";
  }
  mdal_master.style.display="block";

	}

		</script>
    </body>
</html>