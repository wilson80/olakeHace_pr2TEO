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
            margin-top: 70px; /* Ajusta el valor según sea necesario */

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





.new-publication-btn {
    position: absolute;
    top: 20px; /* Ajusta la distancia desde la parte superior */
    right: 30px; /* Ajusta la distancia desde la parte derecha */
    background-color: #28a745;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    cursor: pointer;
}

.new-publication-btn:hover {
    background-color: #218838;
}


















.publication-form {
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

.publication-form h3 {
    text-align: center;
}

.publication-form label {
    display: block;
    margin-top: 10px;
}

.publication-form input[type="text"],
.publication-form input[type="datetime-local"],
.publication-form input[type="number"],
.publication-form textarea,
.publication-form select {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.publication-form textarea {
    height: 100px;
}

.publication-form button {
    background-color: #28a745;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    display: block;
    margin-top: 10px;
}

.publication-form button:hover {
    background-color: #218838;
}


    </style>
</head>
<body>



    <div class="container">
        <!-- Panel izquierdo (logo, usuario y eventos) -->
        <div class="sidebar">
            <img src="assets/img/logo.png" alt="Logo">
            <h2>Usuario publicator</h2>
            <h3>ussss:<?=  $_SESSION['username'] ?> </h3>
            <h3>id:<?=  $_SESSION['id'] ?> </h3>
       
            <button class="mispubs-btn">Mis Publicaciones</button>

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



        <!-- Botón de nueva publicación -->
        <button class="new-publication-btn">+ New Publication</button>
            <!-- Área de publicaciones con scroll -->
            <div class="publicaciones">


        <div id="div-pubs" style="display: none;">
            <?php foreach($this->modelo->viewPublications_byUser($_SESSION['id']) as $eq):?>         <!--ciclo for -->
                    <div class="tarjeta">
                        <div class="contenido">
                            <div class="informacion">
                                <h2><?=$eq->titulo?></h2>
                                <p><?=$eq->descripcion?></p>
                                <p>Lugar: <span><?=$eq->lugar?></span></p>
                                <p>Fecha: <span><?=$eq->fecha_hora?></span></p>
                                <p>Categoria: <span><?=$eq->nombre_categoria?></span></p>
                                <p>Tipo publico: <span><?=$eq->tipoPublico?></span></p>
                            </div>
                            <div class="imagen">
                                <img src="https://media.gettyimages.com/id/472324721/es/vector/rally-de-demostraci%C3%B3n.jpg?s=612x612&w=gi&k=20&c=rnxvRUQmuLfif1cEpkWA0UALppYpIx_1-zY5y20lWK8=" alt="Imagen del evento">
                            </div>
                        </div>
                        <div class="botones-tarjeta">
                            <button class="reportar-btn">Aceptar</button>
                            <button>+ Asistir</button>
                            <button>ver más detalles</button>
                            <hr>
                            <label for="">Estado: <?=$eq->nombre_estado?></label>
                        </div>
                        
                    </div>
                    <!-- <img src="<?php echo htmlspecialchars($eq->imagen_equipo); ?>" alt="Imagen "> -->
                    <!-- <h2><?=$eq->equipo?></h2> -->
    
            <?php endforeach;?> 
        </div>
               
                    










<!-- Formulario para nueva publicación -->
<form id="form-publication" class="publication-form" method="POST"   action="?c=userPublicator&a=insertPublication">
<!-- <form id="form-publication" class="publication-form" > -->
    <input type="hidden" id="id_user" name="id_user" value="<?= $_SESSION['id'] ?>">
    <input type="hidden" id="estado" name="estado" value="1">


    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo"><br>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion"></textarea><br>

    <label for="fecha-hora">Fecha y Hora:</label>
    <input type="datetime-local" id="fecha-hora" name="fecha-hora"><br>

    <label for="lugar">Lugar:</label>
    <input type="text" id="lugar" name="lugar"><br>

    <label for="cantidad-asistentes">Cantidad de asistentes:</label>
    <input type="number" id="cantidad-asistentes" name="cantidad-asistentes"><br>

    <label for="sin-limite">Sin límite de asistencia:</label>
    <input type="checkbox" id="sin-limite" name="sin-limite"><br>

    <label for="categoria">Categoría:</label>
    <select id="categoria" name="categoria">
        <option value="">Seleccione una categoría</option>
        <option value="1">Categoría 1</option>
        <option value="2">Categoría 2</option>
    </select><br>
    <label for="tipo">Tipo publico:</label>
    <select id="tipo" name="tipo">
        <option value="">Seleccione una categoría</option>
        <option value="1">Categoría 1</option>
        <option value="2">Categoría 2</option>
    </select><br>

    <button type="submit" id="submit-publication">Enviar</button>
</form>




   







        
 
                
                <!-- Más tarjetas aquí -->
            </div>
        </div>
    </div>


 
 

 

    
<script>
 
 

    // Validar y enviar el formulario (esto puede adaptarse a tu lógica PHP o JS)
    // document.getElementById('submit-publication').addEventListener('click', function(event) {
document.getElementById('form-publication').addEventListener('submit', function(event) {
  
    event.preventDefault(); // Evita el envío inmediato del formulario
    
    // Obtener los valores de los campos
    const titulo = document.getElementById('titulo').value.trim();
    const descripcion = document.getElementById('descripcion').value.trim();
    const fechaHora = document.getElementById('fecha-hora').value.trim();
    const lugar = document.getElementById('lugar').value.trim();
    const categoria = document.getElementById('categoria').value;
    const tipo = document.getElementById('tipo').value;
    const cantidadAsistentes = document.getElementById('cantidad-asistentes').value.trim();
    
    // Validar campos obligatorios
    if (!titulo || !descripcion || !fechaHora || !lugar || !categoria || !tipo) {
        alert('Por favor, completa todos los campos obligatorios.');
        return;
    }

    // Validar la cantidad de asistentes si está habilitada
    if (!document.getElementById('cantidad-asistentes').disabled && !cantidadAsistentes) {
        alert('Por favor, ingresa la cantidad de asistentes o desactiva el campo.');
        return;
    }

    alert('Formulario enviado exitosamente.');
    this.submit();
    // Si todas las validaciones pasan, mostramos el mensaje de éxito
    
    // // Limpiar los campos del formulario
    // document.getElementById('form-publication').reset(); // Resetea el formulario
});

 // Mostrar el formulario al hacer clic en el botón "New Publication"
document.querySelector('.new-publication-btn').addEventListener('click', function() {
    const form = document.getElementById('form-publication');
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
    const form2 = document.getElementById('div-pubs');
    form2.style.display =  form.style.display === 'none' ? 'none' : 'none';
});

document.querySelector('.mispubs-btn').addEventListener('click', function() {
    const form = document.getElementById('form-publication');
    form.style.display = form.style.display === 'none' ? 'none' : 'none';

    const form2 = document.getElementById('div-pubs');
    form2.style.display =  form.style.display === 'none' ? 'block' : 'block';
});


// Botón para activar/desactivar "Cantidad de asistentes"
document.getElementById('toggle-asistentes').addEventListener('click', function() {
    const input = document.getElementById('cantidad-asistentes');
    if (input.disabled) {
        input.disabled = false;
        this.innerText = 'Activar';
    } else {
        input.disabled = true;
        input.value = ''; // Limpiar el valor si se desactiva
        this.innerText = 'Desactivar';
    }
});






</script>







    

</body>
</html>
