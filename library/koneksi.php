<?php

class koneksi
{
	
	public $user ="localhost";
	public $root ="root";
	public $password ="";
	public $dbname = "marisa";

	function sql_link(){
		$link_konek = mysqli_connect($this->user, $this->root, $this->password);
		$selectdb = mysqli_select_db($link_konek,$this->dbname);

		if ($selectdb) {
			return $link_konek;
		}
		else{
			die(mysql_error());
		}
	}
}



?>