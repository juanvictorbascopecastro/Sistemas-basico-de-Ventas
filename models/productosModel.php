<?php
//include_once 'models/categoria.php';

class ProductosModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    public function insert($datos, $foto){
        $query = $this->db->connect()->prepare('INSERT INTO producto (nombre, stock, precio, idcategoria, imagen, descripcion) VALUES (:nombre, :stock, :precio, :idcategoria, :imagen, :descripcion)');
        $res = $query->execute([
            'nombre' => $datos['nombre'], 
            'stock' => $datos['stock'],
            'precio' => $datos['precio'],
            'idcategoria' => $datos['idcategoria'],
            'imagen' => $foto,
            'descripcion' => $datos['descripcion']]);
        return $res;
    }

    public function get(){
        $items = [];
        try{
            $result = $this->db->connect()->query('SELECT p.idproducto, p.idcategoria, p.nombre, p.descripcion, p.imagen, p.precio, p.stock, c.nombre AS categoria FROM producto p INNER JOIN categoria c ON c.idcategoria = p.idcategoria');          
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        }catch(PDOException $e){
            return [];
        }
    }

    public function edit($datos, $foto){
        if($foto == null){
            $query = $this->db->connect()->prepare('UPDATE producto SET nombre = :nombre, idcategoria = :idcategoria, precio = :precio, stock = :stock, descripcion = :descripcion WHERE idproducto = :idproducto');
        }else{
            $query = $this->db->connect()->prepare('UPDATE producto SET nombre = :nombre, idcategoria = :idcategoria, precio = :precio, stock = :stock,  imagen=:imagen, descripcion = :descripcion WHERE idproducto = :idproducto');
        }
        $res = $query->execute([
            'idproducto' => $datos['idproducto'], 
            'nombre' => $datos['nombre'], 
            'stock' => $datos['stock'],
            'precio' => $datos['precio'],
            'idcategoria' => $datos['idcategoria'],
            'imagen' => $foto,
            'descripcion' => $datos['descripcion']]);
        return $res;
    }
    public function update_stock($datos){
        $query = $this->db->connect()->prepare('UPDATE producto SET stock = :stock WHERE idproducto = :idproducto');
        $res = $query->execute([
            'idproducto' => $datos['idproducto'],
            'stock' => $datos['stock']]);
        return $res;
    }

    public function delete($datos){
        $query = $this->db->connect()->prepare('DELETE FROM producto WHERE idproducto = :idproducto');
        $res = $query->execute(['idproducto' => $datos['idproducto']]);
        return $res;
    }

    public function getById($id){
        $item = new Prueba();
        try {
            $query = $this->db->connect()->prepare('SELECT * FROM prueba WHERE idprueba = :id');
            $query->execute(['id' => $id]);
            while($row = $query->fetch()){
                $item->id = $row['idprueba'];
                $item->nombre = $row['nombre'];
                $item->detalles = $row['detalles'];
            }
            return $item;
        }catch(PDOException $e){
            return null;
        }
    }
}

?>