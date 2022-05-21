<?php 

class Reportes extends Controller {

	function __construct(){
		parent::__construct(); // ejecutamos el contructor de Controller
		$this->view->data['id'] = 7;
		$this->view->data['title'] = 'Reportes';
		$this->view->data['js'] = '/js/modulos/reportes.js';
	}
	public function render(){
		$this->view->render('reportes/index');//hacemos referencia a la vista
	}	
	public function getGraficaVentas(){
		$data = $this->model->getMonthVentas();
		foreach ($data as $i => $value) {
			$time=strtotime($value['date']);
			$month=date("m",$time);
			$year=date("Y",$time);
			$data[$i]['date'] = $year.' - '.$this->getMonth($month);
		}
        $this->ResponseData($data);
	}
	public function getGraficaGanacias(){
		$data = $this->model->getMonthGanancias();
		foreach ($data as $i => $value) {
			$time=strtotime($value['date']);
			$month=date("m",$time);
			$year=date("Y",$time);
			$data[$i]['date'] = $year.' - '.$this->getMonth($month);
		}
        $this->ResponseData($data);
	}
	public function getClientesFrecuentes(){
		$data = $this->model->getClientesFrecuentes();
        $this->ResponseData($data);
	}
	public function getProductosMasSolicitados(){
		$data = $this->model->getProductosMasSolicitados();
        $this->ResponseData($data);
	}
	private function getMonth($m){
		switch($m){
			case 1: return 'Enero';
			case 2: return 'Febrero';
			case 3: return 'Marzo';
			case 4: return 'Abril';
			case 5: return 'Mayo';
			case 6: return 'Junio';
			case 7: return 'Julio';
			case 8: return 'Agosto';
			case 9: return 'Septiembre';
			case 10: return 'Octubre';
			case 11: return 'Noviembre';
			case 12: return 'Diciembre';
			default: return ''.$m;
		}
	}
}


?>