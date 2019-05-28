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
		<link href="themes/css/xnew_main.css" rel="stylesheet"/>
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
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row"><div class="span4">
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
			<section class="main-content">				
				<div class="row">
					<div class="span5">					
				 		<h4 class="title"><span class="text"><strong style="color:#177702">Login</strong> Form</span></h4>
						<form action="user_akses/proses_login.php" method="post">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">E-mail</label>
									<div class="controls">
										<input type="text" placeholder="Enter your username" id="username" class="input-xlarge" name='email' required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password</label>
									<div class="controls">
										<input type="password" placeholder="Enter your password" id="password" class="input-xlarge" name='password' required>
									</div>
								</div>
								<div class="control-group">
									<input tabindex="3" class="btn btn-inverse large" type="submit" value="Sign into your account">
									<hr>
									<p class="reset">Recover your <a tabindex="4" href="#"  data-toggle="modal" data-target="#myModal" title="Recover your username or password" style="color:#177702">username Atau password</a></p>
								</div>
							</fieldset>
						</form>				
					</div>
					<div class="span7">					
						<h4 class="title"><span class="text"><strong style="color:#177702">Form</strong> Pendaftaran</span></h4>
						<form action="user_akses/proses_daftar.php" method="post" class="form-stacked" id="form_daftar">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" placeholder="Enter your username" class="input-xlarge" name="username" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Email :</label>
									<div class="controls">
										<input type="text" placeholder="Enter your email" class="input-xlarge" name="email" id='dft_email' required>
										<span id="email_err"></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Nomor Telfon:</label>
									<div class="controls">
										<input type="text" placeholder="Enter your password" class="input-xlarge" name="telpon" maxlength="12" required>
									</div>
								</div>							                            								
								<div class="control-group">
									<label class="control-label">Alamat:</label>
									<div class="controls">
										<textarea placeholder="Masukan Alamat Anda" class="input-xlarge" name="alamat" rows="5" cols="250" required>
										</textarea>
									</div>
								</div>							          

								<div class="control-group">
									<label class="control-label">Kota:</label>
									<div class="controls">
										<input type="text" placeholder="Enter your password" class="input-xlarge" name="kota" required="">
									</div>
								</div>							                            
								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										<input type="password" placeholder="Enter your password" class="input-xlarge" name="password" required="">
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

  	<?php
  	if (isset($_POST["btn_recover"])) {
  		include_once'/user_akses/forget_pass.php';
  		$npassword = new npassword();
  		$npassword->update_pass(
  			$_POST["femail"],
  			$_POST["fno_telp"],
  			$_POST["npass"],
  			$_POST["vpass"]
  		);
  	}
  	else{}
  	?>				<!-- modal -->

<div id="myModal" class="modal fade" role="dialog" style="display: none">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-info-sign"></span>Recovery Username Atau Password</h4>
      </div>
      <p id="status"></p>
      <div class="modal-body">
      	<!-- < Form Pembayaran -->
	<form name="upload" method="POST" id="npassword">
		<div class="form-group">										
		<label style="font-weight: bold">E-mail</label>
		<input type="text" class="form-control" name="femail" id="f_email" placeholder="Masukan ID Transaksi Pembayaran" style="width: 300px;" required>
	</div>
	<br/>		
	<div class="form-group">										
	<label style="font-weight: bold">No Telfon</label>
		<input type="text" class="form-control" name="fno_telp" id="fno_telp" placeholder="Masukan ID Transaksi Pembayaran" style="width: 300px;" maxlength="12" required>
	</div>
	<br/>
	<div id="get_pass">
	</div>
	<div class="form-group">     
     <button type="submit" class="btn btn-default" name="btn_recover" id="btn_recover" value="submit">Submit</button>
    </div>
</form>
<!-- end modal -->
			</section>	<section class='nav_user'>			
					<?php include 'index/footer.php'; ?>
				</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.php";
				})
			});

			$(document).ready(function() {
				$('#btn_recover').click(function (e) {
					$('#myModal').css("display","block");
				})
			});

			$(document).ready(function(){
				$('#fno_telp').change(function(e){
					var email = $('#f_email').val();
					var no_telp = $('#fno_telp').val();
					$.post("user_akses/fm_password.php", 
						{email:email, no_telp:no_telp}, 
						function(err){						
						$('#get_pass').html(err);
					})
				})
			});
			function isValidEmailAddress(email) {
    		var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    		return pattern.test(email);
			}
			$(document).ready(function() {
				$('#form_daftar').submit(function (e) {
					var email = $("#dft_email").val();
					if (!isValidEmailAddress(email)) {						
						$("#email_err").html("* Not Valid Email");
						$("#email_err").css("color","red");						
						alert("Email Is Not Valid");
						e.preventDefault();
					}
				})
			});

			
		</script>		
    </body>
</html>