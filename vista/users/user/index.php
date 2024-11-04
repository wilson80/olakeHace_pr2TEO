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

            /* border: 2px solid #ff0000; Marco rojo */
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

.mensaje-exito.active {
    display: block;
}

    </style>
</head>
<body>

    <div class="container">
        <!-- Panel izquierdo (logo, usuario y eventos) -->
        <div class="sidebar">           
             <a href="?c=user">
                <img  src="assets/img/logo.png" alt="Logo">
            </a>
            <h2>Usuario comun</h2>
            <h3>ussss:<?=  $_SESSION['username'] ?> </h3>
            <a href="">
                
                <button>Mis eventos</button>
            </a>
            <hr>
            <hr>
            <hr>
            <a class="" href="?c=logout">
                <button  >Cerrar Sesion</button>
            </a>
        </div>

            <div class="notification">
                <i class="fa-sharp fa-solid fa-bell" style="color: #ffffff;"></i>
            </div>
        <!-- Área principal (publicaciones y notificación) -->
        <div class="main-content">

            
            <!-- Área de publicaciones con scroll -->
            <div class="publicaciones">
  
 
 

        <?php foreach($this->modelo->viewPublications("Aceptada") as $eq):?>         <!--ciclo for -->
                <div class="tarjeta">
                    <div class="contenido">
                        <div class="informacion">
                            <h2><?=$eq->titulo?></h2>
                            <p><?=$eq->descripcion?></p>
                            <p>Lugar: <span><?=$eq->lugar?></span></p>
                            <p>Fecha: <span><?=$eq->fecha_hora?></span></p>
                            <p>Categoria: <span><?=$eq->nombre_categoria?></span></p>
                            <p>Tipo publico: <span><?=$eq->tipoPublico?></span></p>
                            <p>Iddd: <span><?=$eq->id_publicacion?></span></p>
                        </div>
                        <div class="imagen">
                            <img src="https://media.gettyimages.com/id/472324721/es/vector/rally-de-demostraci%C3%B3n.jpg?s=612x612&w=gi&k=20&c=rnxvRUQmuLfif1cEpkWA0UALppYpIx_1-zY5y20lWK8=" alt="Imagen del evento">
                        </div>
                    </div>
                    <div class="botones-tarjeta">
                        <button class="reportar-btn" data-id="<?=$eq->id_publicacion?>">Reportar</button>
                        <button>+ Asistir</button>
                        <button>ver más detalles</button>

                    </div>
                    


                </div>
 
        <?php endforeach;?> 
        
 
                
                <!-- Más tarjetas aquí -->
            </div>
        </div>
    </div>




    

 

<!-- Ventana modal para la denuncia -->
<div id="modal" class="modal">
    <div class="modal-content">
        <h2>Selecciona una razón</h2>
        <h3 id="titulo-publicacion"></h3> <!-- Aquí aparecerá el título -->
        <ul>
            <li><input type="radio" name="razon" value="Spam"> Spam</li>
            <li><input type="radio" name="razon" value="Contenido ofensivo"> Contenido ofensivo</li>
            <li><input type="radio" name="razon" value="Violencia"> Violencia</li>
            <li><input type="radio" name="razon" value="Desinformación"> Desinformación</li>
            <li><input type="radio" name="razon" value="Engañoso"> Engañoso</li>
            <li><input type="radio" name="razon" value="Otro"> Otro</li>
        </ul>
 <form>
        <label for="otra-razon">Otro:</label>
        <input type="text" id="otra-razon" name="otra-razon" placeholder="Especificar otro motivo" required>
        <button type="submit" id="enviar-btn">Enviar</button>
        <button id="cancelar-btn">Cancelar</button>
 </form>
    </div>
</div>

<!-- Mensaje de éxito -->
<div id="mensaje-exito" class="mensaje-exito">Denuncia enviada</div>


    
<script>







   // Variable global para almacenar el ID de la publicación
let currentPublicationId = null;

// Mostrar la ventana modal al hacer clic en el botón "reportar"
document.querySelectorAll('.reportar-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        // Obtener el título de la publicación correspondiente
        var tituloPublicacion = this.closest('.tarjeta').querySelector('h2').textContent;
        
        // Colocar el título en el modal
        document.getElementById('titulo-publicacion').textContent = "Reportando: " + tituloPublicacion;

        // Obtener el ID de la publicación
        currentPublicationId = this.getAttribute('data-id'); // Guardar el ID de la publicación

        // Mostrar el modal
        document.getElementById('modal').style.display = 'flex';
    });
});

// Validar y cerrar la ventana modal al hacer clic en "Enviar"
document.getElementById('enviar-btn').addEventListener('click', function(event) {
    event.preventDefault(); // Prevenir el envío del formulario

    // Verificar si hay un radio button seleccionado
    const selectedReason = document.querySelector('input[name="razon"]:checked');
    
    // Verificar el valor del input de "Otro" si la opción "Otro" está seleccionada
    const otherReasonInput = document.getElementById('otra-razon');
    const otherReasonText = otherReasonInput.value.trim();

    if (!selectedReason) {
        alert('Por favor selecciona una razón antes de enviar.');
        return;
    }

    // Si la opción seleccionada es "Otro" y el input está vacío, mostrar alerta
    if (selectedReason.value === "Otro" && otherReasonText === "") {
        alert('Por favor especifica la razón en el campo "Otro".');
        return;
    }

    // Ahora puedes usar currentPublicationId para obtener el ID de la publicación
    alert("ID de la publicación: " + currentPublicationId);
    




    document.getElementById('modal').style.display = 'none'; // Ocultar modal
    mostrarMensajeExito(); // Mostrar mensaje de éxito
});












</script>








    

</body>
</html>
