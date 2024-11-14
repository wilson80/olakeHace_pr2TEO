 
<?php

require_once "modelos/User.php";

require_once "modelos/Publicacion.php";

class ReporteControlador{
   private $modelo; 
    private $pdo;

    public function __CONSTRUCT(){   
        $this->modelo = new User();
        $pdo  = database::conectar(); 
    }
    
   public function Inicio(){
     
                        
    }   



   public function reportar(){
               $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['publicationId']) && isset($data['motivoId'])) {
            $publicationId = $data['publicationId'];
            $motivoId = $data['motivoId'];

            // Conectar a la base de datos
            include_once 'conexion.php'; // Incluye tu archivo de conexión a PDO
        



            try {
                // Insertar en la tabla reporte
                $stmt = $pdo->prepare("INSERT INTO reporte (id_publicacion, id_motivo, fecha_report) VALUES (:id_publicacion, :id_motivo, NOW())");
                $stmt->bindParam(':id_publicacion', $publicationId, PDO::PARAM_INT);
                $stmt->bindParam(':id_motivo', $motivoId, PDO::PARAM_INT);
                $stmt->execute();

                echo json_encode(['success' => true]);
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'message' => $e->getMessage()]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
        }

        
     
        
    }








 

                    
}



 





    
