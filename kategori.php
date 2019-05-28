<div class="flip"> 
    <div class="front"> 
        <img src="icon/logo.png" alt=""  class="img-flip" />
    </div> 
</div>

<div class="w-abt text-center">
	<h3 class="title-page" style="">ALL OF <?php echo $_GET["kategori"]; ?> SHOES<img src=""></h3>
</div>

	<div class="main-content text-center">
		<?php 
		$data = cont_kategori($_GET["kategori"]);
		$obj = json_decode($data);	
		if (isset($obj)) {
			
			foreach ($obj as $jsn) {
			?>
		<li class="span3">
			<div class="product-box">
				<span class="sale_tag"></span>														
				<a><img alt="" class="k-img" src="<?php echo"foto_products/".$jsn->foto ?>"></a>
				<p class="name-brand">
				<?php 
				if($jsn->brand == "Nike")
				echo '<img src="icon/nike.png" width="10%">';
				?>
				<?php echo $jsn->brand ?></p>
				<p class="name-product"><?php echo $jsn->nm_product ?></p>
				<p class="harga-brand"><?php echo"Rp. ".number_format($jsn->hrg_product,0); ?></p>
			</div>
		</li> 
		<?php 
			}
		}
		else{
		?>
		<h3 class="empty">NO SHOES AVAILABLE HERE</h3>
		<?php
		}
		?>   
	</div>
		</div>
