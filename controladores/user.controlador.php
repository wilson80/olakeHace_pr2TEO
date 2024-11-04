<?php
  session_start();


require_once "modelos/Publicacion.php";

class UserControlador{
    private $modelo;
    private $filtro = "Aceptada";

    public function __CONSTRUCT(){
        $this->modelo = new Publicacion;
    }

    public function Inicio(){
    
        // Redirigir si el usuario ya está logueado
        if (isset($_SESSION['username'])) {
            switch ($_SESSION['role']) {
                case 3:
                    require_once "vista/users/user/index.php"; 
                    break;
                case 2:
                    require_once "vista/users/publicator/index.php"; 
                    break;
                case 1: 
                        require_once "vista/users/admin/index.php"; 
                    break;  
                default:
                
                
                break;
            }
        } else {
            // header('Location: vista/inicio/invitado.php');
            require_once "vista/inicio/invitado.php"; 
        }
        exit(); 
    }

     




}