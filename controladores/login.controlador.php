<?php

require_once "modelos/Publicacion.php";
// require_once "vista/users/user/index.php";

// header("location:?c=user");


class loginControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Publicacion;
    }

    public function Inicio(){
        header("location:?c=user");

        // require_once "vista/encabezado.php";
        // require_once "vista/users/user/index.php"; 
        // require_once "vista/topsJugadores/index.php";
        // require_once "vista/pie.php";
    }


}
