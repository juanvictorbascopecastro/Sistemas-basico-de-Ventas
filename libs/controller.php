<?php 

class Controller {
    public $session;

	function __construct(){
        $this->session = new Session();
		$this->verificarAcceso();

		$this->view = new View(); // instanciamos la clase view
	}

	function loadModel($model){
		$url = 'models/' . $model . 'Model.php';
		if(file_exists($url)){
			require $url;
			$modelName = $model.'Model';
			$this->model = new $modelName();
		}
	}
	public function ResponseData($data) {
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
		die();
	}
	public function Response($estado, $msj) {
		$response = array('estado' => $estado, 'msj' => $msj);
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
		die();
	}

	public function verificarAcceso(){
		$ruta = $this->getRuta();
		switch ($ruta){
			case 'login': {
				if($this->existeSession()){ //si tiene una session volvemos al home
					header('Location: '.BASE_URL.'home');
				}
				break;
			}
			case 'home': $this->verificandoRuta(); break;
			case 'ventas': $this->verificandoRuta(); break;
			case 'productos': $this->verificandoRuta(); break;
			case 'clientes': $this->verificandoRuta(); break;
			case 'usuarios': $this->verificandoRuta(); break;
			case 'nuevaventa': $this->verificandoRuta(); break;
			case 'reportes': $this->verificandoRuta(); break;
			default: break;
		}
	}
	private function verificandoRuta(){
		if(!$this->existeSession()){
			header('Location: '.BASE_URL.'login');
		}
	}
	private function existeSession(){
		if(!$this->session->existe()) return false;
		if($this->session->getUsuarioSession() == NULL) return false;
		$sessionId = $this->session->getUsuarioSession();
		if($sessionId) return true;
		return false;
	}
	private function getRuta(){
		$ruta = trim("$_SERVER[REQUEST_URI]");
		$url = explode("/", $ruta);
		return $url[2];
	}
}



 ?>