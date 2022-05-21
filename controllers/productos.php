<?php 


class Productos extends Controller{
	function __construct(){
		parent::__construct();
		$this->view->data['id'] = 3;
		$this->view->data['title'] = 'Productos';
		$this->view->data['js'] = '/js/modulos/producto.js';
	}

	public function render() {
		$this->view->render('productos/index');
	}
	public function getData() {
        $datos = $this->model->get();
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
				'stock' => $value['stock'],
				'imagen' => $url_img,
				'categoria' => $value['categoria'],
				'descripcion' => $value['descripcion'],
				'idcategoria' => $value['idcategoria'],
			);
			array_push ($lista , $prod);
		}
        $this->ResponseData($lista);
    }
	public function nuevoRegistro(){
		if(isset($_POST['nombre']) && isset($_POST['stock']) && isset($_POST['precio']) && isset($_POST['idcategoria'])){
			if(!empty($_FILES['imagen']['tmp_name'])){
				$nombre = $_POST['nombre'];
				$stock = $_POST['stock'];
				$precio = $_POST['precio'];
				$idcategoria = $_POST['idcategoria'];
				//$nombre = $_POST['nombre'];
				$descripcion = $_POST['descripcion'];
			    $foto=file_get_contents($_FILES['imagen']['tmp_name']);	
				
				$res = $this->model->insert([
					'nombre' => $nombre, 
					'stock' => $stock, 
					'precio' => $precio, 
					'idcategoria' => $idcategoria, 
					'descripcion' => $descripcion], $foto);
				if($res){
					$this->Response(true, 'Datos guardado correctamente');
				}else{
					$this->Response(false, '¡No se registranon lo datos!');
				}
			}else{
				$this->Response(false, '¡La imagen del producto no se envio correctamente!');
			}
        }else{
            $this->Response(false, '¡No se envio todos los campos requeridos!');
        }
	}
	public function actualizarStock(){
		if(isset($_POST['stock']) && isset($_POST['idproducto'])){
			$idproducto = $_POST['idproducto'];
			$stock = $_POST['stock'];
			$res = $this->model->update_stock([
				'idproducto' => $idproducto, 
				'stock' => $stock]);
			if($res){
				$this->Response(true, 'Stock actualizado correctamente');
			}else{
				$this->Response(false, '¡No se actualizó lo datos!');
			}
        }else{
            $this->Response(false, '¡No se envio todos los campos requeridos!');
        }
	}
	public function editarRegistro(){
		if(isset($_POST['idproducto']) && isset($_POST['nombre']) && isset($_POST['stock']) && isset($_POST['precio']) && isset($_POST['idcategoria'])){
			if(!empty($_FILES['imagen']['tmp_name'])){
				$foto=file_get_contents($_FILES['imagen']['tmp_name']);	
			}else{
				$foto = null;	
			}
			$idproducto = $_POST['idproducto'];
			$nombre = $_POST['nombre'];
			$stock = $_POST['stock'];
			$precio = $_POST['precio'];
			$idcategoria = $_POST['idcategoria'];
			//$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];
			
			
			$res = $this->model->edit([
				'idproducto' => $idproducto,
				'nombre' => $nombre, 
				'stock' => $stock, 
				'precio' => $precio, 
				'idcategoria' => $idcategoria, 
				'descripcion' => $descripcion], $foto);
			if($res){
				$this->Response(true, 'Datos editado correctamente');
			}else{
				$this->Response(false, '¡No se editaron lo datos!');
			}
        }else{
            $this->Response(false, '¡No se envio todos los campos requeridos!');
        }
	}
	public function eliminarRegistro(){
		if(isset($_POST['idproducto'])){
            $idproducto = $_POST['idproducto'];
            $res = $this->model->delete(['idproducto' => $idproducto]);
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