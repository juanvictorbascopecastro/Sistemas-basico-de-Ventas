
<?php

class LoginModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function login($datos){
        try{
            $statement = $this->db->connect()->prepare('SELECT p.idpersona, u.idusuarios, p.nombre, p.apellido, p.telefono, u.rol, u.email FROM persona p INNER JOIN usuarios u ON (u.idpersona = p.idpersona) WHERE u.email = :email AND u.password = :password');  
            $statement->bindParam(":email", $datos['email'], PDO::PARAM_STR);
            $statement->bindParam(":password", $datos['password'], PDO::PARAM_STR);
            $statement->execute();
            $data = $statement->fetch();
		    return $data;
        }catch(PDOException $e){
            return [];
        }
    }
}

?>