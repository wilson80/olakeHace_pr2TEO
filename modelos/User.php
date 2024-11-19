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
        try {
            $sql = "SELECT EXISTS (
                        SELECT 1
                        FROM asistencia
                        WHERE id_usuario = :id_usuario AND id_publicacion = :id_publicacion
                    ) AS es_asistente";
        
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_usuario', $idUser, PDO::PARAM_INT);
            $stmt->bindParam(':id_publicacion', $idPub, PDO::PARAM_INT);
        
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
            return (bool)$resultado['es_asistente']; // Retorna true o false
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }   

    public function retirarAsistencia($idUser, $idPub){     
        try {
            $sql = "CALL retirar_asistencia(:id_user, :id_publicacion)";
    
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
            $stmt->bindParam(':id_publicacion', $idPub, PDO::PARAM_INT);
    
            $stmt->execute();
            // return true; // Éxito
        } catch (PDOException $e) {
            echo "Error al retirar asistencia: " . $e->getMessage();
            return false;
        }
    }   
    


    





    
public function viewPublications($id_user){        //Listar publicaciones aceptadas
                                                //muestra las publicaciones visibles 
                                                //No muestra las publicaciones que este usuario ha reportado 
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
public function insertarReporte_user($publicacionId, $idMotivo, $idReportador){


    try{
        $sql = "INSERT INTO reporte_pub (id_user, id_motivo, id_reportador, fecha_report) 
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





public function obtenerEventosAsistente($idUser) {
 
    try {
        $sql = "SELECT 
                    p.id_publicacion,
                    p.titulo,
                    p.imgdir,
                    p.lugar,
                    p.fecha_hora,
                    p.descripcion,
                    p.cantidad_asistentes,
                    c.nombre_categoria AS categoria,
                    t.descripcion_publico AS tipo_publico,
                    e.nombre_estado AS estado
                FROM
                    asistencia a
                JOIN 
                    publicacion p ON a.id_publicacion = p.id_publicacion
                JOIN 
                    categorias c ON p.id_cat = c.id_categoria
                JOIN 
                    tipo t ON p.id_tipo = t.id_tipo
                JOIN 
                    estado e ON p.id_estado = e.id_estado
                WHERE 
                    a.id_usuario = :id_user
                ORDER BY 
                    ABS(TIMESTAMPDIFF(SECOND, NOW(), p.fecha_hora)) ASC;
                ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->execute();
        
        // return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve un array de eventos
        return $stmt->fetchAll(PDO::FETCH_OBJ);

        
    } catch (PDOException $e) {
        echo "Error al obtener eventos: " . $e->getMessage();
        return [];
    }
}



public function eventoMasProximo($idUser) {
 
    try {
        $sql = "SELECT 
                    p.id_publicacion,
                    p.titulo,
                    p.lugar,
                    p.fecha_hora,
                    p.descripcion,
                    p.cantidad_asistentes,
                    c.nombre_categoria AS categoria,
                    t.descripcion_publico AS tipo_publico,
                    e.nombre_estado AS estado
                FROM
                    asistencia a
                JOIN 
                    publicacion p ON a.id_publicacion = p.id_publicacion
                JOIN 
                    categorias c ON p.id_cat = c.id_categoria
                JOIN 
                    tipo t ON p.id_tipo = t.id_tipo
                JOIN 
                    estado e ON p.id_estado = e.id_estado
                WHERE 
                    a.id_usuario = :id_user
                ORDER BY 
                    ABS(TIMESTAMPDIFF(SECOND, NOW(), p.fecha_hora)) ASC;
                ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->execute();
        
        // return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve un array de eventos
        return $stmt->fetch(PDO::FETCH_OBJ);

        
    } catch (PDOException $e) {
        echo "Error al obtener eventos: " . $e->getMessage();
        return [];
    }
}
    







    



}