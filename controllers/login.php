<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
		$this->view->data['id'] = 0;
		$this->view->data['title'] = 'Login';
		$this->view->data['js'] = '/js/modulos/login.js';
    }
    public function render() {
        $this->view->render('login/index');//enviamos la ruta a cargar
    }

    public function loginUsuario(){
		if(isset($_POST['email']) && isset($_POST['password'])){
			$email = $_POST['email'];
			$password = crypt($_POST['password'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            $res = $this->model->login([
				'email' => $email,
				'password' => $password
			]);
            if($res){
                $this->session->setUsuarioSession($res);
                $this->Response(true, 'Datos Correctos');
                //header('Location: '.BASE_URL.'home');
            }else{
                $this->Response(false, '¡Datos Icorrectos!');
            }
        }else{
            $this->Response(false, '¡El email y la contraseñá es necesario!');
        }
	}
}
 
?>