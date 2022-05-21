<?php
//include_once 'models/categoria.php';

class UsuariosModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($datos){
        $query = $this->db->connect()->prepare('CALL pa_insert_usuarios (:nombre, :apellido, :telefono, :rol, :email, :password)');
        $res = $query->execute([
            'nombre' => $datos['nombre'], 
            'apellido' => $datos['apellido'],
            'telefono' => $datos['telefono'],
            'rol' => $datos['rol'],
            'email' => $datos['email'],
            'password' => $datos['password']
        ]);
        return $res;
    }

    public function get(){
        $items = [];
        try{
            $result = $this->db->connect()->query('SELECT * FROM view_usuarios');          
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        }catch(PDOException $e){
            return [];
        }
    }

    public function edit($datos){
        $query = $this->db->connect()->prepare('CALL pa_update_usuario (:nombre, :apellido, :telefono, :rol, :idpersona)');
        $res = $query->execute([
            'idpersona' => $datos['idpersona'], 
            'nombre' => $datos['nombre'], 
            'apellido' => $datos['apellido'],
            'telefono' => $datos['telefono'],
            'rol' => $datos['rol']
        ]);
        return $res;
    }

    public function delete($datos){
        $query = $this->db->connect()->prepare('CALL pa_delete_usuario(:idpersona)');
        $res = $query->execute(['idpersona' => $datos['idpersona']]);
        return $res;
    }
    public function id($idpersona){
        try{
            $statement = $this->db->connect()->prepare('SELECT p.idpersona, u.idusuarios, p.nombre, p.apellido, p.telefono, u.rol, u.email FROM persona p INNER JOIN usuarios u ON (u.idpersona = p.idpersona) WHERE u.idpersona = :idpersona');  
            $statement->bindParam(":idpersona", $idpersona, PDO::PARAM_INT);
            $statement->execute();
            $data = $statement->fetch();
		    return $data;
        }catch(PDOException $e){
            return [];
        }
    }
    public function verificarPassword($datos){
        try{
            $statement = $this->db->connect()->prepare('SELECT p.idpersona, u.idusuarios, p.nombre, p.apellido, p.telefono, u.rol, u.email FROM persona p INNER JOIN usuarios u ON (u.idpersona = p.idpersona) WHERE u.idpersona = :idpersona AND  u.password = :password');  
            $statement->bindParam(":idpersona", $datos['idpersona'], PDO::PARAM_INT);
            $statement->bindParam(":password", $datos['password'], PDO::PARAM_STR);
            $statement->execute();
            $data = $statement->fetch();
		    return $data;
        }catch(PDOException $e){
            return [];
        }
    }
    public function editAcceso($datos){
        try{
            $query = $this->db->connect()->prepare('CALL pa_update_acceso (:idpersona, :email, :password)');
            $res = $query->execute([
                'idpersona' => $datos['idpersona'], 
                'email' => $datos['email'], 
                'password' => $datos['password']
            ]);
            return $res;
        }catch(PDOException $e){
            return null;
        }
    }

}

?>