<?php

class Ventas extends Controller{
    function __construct(){
        parent::__construct();
		$this->view->data['id'] = 2;
		$this->view->data['title'] = 'Ventas';
		$this->view->data['js'] = '/js/modulos/ventas.js';
    }
    public function render(){
        $this->view->render('ventas/index');
    }
    public function nuevaventa(){
		$this->view->data['id'] = 9;
		$this->view->data['title'] = 'Nueva Venta';
		$this->view->data['js'] = '/js/modulos/nuevaventa.js';
        $this->view->render('ventas/nueva-venta');
    }
    public function getData() {
        $datos = $this->model->get(); 
        $this->ResponseData($datos);
    }
    public function searchData(){
        if(isset($_GET['desde']) && isset($_GET['hasta'])){
            $desde = $_GET['desde'];
            $hasta = $_GET['hasta'];

            $res = $this->model->search([
				'desde' => $desde, 
				'hasta' => $hasta
			]);
            $this->ResponseData($res);
        }else{
            $this->Response(false, '¡No se enviaron los rangos de fecha!');
        }
    }

    public function agregarRegistro(){
        if(isset($_POST['total']) && isset($_POST['productos']) && isset($_POST['idusuario']) && isset($_POST['idcliente'])){
            $total = $_POST['total'];
            $productos = json_decode($_POST['productos'], true);
            $idusuario = $_POST['idusuario'];
            $idcliente = $_POST['idcliente'];
            $detalle = $_POST['detalle'];

            $res = $this->model->insert([
				'total' => $total, 
				'productos' => $productos, 
				'idusuario' => $idusuario, 
				'idcliente' => $idcliente, 
				'detalle' => $detalle
			]);

            if($res){
                $this->Response(true, 'Venta registrada correctamente');
            }else{
                $this->Response(false, '¡No se registro la venta!');
            }
        }else{
            $this->Response(false, '¡Hay campos que no se enviaron correctamente!');
        }
    }
    public function getProductosVenta(){
        if(isset($_GET['idventa'])){
            $idventa = $_GET['idventa'];

            $datos = $this->model->id($idventa);
            $lista = [];
            foreach ($datos as $i => $value) {
                $url_img = '';
                if($value['imagen']){
                    $url_img = "data:image/jpeg;base64,".base64_encode($value['imagen']);
                }
                $prod = array(
                    'idproducto' => $value['idproducto'],
                    'nombre' => $value['nombre'],
                    'precio' => $value['precio'],
                    'cantidad' => $value['cantidad'],
                    'imagen' => $url_img,
                    'idproducto_venta' => $value['idproducto_venta'],
                    'descripcion' => $value['descripcion'],
                    'idcategoria' => $value['idcategoria'],
                );
                array_push ($lista , $prod);
            }
            $this->ResponseData($lista);
        }else{
            $this->Response(false, '¡No se envio el ID de la venta!');
        }
    }
    public function anularVenta(){
        if(isset($_POST['idventa'])){
            $idventa = $_POST['idventa'];
            $res = $this->model->delete($idventa);
            if($res){
                $this->Response(true, 'Venta anulada');
            }else{
                $this->Response(false, '¡No se anulo la venta, volver a intentar!');
            }
        }else{
            $this->Response(false, '¡No se envio el ID de la venta a anular!');
        }
    }
}

?>
