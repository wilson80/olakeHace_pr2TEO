<?php


require_once "modelos/User.php";

session_start();    

class RegistroControlador{
    private $user;
    
    public function __CONSTRUCT(){
        $this->user = new User();
    }

    public function Inicio(){
        if (isset($_SESSION['username'])) {
                header("location:?c=inicio");
        } else {
            require_once "vista/inicioS/registro.php";
        }
        exit(); 



    }
 


    public function insertarUser(){ 
         
        $e = new User();
        $rol = $_POST['rol'];

        $e->setIdRol($rol);
        $e->setNombre($_POST['username']);
        $e->setpasswords($_POST['password']);
        $lastInsertId = $this->user->insertUsuario($e);

                                //inicio de sesion automatico despues de un registro exitoso
        $_SESSION['username'] = $e->getNombre();
        $_SESSION['role'] = $e->getIdRol();
        $_SESSION['id'] = $lastInsertId;
        
 

        header("location:?c=inicio");

        exit;


     }

 


 


}
