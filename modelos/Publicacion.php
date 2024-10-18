<?php
 
class Publicacion{
    private $pdo;     //mi objeto 

    private $m_id;  //varchar
    private $m_titulo;      //varchar
    private $m_descripcion;      //varchar
    private $m_tipoPublico;      //varchar
    private $m_categoria;      //varchar
    private $m_lugar;      //varchar
    private $m_fecha_hora;      //varchar
    private $m_pathImagen;      //varchar
 
    
    public function __CONSTRUCT(){
        $this->pdo = database::conectar();        
    }


    public function setId(int $id){
        $this->m_id = $id;
    }
    public function getId(): ?int{ 
        return $this->m_id;
    }

    public function setTitulo(string $nombre){
        $this->m_titulo = $nombre;
    }
    public function getTitulo(): ?string{ 
        return $this->m_titulo;
    }
     
 
 
    
    
    
    public function viewEquipos(){        //Listar publicaciones aceptadas
        try{
            $consulta = $this->pdo->prepare("
            SELECT publicacion.*, estado.nombre_estado, tipo.descripcion_publico AS tipoPublico, categorias.nombre_categoria
            FROM publicacion
            JOIN estado ON publicacion.id_estado = estado.id_estado
            JOIN tipo ON publicacion.id_tipo = tipo.id_tipo
            JOIN categorias ON tipo.id_categoria = categorias.id_categoria
            WHERE estado.nombre_estado = 'Aceptada';
            ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);

        }catch(Exception $e){
            die($e->getMessage());
        }
     }

 
     
   



    //  public function jugadorJoven(){        //Listar jugadores
    //     try{
    //         $consulta = $this->pdo->prepare("
    //         SELECT nombre, edad, imagen_path
    //         FROM jugadores
    //         ORDER BY edad ASC
    //         LIMIT 1;
    //         ");
    //         $consulta->execute();
    //         return $consulta->fetch(PDO::FETCH_OBJ);

    //     }catch(Exception $e){
    //         die($e->getMessage());
    //     }
    //  }
 

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