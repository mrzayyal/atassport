
<div class="w-img text-center">
	<img src="icon/logo.png" class="logo-img">
</div>				<div class="row">
					<div class="span1">
						<div class="row">
							<div class="span6" style="padding-left: 50px;">												
								<h4 style="color:#177702">Pilih ID <span style="color: #000000;">Orderan Anda :</span></h4>
									<select name="id_product" onclick="fm_confirm(this.value)">
									<option value=""> ID Orderan</option>
									<?php
									echo get_idorder($_SESSION["id_member"]);
									?>													
									</select>												
										<div class="wrap-content">
										<h4 id="txt-top"><span></span>MOHON PILIH ID ORDERAN ANDA</h4>
									<?php
									date_default_timezone_set('Asia/Jakarta');
								if (isset($_POST["btn_upload"])) {
									$tgl_trf =  date("Y-m-d");
									$id_order = $_POST["id_order"];
									$an_rek = $_POST["an_rek"];
									$bank_tjn = $_POST["bank_tjn"];
									$nom_trf = $_POST["nom_trf"];
									$nm_foto = $_FILES["upload_foto"]["name"];
									$tmp_name = $_FILES["upload_foto"]["tmp_name"];
									confirm_pembayaran($id_order,$an_rek,$bank_tjn,$tgl_trf,$nom_trf,$nm_foto,$tmp_name);
								}
								else{}
								?>
									<div id="form-content">
								
									</div>
								</div>	
							</div>
						</div>				
					</div>
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

	function show_mdal($nm_kurir){

  var mdal_master = document.getElementById("mdal_master");
  var close = document.getElementById('btn_close');
  close.onclick = function() {
  mdal_master.style.display = "none";
  }
  mdal_master.style.display="block";

	}

function val_harga(total,harga){
	var vtotal = parseInt(total);
	var vharga = parseInt(harga);		
  	var v_note = document.getElementById("vnote");  	
	if (vharga != vtotal) {
		v_note.innerHTML="*Not Valid";
		// edit error span 
		$(document).ready(function(){
			$("#vnote").css("margin-left","10px");
			$("#vnote").css("color","red");				
			$("#vnote").css("font-weight","bold");		
		});		
		$('form').attr('onsubmit','return false;');
	}
	else{			
		v_note.innerHTML="";
		$('form').attr('onsubmit','return true;');
	}
}
//submit handler 


		</script>
    </body>
</html>