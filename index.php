<?php

require_once "modelos/database.php";



if(!isset($_GET['c'])){
    require_once "controladores/inicio.controlador.php";
    $controlador = new InicioControlador();
    call_user_func(array($controlador, "Inicio"));
}else{
    $controlador = $_GET['c'];
    require_once 
    "controladores/$controlador.controlador.php";
    $controlador = ucwords($controlador)."Controlador";
    $controlador = new $controlador;
    $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
    call_user_func(array($controlador, $accion));

}



    //  La función call_user_func() es una forma especial de llamar a una función PHP existente .
    // Toma la función a llamar como su primer parámetro,
    // con los parámetros a pasar a la variable function 
    // como múltiples parámetros a sí misma.

