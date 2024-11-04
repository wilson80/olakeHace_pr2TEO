<?php
 
require_once "modelos/Publicacion.php";


class UserPublicatorControlador{ 
    private $modeloPub;

    public function __CONSTRUCT(){ 
        $this->modeloPub = new Publicacion;
    }

    public function Inicio(){ 

    }
 

     public function insertPublication(){
    
            $e = new Publicacion();
            
            $e->setId($_POST['id_user']);
            $e->setEstado($_POST['estado']);
            $e->setTipo($_POST['tipo']);
            $e->setLugar($_POST['lugar']);
            $e->setFecha_hora($_POST['fecha-hora']);
            $e->setDescripcion($_POST['descripcion']);  
            $e->setCantidad($_POST['cantidad-asistentes']);
            $e->setTitulo($_POST['titulo']);
            $e->setCat($_POST['categoria']);
            $this->modeloPub->insertPublication2($e);

               // echo "Error en controlador insertarPub..: " . $e->getMessage();
            // header("location:?c=alls");

        
            header("location:?c=user");
            exit;
     }

    


}