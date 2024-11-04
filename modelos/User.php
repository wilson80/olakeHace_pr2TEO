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
 

 

     public function nombrar(){        //partidas de todo el equipo
        try{
         $consulta = $this->pdo->prepare("
         SELECT nombre as yo FROM id_jugador where nombre='wilson';  ");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
     }


     
     
 


    



}