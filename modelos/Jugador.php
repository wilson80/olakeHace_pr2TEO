<?php
 
class Jugador{
    private $pdo;     //mi objeto 

    private $jur_nombre;  //varchar
    private $jur_id;  //int (id del equipo)
    private $jur_edad;    //int
    private $jur_estatura;  //float
    private $jur_peso;      //float
    private $jur_pais;      //varchar
    private $jur_anotaciones;   //int
    private $jur_partidasGanadas;   //int
    private $jur_partidasJugadas;   //int
    
    public function __CONSTRUCT(){
        $this->pdo = database::conectar();        
    }


    public function setJur_id(int $id){
        $this->jur_id = $id;
    }
    public function getJur_id(): ?int{ 
        return $this->jur_id;
    }

    public function setJur_nombre(string $nombre){
        $this->jur_nombre = $nombre;
    }
    public function getJur_nombre(): ?string{ 
        return $this->jur_nombre;
    }
     

     public function cantidadPartidas(){        //partidas de todo el equipo
        try{
         $consulta = $this->pdo->prepare("SELECT SUM(partidasJugadas) as Cantidad FROM id_jugador;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
     }
     public function nombrar(){        //partidas de todo el equipo
        try{
         $consulta = $this->pdo->prepare("
         SELECT nombre as yo FROM id_jugador where nombre='wilson';

         ");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
     }


     public function pullImg(int $id): ?string{        //Listar jugadores
        try{
            $consulta = $this->pdo->prepare("
            SELECT path as yo FROM imagen where id_jugador=$id;
            ");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);

        }catch(Exception $e){
            die($e->getMessage());
        }
     }

     public function viewEquipos(){        //Listar jugadores
        try{
            $consulta = $this->pdo->prepare("
            SELECT 
            nombre AS equipo,
            pais,
            fundacion,
            partidas_jugadas,
            partidas_ganadas,
            (SELECT COUNT(*) FROM jugadores WHERE equipo_id = equipos.id) AS cantidad_jugadores,
            imagen_path AS imagen_equipo
            FROM equipos;
            ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);

        }catch(Exception $e){
            die($e->getMessage());
        }
     }

     public function viewEcuentros(){        //Listar jugadores
        try{
            $consulta = $this->pdo->prepare("
            SELECT 
                e_local.nombre AS equipo_local,
                e_local.imagen_path AS imagen_local,
                e_visitante.nombre AS equipo_visitante,
                e_visitante.imagen_path AS imagen_visitante,
                enc.goles_local,
                enc.goles_visitante,
                enc.fecha,
                enc.lugar,
                enc.edicion,
                enc.resultado
            FROM encuentros enc
            JOIN equipos e_local ON enc.equipo_local_id = e_local.id
            JOIN equipos e_visitante ON enc.equipo_visitante_id = e_visitante.id;
            ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);

        }catch(Exception $e){
            die($e->getMessage());
        }
     }
     
     public function viewAllJugadores(){        //Listar jugadores
        try{
            $consulta = $this->pdo->prepare("
            SELECT 
                j.nombre AS jugador,
                e.nombre AS equipo,
                j.fecha_insercion,
                j.edad,
                j.altura,
                j.peso,
                j.nacionalidad,
                j.imagen_path
            FROM jugadores j
            JOIN equipos e ON j.equipo_id = e.id
            ORDER BY e.nombre, j.nombre;
            ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);

        }catch(Exception $e){
            die($e->getMessage());
        }
     }



     public function jugadorJoven(){        //Listar jugadores
        try{
            $consulta = $this->pdo->prepare("
            SELECT nombre, edad, imagen_path
            FROM jugadores
            ORDER BY edad ASC
            LIMIT 1;
            ");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);

        }catch(Exception $e){
            die($e->getMessage());
        }
     }


     public function jugadorAnotador(){        //Listar jugadores
        try{
            $consulta = $this->pdo->prepare("
           SELECT nombre, total_anotaciones, imagen_path
            FROM jugadores
            ORDER BY total_anotaciones DESC
            LIMIT 1;

            ");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);

        }catch(Exception $e){
            die($e->getMessage());
        }
     }
     public function jugadorGanador(){        //Listar jugadores
        try{
            $consulta = $this->pdo->prepare("
           SELECT nombre, total_anotaciones, imagen_path
            FROM jugadores
            ORDER BY total_anotaciones DESC
            LIMIT 1;

            ");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);

        }catch(Exception $e){
            die($e->getMessage());
        }
     }

//  INSERT INTO jugadores (nombre, equipo_id, edad, altura, peso, 
// nacionalidad, total_anotaciones, partidos_ganados,
//  partidos_jugados, imagen_path) 
//  VALUES ('Wilson', 1, 24, 1.80, 75.5, 'Espana', 10, 8, 15, 'assets/img/banderas/banderaEspana.png');


// public function Insertar(Jugador $j){
//     try{
//         $consulta = "INSERT INTO
//         jugadores (nombre, equipo_id, edad, altura, peso, nacionalidad, total_anotaciones, partidos_ganados, partidos_jugados) 
//         VALUES (?,?,?,?,?,?,?,?,?)";
//         $this->pdo->prepare($consulta)->execute(array(
//             $j->getJur_nombre(),
//             $j->getJur_id(),
//             $j->getjur_edad(),
//             $j->getjur_estatura(),
//             $j->getJur_peso(),
//             $j->getJur_pais(),
//             $j->getJur_anotaciones(),
//             $j->getJur_partidasGanadas(),
//             $j->getJur_partidasJugadas(),
//         )
        
//     );

//     }catch(Exception $e){
//         die($e->getMessage());
//     }   
// }














}