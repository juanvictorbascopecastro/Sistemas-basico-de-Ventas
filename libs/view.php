<?php 


class View {

	function __construct(){
		//echo "VISTA BASE";
	}

	function render($nombre){ //me cargara la vista espesificada en el parametro
		require 'views/'.$nombre.'.php';
	}
}


 ?>