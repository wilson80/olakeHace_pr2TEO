<?php
 
class Publicacion{
    private $pdo;     //mi objeto 

    private $m_id_user;  //int
    private $m_id_estado;  //int
    private $m_id_tipo;      //int
    private $m_titulo;      //varchar
    private $m_descripcion;      //varchar
    private $m_lugar;      //varchar
    private $m_fecha_hora;      //varchar
    private $m_cantidad;      //int
    private $m_id_cat;      //int
    private $m_pathImagen;      //varchar
 
    


    public function __CONSTRUCT(){
        $this->pdo = database::conectar();  
        // $this->m_fecha_hora = $fechaHora ? new DateTime($fechaHora) : new DateTime();
      
    }


    public function setId(int $id){
        $this->m_id_user = $id;
    }
    public function getId(): ?int{ 
        return $this->m_id_user;
    }
    
    public function setEstado(int $id){
        $this->m_id_estado = $id;
    }
    public function getEstado(): ?int{ 
        return $this->m_id_estado;
    }
    public function setTipo(int $id){
        $this->m_id_tipo = $id;
    }
    public function getTipo(): ?int{ 
        return $this->m_id_tipo;
    }

 
    public function setTitulo(string $nombre){
        $this->m_titulo = $nombre;
    }
    public function getTitulo(): ?string{ 
        return $this->m_titulo;
    }
    public function setDescripcion(string $nombre){
        $this->m_descripcion = $nombre;
    }
    public function getDescripcion(): ?string{ 
        return $this->m_descripcion;
    }
    public function setLugar(string $nombre){
            $this->m_lugar = $nombre;
    }
    public function getLugar(): ?string{ 
        return $this->m_lugar;
    }

    public function setFecha_hora($fecha_hora){
            $this->m_fecha_hora = new DateTime($fecha_hora);
    }
    public function getFecha_hora(){ 
        return $this->m_fecha_hora->format('Y-m-d H:i:s');
    }



    public function setCat(int $id){
        $this->m_id_cat = $id;
    }
    public function getCat(): ?int{ 
        return $this->m_id_cat;
    }
    public function setCantidad(int $id){
        $this->m_cantidad = $id;
    }
    public function getCantidad(): ?int{ 
        return $this->m_cantidad;
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


     









     public function viewFiltradas_estados($filtro){        //Listar publicaciones aceptadas
        // WHERE estado.nombre_estado = 'Aceptada';
        // $filtro = "Aceptada";
        try{
            $consulta = $this->pdo->prepare("
            CALL vista_publicacion_completa_param(:fil);
            ");
            $consulta->bindParam(':fil', $filtro);
            
            $consulta->execute(); 
            return $consulta->fetchAll(PDO::FETCH_OBJ);

        }catch(PDOException $e){
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




 
     
     public function viewPublications_byUser($user){         
        try{
            $consulta = $this->pdo->prepare("
            SELECT publicacion.*, estado.nombre_estado, tipo.descripcion_publico AS tipoPublico, categorias.nombre_categoria
            FROM publicacion
            JOIN estado ON publicacion.id_estado = estado.id_estado
            JOIN tipo ON publicacion.id_tipo = tipo.id_tipo
            JOIN categorias ON tipo.id_categoria = categorias.id_categoria
            WHERE publicacion.id_user = :id_user;
            
            ");
            $consulta->bindParam(':id_user', $user);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);

        }catch(PDOException $e){
            die($e->getMessage());
        }
     }
     
     
     public function getReportesByid($id){     
        try{
            $consulta = $this->pdo->prepare("SELECT 
                reporte.id_reporte,
                reporte.id_publicacion,
                reporte.id_motivo,
                motivo.descripcion_motivo AS motivo,
                reporte.id_estado,
                estadoReporte.nombre_estado AS estado,
                reporte.id_reportador,
                usuario.user AS reportador,
                reporte.fecha_report
            
                FROM 
                reporte
                JOIN 
                motivo ON reporte.id_motivo = motivo.id_motivo
                JOIN 
                estadoReporte ON reporte.id_estado = estadoReporte.id_estado
                JOIN 
                usuario ON reporte.id_reportador = usuario.id_user
                WHERE  reporte.id_publicacion = :id;
            ");

    
            $consulta->bindParam(':id', $id);
            $consulta->execute();
                      
      
            return $consulta->fetchAll(PDO::FETCH_OBJ);

        }catch(PDOException $e){
            die($e->getMessage());
        }
     }     
     
     
     
     
 
 

// public function insertPublication(Publicacion $j){
//     try{
//         // VALUES (5, 2, 1, 'Centro de Convenciones', '2024-10-20 10:00:00', 'Evento de tecnología', 200, 'pub 8', 7)";
//         $consulta = 
        
//     "INSERT INTO publicacion (id_user, 
//     id_estado, id_tipo,titulo,descripcion,lugar,fecha_hora,cantidad_asistentes,id_cat)
//     VALUES (?,?,?,?,?,?,?,?,?)";
     
         
//         // "INSERT INTO
//         // jugadores (nombre, equipo_id, edad, altura, peso, nacionalidad, total_anotaciones, partidos_ganados, partidos_jugados) 
//         // VALUES (?,?,?,?,?,?,?,?,?)";
 
//         $this->pdo->prepare($consulta)->execute(array(
//             $j->getId(),
            
//         )
        
//     );

//     }catch(Exception $e){
//         die($e->getMessage());
//     }   


// }


//////pendient4e
public function updateReporte($id, $idE){
    try{
        $sql = " UPDATE reporte     
                 set id_estado = :id
                 WHERE id_reporte = :idE;
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':idE', $idE);
        
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



public function updatePublicacion($idP, $idE){
    try{
        $sql = "CALL actualizar_activar_publicaciones(:idP, :idE);
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idP', $idP);
        $stmt->bindParam(':idE', $idE);
        
        // Ejecutar la consulta
        $stmt->execute();

        // header("location:?c=user");

        // echo "Evento insertado correctamente!";
    }catch(PDOException $e){
        echo "Error al actualizar Publicaciones(AceptarRechazar): " . $e->getMessage();
        exit;
        // header("location:?c=user");
    }


}

 



public function insertPublication2($publication){
    try{
        $sql = "INSERT INTO publicacion (id_user, id_estado, id_tipo, lugar, fecha_hora, descripcion, cantidad_asistentes, titulo, id_cat)
        VALUES (:user, :estado, :tipo, :lugar, :fh, :descripcion, :cantidad, :titulo, :cat)
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user', $publication->getId());
        $stmt->bindParam(':estado', $publication->getEstado());
        $stmt->bindParam(':tipo', $publication->getTipo());
        $stmt->bindParam(':lugar', $publication->getLugar());
        $stmt->bindParam(':fh', $publication->getFecha_hora());
        $stmt->bindParam(':descripcion', $publication->getDescripcion());
        $stmt->bindParam(':cantidad', $publication->getCantidad());
        $stmt->bindParam(':titulo', $publication->getTitulo());
        $stmt->bindParam(':cat', $publication->getCat());
        
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



public function getPermisosUser($idUser){
    try{
        $sql = "SELECT aprobAuto 
                FROM gestion_permisos
                WHERE id_user = :idUser;" 
        ;
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idUser', $idUser);
         
        
        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el valor de aprobAuto
            $id_permiso = $stmt->fetchColumn();

            return (int)$id_permiso;  // Convertir el resultado a un entero y devolverlo
          

        // echo "Evento insertado correctamente!";
    }catch(PDOException $e){
        echo "Error al insertar publicacion: " . $e->getMessage();
        exit;
        // header("location:?c=user");
    }


    
 
}


 
// public function insertarReporte($publicacionId, $idMotivo, $idReportador){

//     try{
//         $sql = "INSERT INTO reporte (id_publicacion, id_motivo, id_reportador, fecha_report) 
//                 VALUES (:publicacionId, :idMotivo, :idReportador, NOW())";
            
//         $stmt = $this->pdo->prepare($sql);
//         $stmt->bindParam(':publicacionId', $publicacionId);
//         $stmt->bindParam(':idMotivo', $idMotivo);
//         $stmt->bindParam(':idReportador', $idReportador);
         


//         // Ejecutar la consulta
//         $stmt->execute();
 
//         // echo "Evento insertado correctamente!";
//     }catch(PDOException $e){
//         echo "Error al insertar reporte: " . $e->getMessage();
//         exit;
//         // header("location:?c=user");
//     }
// }










// public function insertarMotivo($motivo){

//     try{
//         $sql = "CALL insertar_motivo(:motivo, @id_generado);
//             ";
            
//         $stmt = $this->pdo->prepare($sql);
//         $stmt->bindParam(':motivo', $motivo);
         
//         // Ejecutar la consulta
//         $stmt->execute();
//     // Recuperar el id generado
//          $result = $this->pdo->query("SELECT @id_generado AS id_motivo")->fetch(PDO::FETCH_ASSOC);
         
//          return $result['id_motivo'];

//         // echo "Evento insertado correctamente!";
//     }catch(PDOException $e){
//         echo "Error al insertar Motivo: " . $e->getMessage();
//         exit;
//         // header("location:?c=user");
//     }


    
 
// }


  

 



















}