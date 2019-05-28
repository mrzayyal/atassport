<div class="span8">
<div class="account pull-right">
	<ul class="user-menu">											
			<?php
		$cek = cek_login();
	if ($cek == 1){
		$cek_order = cek_order();
		echo "
		<li><a href='index.php?page=cart'  style='color:#b2b2b2'><span class='badge' style='margin:3px 5px 0px 0px;'>".$cek_order."</span>Keranjang Belanja</a></li>
		<li><a href='index.php?page=checkout'  style='color:#b2b2b2'>Checkout</a></li>					
		<li>
		<a href='index.php?page=profil'  style='color:#b2b2b2'>Akun Saya</a>
		</li>	
		<li>
		<a href='user_akses/log_out.php'  style='color:#b2b2b2'>Log Out</a>
		</li>	
		";
	}else{
		echo "<a href='register.php' style='color:#b2b2b2'>Log In</a>";
	}?>
			
	</ul>
</div>
