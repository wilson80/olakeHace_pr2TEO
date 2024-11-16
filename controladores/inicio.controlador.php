<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once "modelos/User.php";
require_once "modelos/Publicacion.php";


class InicioControlador{
   private $modelo; 
   private $filtro = "Aceptada";

    public function __CONSTRUCT(){   
        $this->modelo = new Publicacion();
    }
    
   public function Inicio(){
    

        if (isset($_SESSION['username'])) {
            switch ($_SESSION['role']) {
                case 1: 
                        header("location:?c=admin");
                        // require_once "vista/users/admin/index.php"; 
                    break;  
                case 2:
                        header("location:?c=userPublicator");
                            
                            // require_once "vista/users/publicator/index.php"; 
                    break;
                case 3:
                    header("location:?c=user_reg");
                    // require_once "vista/users/user/index.php"; 
                    break;
                default:
                    require_once "vista/inicio/invitado.php";
                    exit;
                break;
            }
        } else {
            // header('Location: vista/inicio/invitado.php');
            require_once "vista/inicio/invitado.php";
            exit(); 

             
            
        }
 
          
    }


 

                    
}

    
