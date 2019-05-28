<?php
include 'library/all_function.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>ATAS SPORT SHOP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
		<link rel="stylesheet" type="text/css" href="themes/css/own_style.css">
		<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<a href="index.html" class="logo pull-left"><img src="head.png" class="site_logo" alt=""></a>
				</div>	
				<section class='nav_user'>			
					<?php include 'index/nav_user.php'; ?>
				</section>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<?php include 'index/navbar.php'; ?>
			<?php include 'index/header.php'; ?>

			<section class="main-content">
				<?php
				$page = isset($_GET['page']) ? $_GET['page'] : '';
				if ($page =="pembayaran") {include 'cara_pembayaran.php';}
				if($page =="pemesanan") {include 'cara_pemesanan.php';}				
				if($page =="aboutus") {include 'aboutus.php';}				
				if($page =="cart") {include 'cart.php';}				
				if($page =="profil") {include 'profil.php';}				
				if($page =="checkout") {include 'checkout.php';}				
				if($page =="histori") {include 'histori.php';}	
				if($page =="kategori") {include 'kategori.php';}	
				if($page =="brand") {
					if(isset($_GET["brand"])){
						include 'brand.php';
					}
				}	
				
				
				
				?>

			</section>
		<!-- panggil file footer -->	
		<?php include 'index/footer.php'; ?>
		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>
