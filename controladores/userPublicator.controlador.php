<?php

// use Random\Engine\PcgOneseq128XslRr64;

  session_start();
 
require_once "modelos/Publicacion.php";


class UserPublicatorControlador{ 
    private $modelo;
    private $filtro = "Aceptada";


    public function __CONSTRUCT(){ 
        $this->modelo = new Publicacion;
    }

    public function Inicio(){ 
        require_once "vista/users/publicator/index.php"; 

    }


   public function insertPublication(){
       $estado = 1;
       $idUser = $_POST['id_user'];
       //identificar si el user tiene permisos automaticos y set a el estado de la nueva publicacion
       $idPermiso = $this->modelo->getPermisosUser($idUser);
       
       if($idPermiso == 0){        
           $estado = 1;        
        }else{  
            $estado = 2;        //significa estado aceptado
        }
        
        $e = new Publicacion();
        
        $e->setId($idUser);
        $e->setEstado($estado);
        $e->setTipo($_POST['tipo']);
        $e->setLugar($_POST['lugar']);
        $e->setFecha_hora($_POST['fecha-hora']);
        $e->setDescripcion($_POST['descripcion']);  
        $cantidad=$_POST['cantidad-asistentes'];
        if(isset($cantidad)){
            $e->setCantidad($cantidad);
        }else{
            $cantidad = 0;
            $e->setCantidad($cantidad);
        }
        $e->setTitulo($_POST['titulo']);
        $e->setCat($_POST['categoria']);
        $this->modelo->insertPublication2($e);
 
               // echo "Error en controlador insertarPub..: " . $e->getMessage();
            // header("location:?c=alls");

        
            header("location:?c=userPublicator");
            exit;
            
     }
   
    public function mostrarFormulario(){
        //verificar si el usuario no esta baneado
        require_once "vista/users/publicator/index.php"; 
        
    }
    
    
    
    
    
    










    


}