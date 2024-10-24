 
  
<?php

session_start();
require_once "modelos/Jugador.php";

class LogoutControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Jugador;
    }

    public function Inicio(){
   
        session_unset(); // eliminar variables de sesión
        session_destroy(); // Destruir sesión
        // header("location:?c=inicio");
        require_once "vista/inicioS/index.php";

        exit();
         
        // require_once "vista/pie.php";
    }


}

