<?php

class Categoria extends Controller {
    function __construct() {
        parent::__construct();
		$this->view->data['id'] = 5;
		$this->view->data['title'] = 'Categorias';
		$this->view->data['js'] = '/js/modulos/categoria.js';
    }

    public function render() {
        $this->view->render('categoria/index');
    }
    public function getData() {
        $datos = $this->model->get(); 
        $this->ResponseData($datos);
    }

    public function nuevoRegistro(){
        
        if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $res = $this->model->insert(['nombre' => $nombre, 'descripcion' => $descripcion]);
            if($res){
                $this->Response(true, 'Datos guardado correctamente');
            }else{
                $this->Response(false, '¡No se registranon lo datos!');
            }
        }else{
            $this->Response(false, '¡Nombre de la categoria es requerido!');
        }
    }

    public function editarRegistro(){
        if(isset($_POST['nombre']) && isset($_POST['idcategoria'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $idcategoria = $_POST['idcategoria'];
            $res = $this->model->edit(['nombre' => $nombre, 'descripcion' => $descripcion, 'idcategoria' => $idcategoria]);
            if($res){
                $this->Response(true, 'Datos editados correctamente');
            }else{
                $this->Response(false, '¡No se editaron lo datos!');
            }
        }else{
            $this->Response(false, '¡No se envio el ID de la categoria a editar!');
        }
    }
    public function eliminarRegistro(){
        if(isset($_POST['idcategoria'])){
            $idcategoria = $_POST['idcategoria'];
            $res = $this->model->delete(['idcategoria' => $idcategoria]);
            if($res){
                $this->Response(true, 'Datos eliminado correctamente');
            }else{
                $this->Response(false, '¡No se eliminaron lo datos!');
            }
        }else{
            $this->Response(false, '¡No se envio el ID de la categoria a eliminar!');
        }
    }
}

?>