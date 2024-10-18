<?php

require_once "modelos/Jugador.php";
require_once "modelos/Equipo.php";
require_once "modelos/Encuentro.php";

class newInfoControlador{
    private $modelo;
    private $modeloEq;
    private $modeloEnc;

    public function __CONSTRUCT(){
        $this->modelo = new Jugador;
        $this->modeloEq = new Equipo;
        $this->modeloEnc = new Encuentro;
    }

    public function Inicio(){
        require_once "vista/encabezado.php";
        require_once "vista/newInfo/index.php";
        require_once "vista/pie.php";
    }


    // public function insertarJugador(){
    //     $j = new Jugador();
    //     $j->setJur_nombre($_POST['nombre']);
    //     $j->setJur_id($_POST['equipoId']);
    //     $j->setjur_edad($_POST['edad']);
    //     $j->setjur_estatura($_POST['altura']);
    //     $j->setJur_peso($_POST['peso']);
    //     $j->setJur_pais($_POST['nacionalidad']);
    //     $j->setJur_anotaciones($_POST['anotaciones']);
    //     $j->setJur_partidasGanadas($_POST['pganadas']);
    //     $j->setJur_partidasJugadas($_POST['pjugadas']);
    //     $this->modelo->Insertar($j);

    //     header("location:?c=alls");
    //  }


     public function insertarEquipo(){
        $e = new Equipo();
        $e->setJur_nombre($_POST['nombre']);
        $e->setJur_pais($_POST['pais']);
        $e->setJur_fundacion($_POST['fundacion']);
        $e->setJur_imagen_path($_POST['rutaImg']);
        $e->setJur_partidasJugadas($_POST['pjugadas']);
        $e->setJur_partidasGanadas($_POST['pganadas']);
        $this->modeloEq->InsertarEquipo($e);

        header("location:?c=jugador");
     }

     public function insertarEncuentro(){
         $e = new Encuentro();
        
// INSERT INTO encuentros (equipo_local_id, equipo_visitante_id, goles_local, goles_visitante, fecha, lugar, edicion, resultado) 
// VALUES (1, 2, 3, 2, '2024-07-01', 'Estadio Local', 'Edición 2024', 'Equipo Local');

        $e->setJur_idLocal($_POST['idquipoL']);
        $e->setJur_idVisit($_POST['idequipoV']);
        $e->setJur_golesLocal($_POST['golesL']);
        $e->setJur_golesVisit($_POST['golesS']);
        $e->setJur_fecha($_POST['fecha']);
        $e->setJur_lugar($_POST['lugar']);
        $e->setJur_edicion($_POST['edicion']);
        $e->setJur_resultado($_POST['ganador']);
        $this->modeloEnc->InsertarEncuentro($e);

        header("location:?c=encuentro");
     }





}