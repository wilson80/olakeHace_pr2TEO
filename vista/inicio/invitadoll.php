<?php session_start(); ?>

 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ola_ke_hace</title>
    <link rel="stylesheet" href="assets/css/styles2.css">
</head>
<body>
    <!-- Cabecera -->
    <header class="header-fijo">
    
    <a href="?c=user">
                <img  src="assets/img/logo.png" alt="Logo" class="logo">
    </a>
    <a href="?c=user" class="logo-container">
                <img  src="https://icones.pro/wp-content/uploads/2021/02/icone-utilisateur-bleu.png" alt="Logo" class="logo">
    </a>
    
    <a class="" href="?c=logout">
                <button  >Cerrar Sesion</button>
            </a>


    </header>

<br>
<br>
    <!-- Evento mas proximo -->
    <div class="event-container">
        <div class="event-info">
            <h3>Próximo evento</h3>
            <p>Marcha</p>
            <p>Ubicación:</p>
        </div>
        <div class="event-date">
            Fecha
        </div>
        <div class="event-timer">
            <h3>Tiempo restante</h3>
            <div id="countdown">00 Días 00 Horas</div>
        </div>
    </div>

 
<br>
<br>
    <h1>Te podria interesar</h1>
    <!-- Contenedor de tarjetas con botones de navegación -->
    <div class="card-scroll-container">
        <button class="nav-button left" onclick="moveLeft()">&#10094;</button>
        <div class="card-scroll">


            <?php foreach($this->pubs as $eq):?>         <!--ciclo for -->
                <div class="card">
                <div class="container">
                    <div class="header">
                        <div class="date"><?=$eq->fecha_hora?></div>
                        <button class="report-button" data-id="<?=$eq->id_publicacion?>" data-tittle="<?=$eq->titulo?>"  title="Reportar">
                            &#9888;
                        </button>
                    </div>
                    <div class="image">
                        <img src="https://i.pinimg.com/736x/c9/49/e2/c949e213eddf6aec9af7a1fc31f0848b.jpg" alt="Imagen del evento">
                    </div>
                    <div class="content">
                        <h2><?=$eq->titulo?></h3>
                        <p>Lugar: <?=$eq->lugar?></p>
                        <p> <?=$eq->descripcion?></p>
                        <h3>invita: <?=$eq->username?></h3>
                    </div>
                    <div class="footerTarjeta">
                        
                    <?php if ($eq->cantidad_asistentes!=0): ?>
                        <div class="attendance">Límite de asistentes: <?= $eq->cantidad_asistentes ?> </div>
                    <?php else: ?>
                            <div class="attendance">Sin limite de asistentes </div>
                    <?php endif; ?>


                        <div class="attendance"> Asistirán: <?= $eq->currentAsistentes?> </div> 
 
                         <button class="details-button" onclick="cargarVista('?c=user_reg&a=mostrarPub&id=<?= $eq->id_publicacion?>')" >Más detalles</button>

                    </div>
                </div>
                                
                     
                </div>
                    
                      

        
              <?php endforeach;?> 
  
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
              
        </div>
        <button class="nav-button right" onclick="moveRight()">&#10095;</button>
    </div> 



<br> 
<br> 
  



<!-- Ventana modal para la denuncia -->
<div id="modale" class="modale">
    <div class="modale-content">
        <h2>Despues de realizar un reporte no veras mas la publicacion reportada</h2>
        <h2>Selecciona una razón</h2>
        <h3 id="titulo-publicacion"></h3> <!-- Aquí aparecerá el título -->
        <ul>
            <li data-id="1"><input type="radio" name="razon" value="Contenido violento"> Contenido Violento</li>
            <li data-id="2"><input type="radio" name="razon" value="Contenido enganoso"> Contenido Enganoso</li>
            <li data-id="3"><input type="radio" name="razon" value="ubicado en categoria incorrecta"> Ubicado en categoria incorrecta</li>
            <li data-id="4"><input type="radio" name="razon" value="Parece Spam"> Parece smpam</li>
            <li data-id="5"><input type="radio" name="razon" value="Incita al odio"> Incita al odio</li>
            <li data-id="6"><input type="radio" name="razon" value="Contenido no apto para publico sensible"> Contenido no apto para publico sensible</li>
            <li data-id="7"><input type="radio" name="razon" value="Otro"> Otro</li>
        </ul>
        <form id="report-form" action="?c=user_reg&a=insertarReporte" method="POST">
            <input type="hidden" id="publicacion-id" name="publicacion_id" value="">
            <label for="otra-razon">Otro:</label>
            <input type="text" id="otra-razon" name="otra-razon" placeholder="Especificar otro motivo" required>
                

            <button type="submit" id="enviar-btn">Enviar</button>
            <br>
            <button id="cancelar-btn">Cancelar</button>
        </form>
    </div>
</div>


<!-- Mensaje de éxito -->
<div id="mensaje-exito" class="mensaje-exito">Denuncia enviada</div>


















<script>


 // Mostrar la ventana modal al hacer clic en el botón "reportar"
document.querySelectorAll('.report-button').forEach(function(btn) {
    btn.addEventListener('click', function() {
        
        // Obtener el ID de la publicación
        currentPublicationId = this.getAttribute('data-id'); // Guardar el ID de la publicación
        // Obtener el título
        currentTittle = this.getAttribute('data-tittle'); // Guardar el título de la publicación
        
        // Colocar el título en el modal
        document.getElementById('titulo-publicacion').textContent = "Reportando: " + currentTittle;

        // Establecer el ID en el campo oculto del formulario
        document.getElementById('publicacion-id').value = currentPublicationId;
        
        // Mostrar el modal
        document.getElementById('modale').style.display = 'flex';
    });
});

// Función para cerrar el modal cuando se hace clic en "Cancelar"
document.getElementById('cancelar-btn').addEventListener('click', function() {
    document.getElementById('modale').style.display = 'none'; // Ocultar modal
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

    // Cerrar el modal primero
    document.getElementById('modale').style.display = 'none';


    // Mostrar mensaje de confirmación después de cerrar el modal
    const confirmationMessage = document.createElement('div');
    confirmationMessage.textContent = 'El reporte se ha enviado correctamente.';
    confirmationMessage.style.cssText = `
    background-color: #28a745; /* Verde claro */
    color: white;
    padding: 15px;
    border-radius: 10px;
    margin-top: 300px;
    text-align: center;
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    width: auto;
    max-width: 400px;
    z-index: 1000;
    font-family: 'Arial', sans-serif;
    font-size: 30px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    animation: fadeIn 1s ease-out;
`;


    // Agregar el mensaje al cuerpo del documento (fuera del modal)
    document.body.appendChild(confirmationMessage);

    // Esperar unos segundos para mostrar el mensaje antes de enviar el formulario
    setTimeout(function() {
        // Enviar el formulario
        document.getElementById('report-form').submit();

        // Eliminar el mensaje de confirmación después de 2 segundos
        confirmationMessage.remove();
    }, 2000); // Tiempo para mostrar el mensaje de confirmación


});










function cargarVista(url) {
        const id = <?php echo json_encode($this->currentId); ?>;

        window.location.href = url;  // Redirige a la nueva URL
    }
  


</script>



        <script src="assets/js/ani.js"></script>
</body>
</html>
