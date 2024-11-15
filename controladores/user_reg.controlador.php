<?php
  session_start();


require_once "modelos/Publicacion.php";

class user_regControlador{
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
    
        require_once "vista/users/user/index.php"; 
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
        // $id = $_GET['id'];
        // var_dump("id: ".$id);
        // exit;
        // $this->titulo = $_SESSION['titulo'] ;
        // Verificar si se recibe el parámetro 'id'
        if (isset($_GET['id'])) {
            $this->currentId = $_GET['id'];
            
            require_once "vista/users/user/verpub.php";

            // Ahora puedes usar el valor de $id en tu lógica
        } else {
            var_dump("No se recibio el id");
            exit;
        }
    }

 
     


    public function insertarReporte() {//insertarReporte reporte
    

       
        if (isset($_POST['publicacion_id']) && isset($_POST['razon'])) {
            // Obtenemos los valores
            $publicacionId = $_POST['publicacion_id'];
            $razonSeleccionada = $_POST['razon'];
            
            // Si la razón seleccionada es "Otro", obtenemos el valor del campo correspondiente
            $otraRazon = isset($_POST['otra-razon']) ? $_POST['otra-razon'] : null;
 
            // Determinamos el ID de motivo (en este caso, asumimos que `razon` es un texto; necesitarías un mapeo a IDs)
            $idMotivo = $this->mapRazonToId($razonSeleccionada, $otraRazon);


            $this->modelo->insertarReporte($publicacionId, $idMotivo );

            $this->Inicio();

        } else {
            echo "Error: Parámetros `publicacion_id` o `razon` faltantes al insertar un reporte.";
        }
    }


    private function mapRazonToId($razon, $otraRazon) {
        // Mapeo de razones a IDs; aquí puedes agregar más razones según tu base de datos
        $motivos = [
            "Contenido violento" => 1,
            "Contenido enganoso" => 2,
            "ubicado en categoria incorrecta" => 3,
            "Parece Spam" => 4,
            "Incita al odio" => 5,
            "Contenido no apto para publico sensible" => 6, // Puedes usar un ID específico para "Otro" o manejarlo de otra manera
            "Otro" => 7 // Puedes usar un ID específico para "Otro" o manejarlo de otra manera
        ];
 
  
        // Si la razón seleccionada es "Otro", usa el valor del campo 'otra-razon'
        if ($razon === "Otro" && !empty($otraRazon)) {
             $nuevoID = 1;
             $nuevoID = $this->modelo->insertarMotivo($otraRazon);   
            return $nuevoID; // Esto debe ser reemplazado por la lógica de inserción
        }

        // Retornamos el ID correspondiente
        return isset($motivos[$razon]) ? $motivos[$razon] : null;
    }












    
     
 
 















    
        
    




}