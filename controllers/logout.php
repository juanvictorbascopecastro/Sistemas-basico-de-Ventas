<?php 

class Logout extends Controller{
	public function __construct(){
        parent::__construct();
		$this->session->cerrarSession();
        header('Location: '.BASE_URL.'login');
	}
}

?>