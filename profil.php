
<div class="w-img text-center">
	<img src="icon/logo.png" class="logo-img">
	<h3 style="color: #177702">DATA <span style="color: black">PROFIL ANDA</span></h3>
</div>
				<div class="row">
					<div class="span12">
						<div class="row-fluid">
							<div class="span10">							
								<div class="wrap-profil">					
									<button type="button" class="btn btn-default btn-xs btn-edit" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></button>
									<table class='table'>
									<tbody>

									<?php
									$fetch = profil();
									foreach($fetch as $dt_member){	
									$id_member = $dt_member["id_member"];
									$nama = $dt_member["nama"];
									$email = $dt_member["email"];
									$tlp = $dt_member["tlp"];
									$alamat = $dt_member["alamat"];
									$kota = $dt_member["kota"];
									$katasandi = $dt_member["katasandi"];
									?>						
									<tr>						
  									<td>ID Member : </td>
  									<td><?php echo $id_member; ?></td>
									</tr>
									<tr>						
  									<td>Nama Lengkap : </td>
  									<td><?php echo $nama; ?></td>
									</tr>
									<tr>						
  									<td>E-mail : </td>
  									<td><?php echo $email; ?></td>
									</tr>
									<tr>						
  									<td>Nomer Telfon : </td>
  									<td><?php echo $tlp; ?></td>
									</tr>
									<tr>						
  									<td>Alamat Lengkap : </td>
  									<td><?php echo $alamat; ?></td>
									</tr>
									<tr>						
  									<td>Kota : </td>
  									<td><?php echo $kota; ?></td>
									</tr>
									<?php
									}
									?>
									</tbody>						
								</table>					
							</div>

							<?php
							if (isset($_POST["btn_profil"])) {							
							edit_profile($_POST["id_member"],$_POST["nama"],$_POST["email"],$_POST["notelp"],$_POST["alamat"],$_POST["kota"],$_POST["password"]);			
							}
							?>
		<!-- MODAL  -->
		<div id="myModal" class="modal fade" role="dialog" style="display: none;">
  			<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">EDIT DATA PROFIL</h4>
      </div>
      <div class="modal-body">      
    <form method='POST' name='fm_profile' enctype='multipart/form-data' >
    <table class='table table-bordered'>
    <tr>
    <td> <p>ID MEMBER </p></td>
    <td><input type='text' class='form-control' name='id_member' value="<?php echo $id_member?>" readonly></td>
    </tr>  
    <tr>
    <td> <p>NAMA</p></td>
    <td><input type='text' class='form-control' name='nama' value="<?php echo $nama?>" required></td>
    </tr>     
    <tr>
    <td> <p>EMAIL</p></td>
    <td><input type='text' class='form-control' name='email' value="<?php echo $email?>" class='form-control' readonly></td>
    </tr>      
    <tr>
    <td> <p>TELFON</p></td>
    <td><input type='text' class='form-control' name='notelp' value="<?php echo $tlp?>" class='form-control' required></td>
    </tr>      
    <tr>
    <td><p>ALAMAT</p></td>
    <td><textarea class='form-control' name='alamat' value="<?php echo $alamat?>" class='form-control' required><?php echo $alamat; ?></textarea></td>
    </tr>      
    <tr>
    <td> <p>KOTA</p></td>
    <td><input type='text' class='form-control' name='kota' value="<?php echo $kota?>" class='form-control' required></td>    
    <input type='hidden' class='form-control' name='password' class='form-control' value="<?php echo $katasandi ?>">
    </tr>  
    </table>    
    <button type='submit' class='btn btn-info' value='submit' name='btn_profil'>Submit</button>
    </form>      
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" name="btnclose">Close</button>
      </div>

  </div>
</div>
  <!-- END MODAL -->
			</div>
		</div>				
	</div>
</div>
			
		</div>
		<script src="themes/js/common.js">
			$(document).ready(function() {
				$('#btnclose').click(function (e) {
					$('#myModal').css("display","block");
				})
			});
		</script>
    </body>
</html>