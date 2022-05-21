<?php 

class Errores extends Controller {

	function __construct(){
		parent::__construct();
		//hacemos referencia a la vista de error
		$this->view->message = "¡Vaya! Página no encontrada";
		$this->view->render('error/index');
	}
}

