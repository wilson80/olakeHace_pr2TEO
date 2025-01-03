<?php
  session_start();


require_once "modelos/Publicacion.php";
require_once "modelos/User.php";


class user_regControlador{
    // private $titulo = "Aceptadas";
    private $modelo;
    private $currentId;
    // private $filtroReporte = "Sin revision";
    // private $filtro = 2;
    private $pubs;
    private $condicionRep = 1 ;
    private $id_user;
    private $asiste = false;
    private $vista = "home";    //mis_eventos
    private $fechaProx;   
    private $filtroPublico = "familiar";   
    private $filtroCategoria = "nofilter";   



    public function __CONSTRUCT(){
        $this->modelo = new User;
    }


    
    public function Inicio(){

        
        if (isset($_SESSION['username'])) {
            if($_SESSION['role']==3){
                $this->id_user = $_SESSION['id'];
                // var_dump("iduserr: " . $this->id_user);
                // exit;
                
                if (isset($_GET['vista'])) {
                    $this->vista = $_GET['vista'];
                }
                
                if (isset($_SESSION['ftipo'])) {
                    $this->filtroPublico = $_SESSION['ftipo'];
                }

                if (isset($_SESSION['fcategoria'])) {
                    $this->filtroCategoria = $_SESSION['fcategoria'];
                    //  unset($_SESSION['fcategoria']); // no mostrar nuevamente 
                }

                
                if (isset($_GET['ftipo'])) {
                    $_SESSION['ftipo'] = $_GET['ftipo'];
                    $this->filtroPublico = $_SESSION['ftipo'];
                }

                if (isset($_GET['fcategoria'])) {
                    $_SESSION['fcategoria'] = $_GET['fcategoria'];
                    $this->filtroCategoria = $_SESSION['fcategoria'];
                }


                $this->pubs = $this->modelo->viewPublications($this->id_user);
        
                require_once "vista/users/user/index.php"; 
                // header("location:?c=admin");
            }else{
                header("location:?c=inicio");
            }
            
        } else {
            header("location:?c=inicio");
        }
        exit(); 



        



        // $this->filtrarPublications($this->filtro);


        // require_once "vista/users/admin/revision.php"; 
        // exit(); 
        // require_once "vista/encabezado.php";
        // require_once "vista/topsJugadores/index.php";
        // require_once "vista/pie.php";
    }
 
 
    public function filtrar(){
        // $this->filtro = $_GET['filtro'];

        // switch($this->filtro){
        //     case 1:
        //     $this->titulo = "Pendientes";
        //     break;
        //     case 2:
        //         $this->titulo = "Aceptadas";
                
        //         break;
        //         case 3:
        //             $this->titulo = "Vencidas";
                    
        //             break;
        //             case 4:
        //                 $this->titulo = "Rechazadas";
                        
        //                 break;
        //                 case 5:
        //                     $this->titulo = "Reportadas";
                            
        //                     break;
        //                     case 6:
        //                         $this->titulo = "Ocultas";

        //                     break;
        // }
        // $_SESSION['titulo'] = $this->titulo;

        // require_once "vista/users/admin/index.php"; 
 
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






    public function registrarAsistencia() {
   
        // $this->modelo->inse;
        if (isset($_GET['id'])) {
            $this->currentId = $_GET['id'];
            $this->id_user = $_SESSION['id'];

            // var_dump("idP: " . $this->currentId);
            // var_dump("idU: " . $this->id_user);
            // exit;

            $this->modelo->insertarAsistencia($this->id_user, $this->currentId);

            // mensaje_asistencia
            $_SESSION['mensaje_asistencia'] = "Asistencia apuntada correctamente.";

            require_once "vista/users/user/verpub.php";

            // Ahora puedes usar el valor de $id en tu lógica
        } else {
            var_dump("error al registrar asistencia C");
            exit;
        }
    }
    


    
    public function revisarAsistencia() { //elimina la asistencia si 
   
        // $this->modelo->inse;
        if (isset($_GET['id'])) {
            $this->currentId = $_GET['id'];
            $this->id_user = $_SESSION['id'];

            // var_dump("idP: " . $this->currentId);
            // var_dump("idU: " . $this->id_user);
            // exit;

            if($this->modelo->verificarAsistencia($this->id_user, $this->currentId)){
                return true;
            }else{
                return false;
            }            

            // require_once "vista/users/user/verpub.php";

            // Ahora puedes usar el valor de $id en tu lógica
        } else {
            var_dump("error al registrar asistencia C");
            exit;
        }
    }

    public function retirarAsistencia() { //elimina la asistencia si 
   
        // $this->modelo->inse;
        if (isset($_GET['id'])) {
            $this->currentId = $_GET['id'];
            $this->id_user = $_SESSION['id'];

            // var_dump("idP: " . $this->currentId);
            // var_dump("idU: " . $this->id_user);
            // exit;

            $this->modelo->retirarAsistencia($this->id_user, $this->currentId);


            // mensaje_asistencia
            $_SESSION['mensaje_asistencia'] = "Asistencia Retirada correctamente.";

            require_once "vista/users/user/verpub.php";

            // Ahora puedes usar el valor de $id en tu lógica
        } else {
            var_dump("error al registrar asistencia C");
            exit;
        }
    }







 
     


    public function insertarReporte() {//insertarReporte reporte
        $this->id_user = $_SESSION['id'];

       
        if (isset($_POST['publicacion_id']) && isset($_POST['razon'])) {
            // Obtenemos los valores
            $publicacionId = $_POST['publicacion_id'];
            $razonSeleccionada = $_POST['razon'];
            
            // Si la razón seleccionada es "Otro", obtenemos el valor del campo correspondiente
            $otraRazon = isset($_POST['otra-razon']) ? $_POST['otra-razon'] : null;
 
            // Determinamos el ID de motivo (en este caso, asumimos que `razon` es un texto; necesitarías un mapeo a IDs)
            $idMotivo = $this->mapRazonToId($razonSeleccionada, $otraRazon);

      

            $this->modelo->insertarReporte($publicacionId, $idMotivo, $this->id_user);

            header("location:?c=user_reg");
            

        } else {
            echo "Error: Parámetros `publicacion_id` o `razon` faltantes al insertar un reporte.";
        }
    }

    public function insertarReporteUser() {//insertarReporte reporte
        
        $this->id_user = $_SESSION['id'];
        
   
       
        if (isset($_POST['publicacionu_id']) && isset($_POST['razonu'])) {
            // Obtenemos los valores
            $id_publicador = $_POST['publicacionu_id'];
            $razonSeleccionada = $_POST['razonu'];
            
            // Si la razón seleccionada es "Otro", obtenemos el valor del campo correspondiente
            $otraRazon = isset($_POST['otra-razonu']) ? $_POST['otra-razonu'] : null;
 
            //   el ID de motivo (en este caso, asumimos que `razon` es un texto; necesitarías un mapeo a IDs)
            $idMotivo = $this->mapRazonToId($razonSeleccionada, $otraRazon);


            $this->modelo->insertarReporte_user($id_publicador, $idMotivo, $this->id_user);

            header("location:?c=user_reg");
            

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




    public function mostrarPubsVisibles() {
        $this->id_user = $_SESSION['username'];
        $pubs = $this->modelo->viewPublications($this->id_user);


    }


    





 
    




}