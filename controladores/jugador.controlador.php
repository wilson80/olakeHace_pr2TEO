<?php

require_once "modelos/Jugador.php";
require_once "modelos/Equipo.php";

class JugadorControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Jugador;
    }

    public function Inicio(){
        // require_once "vista/encabezado.php";
        require_once "vista/jugadores/index.php";
        // require_once "vista/pie.php";
    }





}