<?php
// Inicia la sesión si es necesario
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Estilos generales de la página */
        /* Estilos generales de la página */
body {
    margin: 0;
    padding: 0;
    color: #333;
    padding-top: 0px;
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, #003a7c, #c2dfff); /* Fondo azul difuminado */
    align-items: center;
    display: flex;
    flex-direction: column;
}

/* Estilo general del header */
header {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between; /* Espaciado entre los elementos */
    background: linear-gradient(to right, #001b4e, #003a7c);
    padding: 10px 20px;
    box-sizing: border-box; /* Asegura que el padding no afecte el tamaño */
}

/* Contenedor para los íconos del lado derecho */
.header-right {
    display: flex;
    align-items: center;
    gap: 15px; /* Espacio entre los íconos */
}

/* Estilo para el botón */
.header-button {
    background-color: #ffffff;
    border: 2px solid #003366;
    color: #003366;
    padding: 8px 16px;
    border-radius: 50%; /* Forma circular, al igual que los íconos */
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.2s ease, color 0.2s ease;
}

/* Efecto hover en el botón */
.header-button:hover {
    background-color: #003366;
    color: #ffffff;
}

/* Estilo general de los íconos */
.header-right div {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    background-color: #ffffff;
    border-radius: 50%; /* Forma circular */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.2s ease, background-color 0.2s ease;
}

.header-right div i {
    color: #003366;
    font-size: 20px;
}

/* Efecto hover en los íconos */
.header-right div:hover {
    transform: scale(1.1);
    background-color: #f0f0f0;
}

/* Media query para pantallas pequeñas */
@media (max-width: 768px) {
    header {
        flex-wrap: wrap;
    }
    .header-right {
        justify-content: flex-end;
    }
}

</style>

<header>
    <div  class="logo">
        <a href="?c=user_reg">
            
            <img src="assets/img/logo.png" alt="Logo" style="height: 40px;">
        </a>
        <a href="?c=logout">

            <button class="header-button">Cerrar Sesion</button>
        </a>
    </div>
    <div class="header-right">
        <!-- Botón antes de los íconos -->
        <a href="?c=user_reg&vista=home">
            <button class="header-button">Home</button>

        </a>
        <a href="?c=user_reg&vista=mis_eventos">
            <button class="header-button" title="Los eventos a los que te haz apuntado">Mis eventos</button>

        </a>

        <div><i class="fa-solid fa-bell"></i></div>
        <div><i class="fa-solid fa-user"></i></div> <!-- Este es el último ícono -->
    </div>
</header>




</html>