<?php


class Session {
    private $nombreSession = 'usuario';

    public function __construct(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    public function setUsuarioSession($usuario){
        $_SESSION[$this->nombreSession] = $usuario;
    }

    public function getUsuarioSession(){
        return $_SESSION[$this->nombreSession];
    }

    public function cerrarSession(){
        session_unset();
        session_destroy();
    }

    public function existe(){
        //var_dump($_SESSION[$this->nombreSession]);
        return isset($_SESSION[$this->nombreSession]);
    }
}



?>