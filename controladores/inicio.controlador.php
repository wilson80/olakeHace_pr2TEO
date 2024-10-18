<?php

require_once "modelos/Jugador.php";

class InicioControlador{
   private $modelo; 


    public function __CONSTRUCT(){   
        $this->modelo = new Jugador();
    }
    
   public function Inicio(){
    // require_once "vista/encabezado.php";    
                            //  require_once "vista/inicioS/index.php";
                        header("location:?c=login");

                        
                        //  require_once "vista/users/user/index.php"; 
                        // require_once "vista/inicio/principal.php"; 
                        // require_once "vista/pie.php";
                        
                        
                    }
                    
    }
                // header('Location: /olakeH/controladores/login.controlador.php');