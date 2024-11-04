<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Enlace a Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Publicaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #007bff, #c2dfff); /* Fondo azul difuminado */
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            display: flex;
            width: 80%;
            height: 90%;
            border-radius: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Estilos del panel izquierdo */
        .sidebar {
            width: 25%;
            padding: 20px;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-sizing: border-box;
        }

        .sidebar img {
            width: 350px;
            height: 330px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .sidebar h2, .sidebar h3 {
            text-align: center;
            margin: 10px 0;
        }

        .sidebar button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
        }

        .sidebar button:hover {
            background-color: #0056b3;
        }

        /* Estilos del área principal de publicaciones */
        .main-content {
            width: 75%;
            padding: 20px;
            box-sizing: border-box;
            position: relative;
        }

        .notification {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
        }

        .publicaciones {
            height: 90%;
            overflow-y: scroll;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 20px;
            border: 2px solid #0000ff; /* Borde azul */
            margin-top: 1px; /* Ajusta el valor según sea necesario */
        }

        .tarjeta {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .contenido {
            display: flex; /* Utilizamos flexbox para alinear los elementos en filas */
            justify-content: space-between; /* Separar el contenido de texto y la imagen */
        }

        .informacion {
            width: 60%; /* Controla el ancho del contenido de texto */
        }

        .imagen {
            width: 35%; /* Controla el ancho del contenedor de la imagen */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .imagen img {
            max-width: 100%; /* La imagen ocupa todo el espacio disponible */
            border-radius: 10px;
        }

        .botones {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .botones button {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
        }

        .botones-tarjeta button {
            padding: 10px;
            font-size: 14px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .botones-tarjeta button:hover {
            background-color: #ddd;
        }

        .botones-tarjeta button:nth-child(1) {
            background-color: #ff4d4d;
            color: white;
        }

        .botones-tarjeta button:nth-child(2) {
            background-color: #28a745;
            color: white;
        }

        .botones-tarjeta button:nth-child(3) {
            background-color: #007bff;
            color: white;
        }

        .botones-tarjeta button:nth-child(1):hover {
            background-color: #cc0000;
        }

        .botones-tarjeta button:nth-child(2):hover {
            background-color: #218838;
        }

        .botones-tarjeta button:nth-child(3):hover {
            background-color: #0056b3;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Fondo difuminado */
            backdrop-filter: blur(5px); /* Difumina el fondo */
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        .mensaje-exito {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #4caf50;
            color: white;
            padding: 15px 30px;
            border-radius: 10px;
            z-index: 2;
        }
        
        .status-bar {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid black;
            border-radius: 20px;
            padding: 10px;
            font-size: 18px;
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            width: fit-content;
            margin: 20px auto; /* Centra la barra horizontalmente */
        }

        .mensaje-exito.active {
            display: block;
        }
 
        .status-bar span {
            margin: 0 10px;
            cursor: pointer;
            color: blue;
        }

        .status-bar span:hover {
            text-decoration: underline;
        }

        /* Nuevo contenedor para los botones */
        .botones-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .botones-container button {
            margin: 0 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Panel izquierdo (logo, usuario y eventos) -->
        <div class="sidebar">
            <a href="?c=user">
                <img src="assets/img/logo.png" alt="Logo">
            </a>
            <h2>Usuario Administrador</h2>
            <h3>ussss:<?=  $_SESSION['username'] ?> </h3>

            <a href="?c=admin&a=filtrar&filtro=Aceptada">
                <button>Aceptada</button>
            </a>
            <a href="?c=admin&a=filtrar&filtro=Pendiente">
                <button>Pendiente</button>
            </a>
            <a href="?c=admin&a=filtrar&filtro=Oculta">
                <button>Oculta</button>
            </a>
            <a href="?c=admin&a=filtrar&filtro=Rechazada">
                <button>Rechazada</button>
            </a>
            <a href="?c=admin&a=filtrar&filtro=Reportada">
                <button>Reportada</button>
            </a>
            <a href="?c=admin&a=filtrar&filtro=Vencida">
                <button>Vencida</button>
            </a>
            <a href="">
                <button>Ban users</button>
            </a>
            <a class="" href="?c=logout">
                <button>Cerrar Sesión</button>
            </a>
        </div>

        <!-- Área principal (publicaciones) -->
        <div class="main-content">
            <a href="notificaciones.php" class="notification">
                <i class="fas fa-bell"></i>
            </a>
            <div class="publicaciones">
                <div class="tarjeta">
                    <div class="contenido">
                        <div class="informacion">
                            <h3>Título de la Publicación</h3>
                            <p>Descripción de la publicación.</p>
                        </div>
                        <div class="imagen">
                            <img src="ruta/a/la/imagen.jpg" alt="Imagen de Publicación">
                        </div>
                    </div>
                    <div class="botones">
                        <div class="botones-tarjeta">
                            <button>Ver</button>
                            <button>Editar</button>
                            <button>Eliminar</button>
                        </div>
                    </div>
                </div>
                <!-- Puedes añadir más tarjetas aquí -->
            </div>
        </div>
    </div>

    <!-- Nuevo contenedor para los botones -->
    <div class="botones-container">
        <button>Botón 1</button>
        <button>Botón 2</button>
        <button>Botón 3</button>
    </div>

    <script>
        // Mostrar mensaje de éxito después de un segundo
        setTimeout(function() {
            const mensajeExito = document.querySelector('.mensaje-exito');
            if (mensajeExito) {
                mensajeExito.classList.add('active');
            }
        }, 1000);
    </script>

    <div class="modal">
        <div class="modal-content">
            <h2>¿Estás seguro?</h2>
            <p>¿Deseas realizar esta acción?</p>
            <ul>
                <li><button>Aceptar</button></li>
                <li><button>Cancelar</button></li>
            </ul>
        </div>
    </div>

    <div class="mensaje-exito">Acción realizada con éxito.</div>

</body>
</html>
