<?php

require_once "modelos/Jugador.php";

class topsControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Jugador;
    }

    public function Inicio(){
        require_once "vista/encabezado.php";
        require_once "vista/topsJugadores/index.php";
        require_once "vista/pie.php";
    }


}