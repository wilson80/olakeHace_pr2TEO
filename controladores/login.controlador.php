<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


// require_once "modelos/Publicacion.php";
 
include "modelos/login_svc.php";
 

class loginControlador{
    private $modelo;
    private $user;
    
    public function __CONSTRUCT(){
        // $this->modelo = new Publicacion;
      
    }

    public function Inicio(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $login_svc = new Login_svc();
            $user = $login_svc->validateLogin($username, $password);
            if ($user){
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $user['id_rol'];
                $_SESSION['id'] = $user['id_user'];
                // header("location:?c=user");
                echo 'si hay userrrr';
            } else {
                echo 'Noooo  hay userrrr';
                $_SESSION['error'] = "Usuario o contraseña incorrectos.";
                // require_once "vista/inicioS/index.php";
            }
            
            header("location:?c=user");
            // header('Location: /olakeH/controladores/identificateUser.php');
            exit();
        }
         
    }
 


  


    public function otra(){
        // header("location: ?c=admin");
        // exit;
    }


}
