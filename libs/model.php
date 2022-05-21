<?php 

class Model {

	function __construct(){
		$this->db = new Conexion();
		//echo $this->db->conect();
	}
}


 ?>