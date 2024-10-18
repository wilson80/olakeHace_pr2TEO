<?php
 
class Equipo{
    private $pdo;     //mi objeto 

    private $jur_nombre;  //varchar
    private $jur_pais;      //varchar
    private $jur_fundacion;      //varchar
    private $jur_imagen_path;      //varchar
    private $jur_partidasGanadas;   //int
    private $jur_partidasJugadas;   //int
    
    public function __CONSTRUCT(){
        $this->pdo = database::conectar();        
    }


    public function setJur_nombre(string $nombre){
        $this->jur_nombre = $nombre;
    }
    public function getJur_nombre(): ?string{ 
        return $this->jur_nombre;
    }
    public function setJur_pais(string $nombre){
        $this->jur_pais = $nombre;
    }
    public function getJur_pais(): ?string{ 
        return $this->jur_pais;
    }
    public function setJur_fundacion(string $nombre){
        $this->jur_fundacion = $nombre;
    }
    public function getJur_fundacion(): ?string{ 
        return $this->jur_fundacion;
    }
    public function setJur_imagen_path(string $nombre){
        $this->jur_imagen_path = $nombre;
    }
    public function getJur_imagen_path(): ?string{ 
        return $this->jur_imagen_path;
    }


    public function setJur_partidasGanadas(int $nombre){
        $this->jur_partidasGanadas = $nombre;
    }
    public function getJur_partidasGanadas(): ?int{ 
        return $this->jur_partidasGanadas;
    }
    public function setJur_partidasJugadas(int $nombre){
        $this->jur_partidasJugadas = $nombre;
    }
    public function getJur_partidasJugadas(): ?int{ 
        return $this->jur_partidasJugadas;
    }



//  INSERT INTO jugadores (nombre, equipo_id, edad, altura, peso, 
// nacionalidad, total_anotaciones, partidos_ganados,
//  partidos_jugados, imagen_path) 
//  VALUES ('Wilson', 1, 24, 1.80, 75.5, 'Espana', 10, 8, 15, 'assets/img/banderas/banderaEspana.png');
public function InsertarEquipo(Equipo $j){
    try{
        $consulta = "INSERT INTO equipos (nombre, pais, fundacion, imagen_path, partidas_jugadas, partidas_ganadas) 
        VALUES (?,?,?,?,?,?)";
        $this->pdo->prepare($consulta)->execute(array(
            $j->getJur_nombre(),
            $j->getJur_pais(),
            $j->getJur_fundacion(),
            $j->getJur_imagen_path(),
            $j->getJur_partidasJugadas(),
            $j->getJur_partidasGanadas(),
        )
    );

    }catch(Exception $e){
        die($e->getMessage());
    }
}














}