<?php

class paging
{

	public $user ="localhost";
	public $root ="root";
	public $password ="";
	public $dbname = "inventory";

	public function koneksi(){
		$koneksi = mysql_connect($this->user, $this->root, $this->password);
		$selectdb = mysql_select_db($this->dbname);
	}		

	function pagging ($pages=1,$max_item = 3){		
		$this->koneksi();		
		$start = ($pages>1) ? ($pages * $max_item) - $max_item : 0;
		$mysql = mysql_query("SELECT * FROM tbl_barang LIMIT ".$start.",".$max_item."");
		if ($mysql) {

		return $mysql;
		}
		die(mysql_error());
	}

	function rows(){
		$this->koneksi();		
		$max_item = 3;		
		$mysql = mysql_query("SELECT * FROM tbl_barang");
		$rows = mysql_num_rows($mysql);
		$nopages = ceil($rows/$max_item);
		return $nopages;
	}

}

$paging = new paging();
$nopages = $paging->rows();
$mysql = $paging->pagging((int)$_GET["page"]);
?>
<table>
	<thead>
		<th>DATA MEMBER</th>
	</thead>
	<tbody>
		<tr>
			<td>NAMA</td>
			<td>UMUR</td>
			<td>ALAMAT</td>
		</tr>
		<?php
		while ($fetch = mysql_fetch_array($mysql)) {		

		$kd_barang 	= $fetch["kd_barang"];
		$nm_barang 	= $fetch["nm_barang"];
		$jns_barang = $fetch["jns_barang"];
		?>
			<tr>
				<td><?php echo $kd_barang; ?></td>
				<td><?php echo $nm_barang; ?></td>
				<td><?php echo $jns_barang; ?></td>
			</tr>

		<?php
		}		
		?>			
	</tbody>	
</table>

<div class="">
  <?php for ($no_awal=1; $no_awal<=$nopages ; $no_awal++){ ?>
  <a href="?page=<?php echo $no_awal; ?>"><?php echo $no_awal; ?></a>
 
  <?php } ?>
 
</div>