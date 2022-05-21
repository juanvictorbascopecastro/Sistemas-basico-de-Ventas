<?php
include_once 'models/prueba.php';

class HomeModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getCountVentas(){
        try{
            $result = $this->db->connect()->query('SELECT COUNT(*) AS c FROM ventas');          
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            return $data['c'];
        }catch(PDOException $e){
            return 0;
        }
    }
    public function getCountProductos(){
        try{
            $result = $this->db->connect()->query('SELECT COUNT(*) AS c FROM producto');          
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            return $data['c'];
        }catch(PDOException $e){
            return 0;
        }
    }
    public function getCountClientes(){
        try{
            $result = $this->db->connect()->query('SELECT COUNT(*) AS c FROM cliente');          
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            return $data['c'];
        }catch(PDOException $e){
            return 0;
        }
    }
    public function getCountUsuarios(){
        try{
            $result = $this->db->connect()->query('SELECT COUNT(*) AS c FROM usuarios');          
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            return $data['c'];
        }catch(PDOException $e){
            return 0;
        }
    }
}

?>