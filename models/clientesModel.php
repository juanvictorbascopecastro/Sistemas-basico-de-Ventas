<?php
//include_once 'models/categoria.php';

class ClientesModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    public function insert($datos){
        $query = $this->db->connect()->prepare('CALL pa_insert_cliente (:nombre, :apellido, :telefono, :dni)');
        $res = $query->execute([
            'nombre' => $datos['nombre'], 
            'apellido' => $datos['apellido'],
            'telefono' => $datos['telefono'],
            'dni' => $datos['dni']
        ]);
        //var_dump($res);
        return $res;
    }

    public function get(){
        $items = [];
        try{
            $result = $this->db->connect()->query('SELECT * FROM view_cliente');          
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        }catch(PDOException $e){
            return [];
        }
    }

    public function edit($datos){
        $query = $this->db->connect()->prepare('CALL pa_update_cliente (:nombre, :apellido, :telefono, :dni, :idpersona)');
        $res = $query->execute([
            'idpersona' => $datos['idpersona'], 
            'nombre' => $datos['nombre'], 
            'apellido' => $datos['apellido'],
            'telefono' => $datos['telefono'],
            'dni' => $datos['dni']
        ]);
        //var_dump($res);
        return $res;
    }

    public function delete($datos){
        $query = $this->db->connect()->prepare('CALL pa_delete_cliente(:idpersona)');
        $res = $query->execute(['idpersona' => $datos['idpersona']]);
        return $res;
    }

    public function buscar($dni){
        try{
            $statement = $this->db->connect()->prepare('SELECT * FROM view_cliente WHERE dni = :dni');  
            $statement->bindParam(":dni", $dni, PDO::PARAM_STR);
            $statement->execute();
            $data = $statement->fetch();
		    return $data;
        }catch(PDOException $e){
            return [];
        }
    }
}

?>