<?php 

class Home extends Controller {

	function __construct(){
		parent::__construct(); // ejecutamos el contructor de Controller
		$this->view->data['id'] = 1;
		$this->view->data['title'] = 'Inicio';
		$this->view->data['js'] = '/js/modulos/home.js';
	}
	public function render(){
		
		$this->view->data['ventas'] = $this->model->getCountVentas();
		$this->view->data['productos'] = $this->model->getCountProductos();
		$this->view->data['clientes'] = $this->model->getCountClientes();
		$this->view->data['usuarios'] = $this->model->getCountUsuarios();

		$this->view->render('home/index');//hacemos referencia a la vista
	}	
}

?>