<?php
 
class User{
    private $pdo;     //mi objeto 

    private $jur_nombre;  //varchar
    private $passwords;  //int (id del equipo)
    private $idRol;  //int (id del equipo)
    private $jur_correo;  //int (id del equipo)
    
    public $lastInsertId;  
    
    public function __CONSTRUCT(){
        $this->pdo = database::conectar();        
    }
 

    public function setpasswords(String $id){
        $this->passwords = $id;
    }
    public function getpasswords(): ?string{ 
        return $this->passwords;
    }
    
    public function setNombre(string $nombre){
        $this->jur_nombre = $nombre;
    }
    public function getNombre(): ?string{ 
        return $this->jur_nombre;
    }
    
    public function setIdRol(int $int){
            $this->idRol = $int;
    }
    public function getIdRol(): ?int{ 
        return $this->idRol;
    }




    public function setJur_correo(string $nombre){
        $this->jur_correo = $nombre;
    }
    public function getJur_correo(): ?string{ 
        return $this->jur_correo;
    }
    

    public function insertUsuario($user) {

        try {
            $sql = "INSERT INTO usuario (id_rol, user, password) VALUES (:id_rol, :user, :password)";
            $stmt = $this->pdo->prepare($sql);
            
            // Vinculando los parámetros
            $stmt->bindParam(':id_rol', $user->getIdRol(), PDO::PARAM_INT);
            $stmt->bindParam(':user', $user->getNombre(), PDO::PARAM_STR);
            $stmt->bindParam(':password', $user->getpasswords(), PDO::PARAM_STR);
            
// INSERT INTO usuario (id_rol, user, password) VALUES (1, 'admin', 'admin');
            
            // Ejecutar la consulta
            $stmt->execute();
            $lastInsertId = $this->pdo->lastInsertId();
            
            
            return $lastInsertId;
    
            echo "Usuario insertado correctamente!";
        } catch (PDOException $e) {
            echo "Error al insertar usuario: " . $e->getMessage();
        }
    }
 
 
    
    
    public function insertarAsistencia($idUser, $idPub){     
            try{
                $sql = " CALL insertarAsistencia(:idUser, :idPub);
                ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':idUser', $idUser);
                $stmt->bindParam(':idPub', $idPub);
                
                // Ejecutar la consulta
                $stmt->execute();
        
                // header("location:?c=user");
        
                // echo "Evento insertado correctamente!";
            }catch(PDOException $e){
                echo "Error al insertar publicacion: " . $e->getMessage();
                exit;
                // header("location:?c=user");
            }
        
        

        
    }   


    public function verificarAsistencia($idUser, $idPub){     
        try{
            $sql = " CALL insertarAsistencia(:idUser, :idPub);
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':idUser', $idUser);
            $stmt->bindParam(':idPub', $idPub);
            
            // Ejecutar la consulta
            $stmt->execute();
    
            // header("location:?c=user");
    
            // echo "Evento insertado correctamente!";
        }catch(PDOException $e){
            echo "Error al insertar publicacion: " . $e->getMessage();
            exit;
            // header("location:?c=user");
        }
}   
    
    





    
public function viewPublications($id_user){        //Listar publicaciones aceptadas
    //muestra las publicaciones visibles 
    try{

        $stmt = $this->pdo->prepare("SELECT * FROM vista_publicacion_completa v
        WHERE NOT EXISTS (
            SELECT 1
            FROM reporte r
            WHERE r.id_publicacion = v.id_publicacion
            AND r.id_reportador = :id_user
        )");

        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }catch(Exception $e){
        die($e->getMessage());
    }
 }  

 

 public function viewUnaPublicacion($id){        //Listar publicaciones aceptadas
    // WHERE estado.nombre_estado = 'Aceptada';
    // $id = "Aceptada";
    try{
        
        $consulta = $this->pdo->prepare("
        CALL vista_una_publicacion(:fil);
         ");
        $consulta->bindParam(':fil', $id);
        
        $consulta->execute(); 
        return $consulta->fetch(PDO::FETCH_OBJ);


    }catch(PDOException $e){
        die($e->getMessage());
    }
 }



 
 public function insertarReporte($publicacionId, $idMotivo, $idReportador){

    try{
        $sql = "INSERT INTO reporte (id_publicacion, id_motivo, id_reportador, fecha_report) 
                VALUES (:publicacionId, :idMotivo, :idReportador, NOW())";
            
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':publicacionId', $publicacionId);
        $stmt->bindParam(':idMotivo', $idMotivo);
        $stmt->bindParam(':idReportador', $idReportador);
         


        // Ejecutar la consulta
        $stmt->execute();
 
        // echo "Evento insertado correctamente!";
    }catch(PDOException $e){
        echo "Error al insertar reporte: " . $e->getMessage();
        exit;
        // header("location:?c=user");
    }
}


 
 

public function insertarMotivo($motivo){

    try{
        $sql = "CALL insertar_motivo(:motivo, @id_generado);
            ";
            
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':motivo', $motivo);
         
        // Ejecutar la consulta
        $stmt->execute();
    // Recuperar el id generado
         $result = $this->pdo->query("SELECT @id_generado AS id_motivo")->fetch(PDO::FETCH_ASSOC);
         
         return $result['id_motivo'];

        // echo "Evento insertado correctamente!";
    }catch(PDOException $e){
        echo "Error al insertar Motivo: " . $e->getMessage();
        exit;
        // header("location:?c=user");
    }


    
 
}

    







    



}