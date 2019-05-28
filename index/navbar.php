<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					
						<ul class="nav navbar-nav pull-right">
							<li><a href="index.php?page=home">Products</a></li>
							<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Kateogri <span class="caret" style="margin-top: 7px;"></span></a>
								<ul class="dropdown-menu">
									<?php 
										$fetch = get_kategori();
										foreach ($fetch as $data) {
											echo "<li><a href='index.php?page=kategori&kategori=".$data["kategori"]."'>".$data["kategori"]."</a></li>";
										}
									?>
								</ul>
							</li>
							<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Brand <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<?php 
										$brand = brand();
										foreach ($brand as $data) {
											echo "<li><a href='index.php?page=brand&brand=".$data["nm_brand"]."'>".$data["nm_brand"]."</a></li>";
										}
									?>
								</ul>
							</li>
							<li><a href="index.php?page=pemesanan">Cara Pemesanan</a></li>			
							<li><a href="index.php?page=pembayaran">Cara Pembayaran</a></li>							
							<li><a href="index.php?page=aboutus">Tentang Kami</a></li>
						</ul>
				</div>
			</section>
