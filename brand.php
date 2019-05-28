<div class="flip"> 
    <div class="front"> 
        <img src="icon/logo.png" alt=""  class="img-flip" />
    </div> 
    
</div>

<div class="w-abt text-center">
	<h3 class="title-page" style="">ALL OF <?php echo $_GET["brand"]; ?> BRAND <img src=""></h3>
</div>

	<div class="main-content text-center">
		<?php 
		$data = cont_brand($_GET["brand"]);
		$obj = json_decode($data);	

		if(isset($data)){
			foreach ($obj as $jsn) {
		?>
		<li class="span3">
			<div class="product-box">
				<span class="sale_tag"></span>														
				<a><img alt="" class="k-img" src="<?php echo"foto_products/".$jsn->foto ?>"></a>
				<p class="name-brand">
				<?php 
				if($jsn->brand == "Nike"){
				?>
				<img src="icon/nike.png" width="10%">
				<?php echo $jsn->brand ?></p>
				<p class="name-product"><?php echo $jsn->nm_product ?></p>
				<p class="harga-brand"><?php echo"Rp. ".number_format($jsn->hrg_product,0); ?></p>
				<?php 
				}
				elseif($jsn->brand="Nike"){
				?>
				<img src="icon/nike.png" width="10%">
				<?php echo $jsn->brand ?></p>
				<p class="name-product"><?php echo $jsn->nm_product ?></p>
				<p class="harga-brand"><?php echo"Rp. ".number_format($jsn->hrg_product,0); ?></p>
				<?php 
				}
				?>
			</div>
		</li> 
		<?php 
			}
		}

			else{
				echo "<h3  class='empty'> NOT AVAILABEL SHOES HERE </h3>";
				
			}
		?>   
	</div>
		</div>

