<?php
include_once 'models/prueba.php';

class ReportesModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getMonthVentas(){
        try{
            $result = $this->db->connect()->query("SELECT date, COUNT(ventas.idventas) AS cantidad
            FROM (
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 1 MONTH AS date UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 2 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 3 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 4 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 5 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 6 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 7 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 8 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 9 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 10 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 11 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 12 MONTH
            ) AS dates
            LEFT JOIN ventas ON fecha >= date AND fecha < date + INTERVAL 1 MONTH
            GROUP BY date");          
            $result->execute();
            $data = $result->fetchALL(PDO::FETCH_ASSOC);
            return $data;
        }catch(PDOException $e){
            return 0;
        }
    }
    public function getMonthGanancias(){
        try{
            $result = $this->db->connect()->query("SELECT date, SUM(ventas.total) AS total
            FROM (
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 1 MONTH AS date UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 2 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 3 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 4 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 5 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 6 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 7 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 8 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 9 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 10 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 11 MONTH UNION ALL
                SELECT LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 12 MONTH
            ) AS dates
            LEFT JOIN ventas ON fecha >= date AND fecha < date + INTERVAL 1 MONTH
            GROUP BY date");          
            $result->execute();
            $data = $result->fetchALL(PDO::FETCH_ASSOC);
            return $data;
        }catch(PDOException $e){
            return 0;
        }
    }
    public function getClientesFrecuentes(){
        try{
            $result = $this->db->connect()->query("SELECT COUNT(v.idcliente) AS cantidad, SUM(v.total) AS total, c.dni, CONCAT(p.nombre, ' ', p.apellido) AS cliente FROM ventas v INNER JOIN cliente c ON c.idcliente = v.idcliente
            INNER JOIN persona p ON p.idpersona = c.idpersona
            WHERE v.fecha >= date_sub(now(), interval 6 month)
            GROUP BY v.idcliente ORDER BY cantidad DESC LIMIT 6");          
            $result->execute();
            $data = $result->fetchALL(PDO::FETCH_ASSOC);
            return $data;
        }catch(PDOException $e){
            return 0;
        }
    }
    public function getProductosMasSolicitados(){
        try{
            $result = $this->db->connect()->query("SELECT COUNT(pv.idproducto) AS cantidad, p.nombre AS producto, p.precio, SUM(p.precio) AS total FROM producto_venta pv INNER JOIN producto p ON p.idproducto = pv.idproducto
            GROUP BY pv.idproducto ORDER BY cantidad DESC");          
            $result->execute();
            $data = $result->fetchALL(PDO::FETCH_ASSOC);
            return $data;
        }catch(PDOException $e){
            return 0;
        }
    }
}
?>