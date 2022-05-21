<?php
//include_once 'models/categoria.php';

class VentasModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    public function insert($datos){
        $query = $this->db->connect()->prepare('INSERT INTO ventas (idcliente, idusuario, fecha, detalles, total) VALUES (:idcliente, :idusuario, NOW(), :detalle, :total)');
        $res = $query->execute(['idcliente' => $datos['idcliente'], 'idusuario' => $datos['idusuario'], 'detalle' => $datos['detalle'], 'total' => $datos['total']]);

        if($res){
			$id = $this->db->connect()->lastInsertId(); // ultimo id que se inserto
            /*INSERT INTO producto_venta(idventa, idproducto, cantidad) VALUES(:idventa, :idproducto, :cantidad) */
            $query2 = $this->db->connect()->prepare('CALL pa_insert_productoventa (:idventa, :idproducto, :cantidad)');
			for($i = 0; $i < count($datos['productos']); $i++) {
			 	$arrOption = array(
					':idventa'=> $id,
					':idproducto'=> $datos['productos'][$i]['idproducto'],
					':cantidad'=> $datos['productos'][$i]['cantidad'],
				);
				$res = $query2->execute($arrOption);
			}
            return $res;
		}
        return $res;
    }

    public function get(){
        try{
            $result = $this->db->connect()->query("SELECT v.idventas, c.idcliente, u.idusuarios, v.fecha, v.detalles, c.dni, CONCAT(c.nombre, ' ', c.apellido) AS cliente, CONCAT(u.nombre, ' ', u.apellido) AS usuario, u.rol, v.total FROM ventas v INNER JOIN view_cliente c ON c.idcliente = v.idcliente INNER JOIN view_usuarios u ON u.idusuarios = v.idusuario LIMIT 100");          
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        }catch(PDOException $e){
            return [];
        }
    }
    public function search($data){
        try{
            $statement = $this->db->connect()->prepare("SELECT v.idventas, c.idcliente, u.idusuarios, v.fecha, v.detalles, c.dni, 
            CONCAT(c.nombre, ' ', c.apellido) AS cliente, CONCAT(u.nombre, ' ', u.apellido) AS usuario, u.rol, v.total 
            FROM ventas v INNER JOIN view_cliente c ON c.idcliente = v.idcliente INNER JOIN view_usuarios u ON u.idusuarios = v.idusuario 
            WHERE v.fecha >= :desde AND v.fecha <= :hasta");          
            $statement->execute(array(':desde' => $data['desde'], ':hasta' => $data['hasta']));
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
		    return $data;

        }catch(PDOException $e){
            return [];
        }
    }
    public function id($idventa){
        try{
            $statement = $this->db->connect()->prepare('SELECT p.idproducto, p.idcategoria, p.nombre, p.descripcion, p.imagen, p.precio, pv.idproducto_venta, pv.cantidad FROM producto p INNER JOIN producto_venta pv ON p.idproducto = pv.idproducto WHERE pv.idventa = :idventa');  
            $statement->bindParam(":idventa", $idventa, PDO::PARAM_INT);
            $statement->execute();
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($data);
		    return $data;
        }catch(PDOException $e){
            var_dump($e);
            return [];
        }
    }
    public function delete($idventa){
        $query = $this->db->connect()->prepare('CALL pa_delete_venta(:idventa)');
        $res = $query->execute(['idventa' => $idventa]);
        return $res;
    }
}

?>