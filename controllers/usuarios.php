<?php 

class Usuarios extends Controller{
	function __construct(){
		parent::__construct();
		$this->view->data['id'] = 6;
		$this->view->data['title'] = 'Usuarios';
		$this->view->data['js'] = '/js/modulos/usuarios.js';
	}
	public function render(){
		$this->view->render('usuarios/index');
	}
	public function getData() {
        $datos = $this->model->get(); 
        $this->ResponseData($datos);
    }
	public function nuevoRegistro(){
        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['rol']) && isset($_POST['email']) && isset($_POST['password'])){
			
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $rol = $_POST['rol'];
            $email = $_POST['email'];
			$password = crypt($_POST['password'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $res = $this->model->insert([
				'nombre' => $nombre, 
				'apellido' => $apellido, 
				'telefono' => $telefono, 
				'rol' => $rol,
				'email' => $email,
				'password' => $password
			]);

            if($res){
                $this->Response(true, 'Datos guardado correctamente');
            }else{
                $this->Response(false, '¡No se registraron lo datos!');
            }
        }else{
            $this->Response(false, '¡Hay campos que no se enviaron correctamente!');
        }
    }
	public function editarRegistro(){
        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['rol'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $rol = $_POST['rol'];
            $idpersona = $_POST['idpersona'];
            $res = $this->model->edit([
				'nombre' => $nombre, 
				'apellido' => $apellido, 
				'telefono' => $telefono, 
				'rol' => $rol, 
				'idpersona' => $idpersona,
			]);
            if($res){
                $this->Response(true, 'Datos editado correctamente');
            }else{
                $this->Response(false, '¡No se editaron lo datos!');
            }
        }else{
            $this->Response(false, '¡Hay campos que no se enviaron correctamente!');
        }
    }
	public function eliminarRegistro(){
        if(isset($_POST['idpersona'])){
            $idpersona = $_POST['idpersona'];
            $res = $this->model->delete(['idpersona' => $idpersona]);
            if($res){
                $this->Response(true, 'Datos eliminado correctamente');
            }else{
                $this->Response(false, '¡No se eliminaron lo datos!');
            }
        }else{
            $this->Response(false, '¡No se envio el ID de la categoria a eliminar!');
        }
    }
	public function perfil(){
        $this->view->data['id'] = 6;
		$this->view->data['title'] = 'Perfil';
		$this->view->data['js'] = '/js/modulos/perfil.js';
        $this->view->render('usuarios/perfil');
    }
    public function editarMiPerfil(){
        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['rol'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $rol = $_POST['rol'];
            $idpersona = $_POST['idpersona'];
            $res = $this->model->edit([
				'nombre' => $nombre, 
				'apellido' => $apellido, 
				'telefono' => $telefono, 
				'rol' => $rol, 
				'idpersona' => $idpersona,
			]);
            $nuevo_usuario = $this->model->id($idpersona);
            $this->session->setUsuarioSession($nuevo_usuario);
            if($res){
                $this->Response(true, 'Datos editado correctamente');
            }else{
                $this->Response(false, '¡No se editaron lo datos!');
            }
        }else{
            $this->Response(false, '¡Hay campos que no se enviaron correctamente!');
        }
    }
    public function editarAcceso(){
        if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2']) &&isset($_POST['idpersona'])){
			
            $idpersona = $_POST['idpersona'];
            $email = $_POST['email'];
			$password = crypt($_POST['password'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            $res = $this->model->verificarPassword([
				'idpersona' => $idpersona,
				'email' => $email,
				'password' => $password
			]);

            if($res){
                $password2 = crypt($_POST['password2'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                //$this->Response(true, 'Datos guardado correctamente');
                $res = $this->model->editAcceso([
                    'idpersona' => $idpersona,
                    'email' => $email,
                    'password' => $password2
                ]); 
                if($res){
                    $this->Response(true, 'Datos actualizados correctamente');  
                }else{
                    $this->Response(false, '¡No se actualizaron los datos!');
                }   
            }else{
                $this->Response(false, '¡La contraseña actual no es correcta!');
            }
        }else{
            $this->Response(false, '¡Hay campos que no se enviaron correctamente!');
        }
    }
}


 ?>