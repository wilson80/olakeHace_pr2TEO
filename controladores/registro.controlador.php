<?php


require_once "modelos/User.php";

session_start();    

class RegistroControlador{
    private $user;
    
    public function __CONSTRUCT(){
        $this->user = new User();
    }

    public function Inicio(){
        require_once "vista/inicioS/registro.php";

    }
 


    public function insertarUser(){ 
         
        $e = new User();
        
        $e->setIdRol(2);
        $e->setNombre($_POST['username']);
        $e->setpasswords($_POST['password']);
        $lastInsertId = $this->user->insertUsuario($e);

                                //inicio de sesion automatico despues de un registro exitoso
        $_SESSION['username'] = $e->getNombre();
        $_SESSION['role'] = $e->getIdRol();
        $_SESSION['id'] = $lastInsertId;
        
 

        header("location:?c=user");

        exit;


     }

 


 


}
