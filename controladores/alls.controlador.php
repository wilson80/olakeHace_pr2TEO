<?php

require_once "modelos/Jugador.php";

class allsControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Jugador;
    }

    public function Inicio(){
        require_once "vista/encabezado.php";
        require_once "vista/todosJ/index.php";
        require_once "vista/pie.php";
    }


}