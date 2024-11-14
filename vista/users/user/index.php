<?php session_start(); ?>



<!DOCTYPE html>
<html lang="es">
<head>
 
    <!-- Enlace a Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/userr.css"> <!-- Enlace al archivo CSS externo -->
 



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Publicaciones</title>
 
 
</head>
<body>

    <div class="container">
        <!-- Panel izquierdo (logo, usuario y eventos) -->
        <div class="sidebar">           
             <a href="?c=user">
                <img  src="assets/img/logo.png" alt="Logo">
            </a>
            <h2>Usuario comun</h2>
            <h3>Nombre: <?=  $_SESSION['username'] ?> </h3>
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
            <li data-id="1"><input type="radio" name="razon" value="Spam"> Spam</li>
            <li data-id="2"><input type="radio" name="razon" value="Contenido ofensivo"> Contenido ofensivo</li>
            <li data-id="3"><input type="radio" name="razon" value="Violencia"> Violencia</li>
            <li data-id="4"><input type="radio" name="razon" value="Desinformación"> Desinformación</li>
            <li data-id="5"><input type="radio" name="razon" value="Engañoso"> Engañoso</li>
            <li data-id="6"><input type="radio" name="razon" value="Otro"> Otro</li>
        </ul>
        <form id="report-form" action="?c=otro&a=insertar" method="POST">
            <input type="hidden" id="publicacion-id" name="publicacion_id" value="">
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
// Mostrar la ventana modal al hacer clic en el botón "reportar"
document.querySelectorAll('.reportar-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        // Obtener el título de la publicación correspondiente
        var tituloPublicacion = this.closest('.tarjeta').querySelector('h2').textContent;

        // Colocar el título en el modal
        document.getElementById('titulo-publicacion').textContent = "Reportando: " + tituloPublicacion;

        // Obtener el ID de la publicación
        currentPublicationId = this.getAttribute('data-id'); // Guardar el ID de la publicación
        
        // Establecer el ID en el campo oculto del formulario
        document.getElementById('publicacion-id').value = currentPublicationId;

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

    // Si no se seleccionó una razón, alerta
    if (!selectedReason && otherReasonText === "") {
        alert('Por favor selecciona una razón o especifica otra.');
        return;
    }

    // Si la opción seleccionada es "Otro", asegurarse de que se haya especificado
    if (selectedReason && selectedReason.value === "Otro" && otherReasonText === "") {
        alert('Por favor especifica la razón en el campo "Otro".');
        return;
    }

    // Ahora establecer el valor de la razón
    const razon = selectedReason ? selectedReason.value : otherReasonText;

    // Agregar el valor de la razón al formulario
    const razonInput = document.createElement('input');
    razonInput.type = 'hidden';
    razonInput.name = 'razon';
    razonInput.value = razon;
    document.getElementById('report-form').appendChild(razonInput);

    // Ahora puedes enviar el formulario
    document.getElementById('report-form').submit(); // Enviar el formulario
});




// Función para cerrar el modal cuando se hace clic en "Cancelar"
document.getElementById('cancelar-btn').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'none'; // Ocultar modal
});



</script>

         
 

    

</body>
</html>
