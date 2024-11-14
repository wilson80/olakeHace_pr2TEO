<?php

require_once "modelos/User.php";
require_once "modelos/Publicacion.php";


class InicioControlador{
   private $modelo; 


    public function __CONSTRUCT(){   
        $this->modelo = new Publicacion();
    }
    
   public function Inicio(){
    // require_once "vista/encabezado.php";    
        // require_once "vista/inicioS/index.php";
        require_once "vista/inicio/invitado.php";

        // header('Location: /olakeH/controladores/login.controlador.php');
        
                        
    }


 

                    
}

    
