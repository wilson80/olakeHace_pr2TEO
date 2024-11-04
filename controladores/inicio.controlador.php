<?php

require_once "modelos/User.php";

class InicioControlador{
   private $modelo; 


    public function __CONSTRUCT(){   
        $this->modelo = new User();
    }
    
   public function Inicio(){
    // require_once "vista/encabezado.php";    
        require_once "vista/inicioS/index.php";
        // header('Location: /olakeH/controladores/login.controlador.php');
        
                        
    }


 

                    
}

    
