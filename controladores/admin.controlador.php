<?php
  session_start();


require_once "modelos/Publicacion.php";

class adminControlador{
    private $titulo = "Aceptadas";
    private $modelo;
    private $currentId;
    private $filtroReporte = "Sin revision";
    private $filtro = 2;
    private $reportes;
    private $condicionRep = 1 ;

    public function __CONSTRUCT(){
        $this->modelo = new Publicacion;
    }


    
    public function Inicio(){
        // $this->filtrarPublications($this->filtro);

        if (isset($_SESSION['username'])) {
            $rol = $_SESSION['role']; 
            if($rol==1){
                // header("location:?c=admin");
                require_once "vista/users/admin/index.php"; 
            }else{
                // require_once "vista/users/admin/index.php"; 
                header("location:?c=inicio");
                exit;
            }
            
        } else {
            header("location:?c=inicio");
            exit;
        }

        // require_once "vista/users/admin/index.php"; 
        // require_once "vista/users/admin/revision.php"; 
        // exit(); 
        // require_once "vista/encabezado.php";
        // require_once "vista/topsJugadores/index.php";
        // require_once "vista/pie.php";
    }
 
 
    public function filtrar(){
        $this->filtro = $_GET['filtro'];

        switch($this->filtro){
            case 1:
            $this->titulo = "Pendientes";
            break;
            case 2:
                $this->titulo = "Aceptadas";
                
                break;
                case 3:
                    $this->titulo = "Vencidas";
                    
                    break;
                    case 4:
                        $this->titulo = "Rechazadas";
                        
                        break;
                        case 5:
                            $this->titulo = "Reportadas";
                            
                            break;
                            case 6:
                                $this->titulo = "Ocultas";

                            break;
        }
        $_SESSION['titulo'] = $this->titulo;

        require_once "vista/users/admin/index.php"; 
 
    }
 

 

    public function mostrarPub() {
        $this->titulo = $_SESSION['titulo'] ;
        // Verificar si se recibe el parámetro 'id'
        if (isset($_GET['id'])) {
            $this->currentId = $_GET['id'];
            switch($this->titulo){
                case "Reportadas": 
                    require_once "vista/users/admin/reportadas.php";
                    break;
                    case "Pendientes": 
                        require_once "vista/users/admin/pendientes.php";
                    break;
                    case "Aceptadas": 
                        require_once "vista/users/admin/revision.php";
                    break;
            } 

            // $id = $_GET['id'];
            // var_dump("id: ".$id);
            // exit;
            // Ahora puedes usar el valor de $id en tu lógica
        } else {
            var_dump("No se recibio el id");
            exit;
        }
    }



    public function mostrarReportes() {


        if (isset($_GET['id'])) {
            $this->currentId = $_GET['id'];

        } else {
            var_dump("No se recibio el id");
            exit;
        }

        $this->reportes = $this->modelo->getReportesByid($this->currentId);
        require_once "vista/users/admin/reportadas_reportes.php";
    }
    

    public function mostrarFiltrarReportes() {
        
        $this->currentId = $_GET['id'];
        $filtro = $_GET['tipor'];
        $this->condicionRep = $_GET['tipor'];
        switch($filtro){
            case 1:
                $this->filtroReporte = "Sin Revision";
                break;
                case 2:
                    $this->filtroReporte = "Ignorado";
                    break;
                    case 3:
                        $this->filtroReporte = "Aceptado";
                        break;
                    }
                    
        // var_dump("aquiii>>: " . $this->filtroReporte);
        //         exit;
        $this->reportes = $this->modelo->getReportesByid($this->currentId);
                    

            
     
        


        require_once "vista/users/admin/reportadas_reportes.php";
    }

    public function updateReporte() {
        $this->currentId =  $_GET['id'];
        $id_r =  $_GET['id_e'];
        $id_e = $_GET['id_r'];
        
        $this->modelo->updateReporte($id_r, $id_e);
        $this->mostrarFiltrarReportes();
        // mensaje exitooo
        
    }
    
    public function updatePub() {
        $this->currentId = $_GET['id'];
        $idUpdate = $_GET['idU'];
        // var_dump("idP: " . $this->currentId);    
        // var_dump("idUP: " . $idUpdate);
        // exit;
        $this->modelo->updatePublicacion($this->currentId, $idUpdate);

        //update estado  publicacion (2 , 4) aceptada y rechazada


        $this->Inicio();
    }
    





    
     
 
 







    
        
    




}