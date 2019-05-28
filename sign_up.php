<?php
include 'library/all_function.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Marisa Shop</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
					</form>
				</div>
				<section class='nav_user'>			
					<?php include 'index/nav_user.php'; ?>
				</section>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<?php include 'index/navbar.php'; ?>
			<section class="header_text sub">
			<img class="pageBanner" src="icon/logo2.jpg" alt="New products" >
				<h4><span>Login or Regsiter</span></h4>
			</section>			
			<section class="main-content">				
				<div class="row">
					<div class="span5">					
						<h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
						<form action="user_akses/proses_login.php" method="post">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">E-mail</label>
									<div class="controls">
										<input type="text" placeholder="Enter your username" id="username" class="input-xlarge" name='email'>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password</label>
									<div class="controls">
										<input type="password" placeholder="Enter your password" id="password" class="input-xlarge" name='password'>
									</div>
								</div>
								<div class="control-group">
									<input tabindex="3" class="btn btn-inverse large" type="submit" value="Sign into your account">
									<hr>
									<p class="reset">Recover your <a tabindex="4" href="#" title="Recover your username or password">username or password</a></p>
								</div>
							</fieldset>
						</form>				
					</div>
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Form</strong> Pendaftaran</span></h4>
						<form action="user_akses/proses_daftar.php" method="post" class="form-stacked">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" placeholder="Enter your username" class="input-xlarge" name="username">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Email :</label>
									<div class="controls">
										<input type="text" placeholder="Enter your email" class="input-xlarge" name="email">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Nomor Telfon:</label>
									<div class="controls">
										<input type="text" placeholder="Enter your password" class="input-xlarge" name="telpon">
									</div>
								</div>							                            								
								<div class="control-group">
									<label class="control-label">Alamat:</label>
									<div class="controls">
										<textarea placeholder="Masukan Alamat Anda" class="input-xlarge" name="alamat" rows="5" cols="250">
										</textarea>
									</div>
								</div>							          

								<div class="control-group">
									<label class="control-label">Kota:</label>
									<div class="controls">
										<input type="text" placeholder="Enter your password" class="input-xlarge" name="kota">
									</div>
								</div>							                            
								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										<input type="password" placeholder="Enter your password" class="input-xlarge" name="password">
									</div>
								</div>							                                              
								<div class="control-group">
									<p>Now that we know who you are. I'm not a mistake! In a comic, you know how you can tell who the arch-villain's going to be?</p>
								</div>
								<hr>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Create your account"></div>
							</fieldset>
						</form>					
					</div>				
				</div>
			</section>	<section class='nav_user'>			
					<?php include 'index/footer.php'; ?>
				</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>		
    </body>
</html>