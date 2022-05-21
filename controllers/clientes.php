<?php 

class Clientes extends Controller{
	function __construct(){
		parent::__construct();
		$this->view->data['id'] = 4;
		$this->view->data['title'] = 'Clientes';
		$this->view->data['js'] = '/js/modulos/cliente.js';
	}
	public function render(){
		$this->view->render('clientes/index');
	} 
	public function getData() {
        $datos = $this->model->get(); 
        $this->ResponseData($datos);
    }
	public function nuevoRegistro(){
        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['dni'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $dni = $_POST['dni'];
            $res = $this->model->insert(['nombre' => $nombre, 'apellido' => $apellido, 'telefono' => $telefono, 'dni' => $dni]);
            if($res){
                $this->Response(true, 'Datos guardado correctamente');
            }else{
                $this->Response(false, '¡No se registranon lo datos!');
            }
        }else{
            $this->Response(false, '¡Hay campos que no se enviaron correctamente!');
        }
    }
	public function editarRegistro(){
        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['dni'])  && isset($_POST['idpersona'])){
            $idpersona = $_POST['idpersona'];
			$nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $dni = $_POST['dni'];
            $res = $this->model->edit(['idpersona' => $idpersona, 'nombre' => $nombre, 'apellido' => $apellido, 'telefono' => $telefono, 'dni' => $dni]);
            if($res){
                $this->Response(true, 'Datos guardado correctamente');
            }else{
                $this->Response(false, '¡No se registranon lo datos!');
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
    public function buscarCliente(){
        if(isset($_GET['dni'])){
            $dni = $_GET['dni'];
            $datos = $this->model->buscar($dni);
            if($datos){
                $this->ResponseData($datos);
            }else{
                $this->Response(false, '¡No se encontro un cliente con ese DNI!');
            }
        }else{
            $this->Response(false, '¡No se envio el DNI del cliente a buscar!');
        }
    }
}


 ?>