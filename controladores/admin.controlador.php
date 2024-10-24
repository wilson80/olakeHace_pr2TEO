<?php
  session_start();


require_once "modelos/Publicacion.php";

class adminControlador{
    private $modelo;
    private $filtro = "Pendiente";

    public function __CONSTRUCT(){
        $this->modelo = new Publicacion;
    }


    
    public function Inicio(){
        // $this->filtrarPublications($this->filtro);
        require_once "vista/users/admin/index.php"; 
        // exit(); 
        // require_once "vista/encabezado.php";
        // require_once "vista/topsJugadores/index.php";
        // require_once "vista/pie.php";
    }
    
    public function filtrar(){
        $this->filtro = $_GET['filtro'];
        // header("location: ?c=admin");
        require_once "vista/users/admin/index.php"; 
        // exit;
    }
 
 



        
    




}