<?php
 
class Encuentro{
    private $pdo;     //mi objeto 

    // INSERT INTO encuentros (equipo_local_id, equipo_visitante_id, goles_local, goles_visitante, fecha, lugar, edicion, resultado) 
    // VALUES (1, 2, 3, 2, '2024-07-01', 'Estadio Local', 'Edición 2024', 'Equipo Local');
    
    private $jur_idLocal;  
    private $jur_idVisit;     
    private $jur_golesLocal;  
    private $jur_golesVisit;  
    private $jur_fecha;   
    private $jur_lugar;   
    private $jur_edicion;   
    private $jur_resultado;   
    
    public function __CONSTRUCT(){
        $this->pdo = database::conectar();        
    }

    public function setJur_idLocal(string $nombre){
        $this->jur_idLocal = $nombre;
    }
    public function getJur_idLocal(): ?string{ 
        return $this->jur_idLocal;
    }

    public function setJur_idVisit(string $nombre){
        $this->jur_idVisit = $nombre;
    }
    public function getJur_idVisit(): ?string{ 
        return $this->jur_idVisit;
    }
    public function setJur_golesLocal(int $nombre){
        $this->jur_golesLocal = $nombre;
    }
    public function getJur_golesLocal(): ?int{ 
        return $this->jur_golesLocal;
    }
    public function setJur_golesVisit(int $nombre){
        $this->jur_golesVisit = $nombre;
    }
    public function getJur_golesVisit(): ?int{ 
        return $this->jur_golesVisit;
    }

    public function setJur_fecha(string $nombre){
        $this->jur_fecha = $nombre;
    }
    public function getJur_fecha(): ?string{ 
        return $this->jur_fecha;
    }
    public function setJur_lugar(string $nombre){
        $this->jur_lugar = $nombre;
    }
    public function getJur_lugar(): ?string{ 
        return $this->jur_lugar;
    }

    public function setJur_edicion(int $nombre){
        $this->jur_edicion = $nombre;
    }
    public function getJur_edicion(): ?int{ 
        return $this->jur_edicion;
    }
    public function setJur_resultado(string $nombre){
        $this->jur_resultado = $nombre;
    }
    public function getJur_resultado(): ?string{ 
        return $this->jur_resultado;
    }


public function InsertarEncuentro(Encuentro $j){
    try{
        // VALUES (1, 2, 3, 2, '2024-07-01', 'Estadio Local', 'Edición 2024', 'Equipo Local');
        
        $consulta = " INSERT INTO encuentros (equipo_local_id, equipo_visitante_id, goles_local, 
                                                goles_visitante, fecha, lugar, edicion, resultado) 
        VALUES (?,?,?,?,?,?,?,?)";
        $this->pdo->prepare($consulta)->execute(array(
            $j->getJur_idLocal(),
            $j->getJur_idVisit(),
            $j->getJur_golesLocal(),
            $j->getJur_golesVisit(),
            $j->getJur_fecha(),
            $j->getJur_lugar(),
            $j->getJur_edicion(),
            $j->getJur_resultado(),
        )
    );

    }catch(Exception $e){
        die($e->getMessage());
    }
}














}