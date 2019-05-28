			<hr>
				<div class="row">						
					<div class="span12" style="padding: 10px;">								
						<ul class="thumbnails listing-products">
							<?php		
							if (isset($_GET["halaman"])) {
								index($_GET["halaman"]);
							}				
							else{
								index();
							}
							?>
						</ul>								
						<hr>	
			<div class="pagination pagination-small pagination-centered">				
				<ul>
					<?php 
					$page = paging();
  					for ($halaman=1; $halaman<=$page; $halaman++){ 
    				?>
  					<li>
  					<a href="?page=home&halaman=<?php echo $halaman; ?>"><?php echo $halaman ?></a></li>
    				<?php        
  					}?>
  				</ul>
					</div>	
				</div>
			</div>