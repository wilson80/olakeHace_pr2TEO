<?php

require_once "modelos/CardModel.php";

class CardControlador {


    public function Inicio() {
        $cardModel = new CardModel();
        $cards = $cardModel->getCards();
        require_once "vista/inicio/pruebas.php"; // Llama a la vista de las tarjetas
    }


}



