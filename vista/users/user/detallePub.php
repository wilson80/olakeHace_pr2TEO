 
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/unitaria.css">
    <title>Reportadas</title>
 
</head>



<div class="containerTarjetaPresentacion">
      
 
        <h2>Detalles</h2>
        
        <div class="grid-containerTarjetaPresentacion">
            <!-- Tarjeta grande izquierda (Detalles) -->
            <div class="card large">
                <p><span class="label"><?= $pub->titulo ?></span></p>
                <p><span class="label">A realizarse: <?= $pub->fecha_hora ?></span></p>
                <p><span ><?= $pub->descripcion ?> </span></p>
                <p><span class="label">Ubicación: <?= $pub->lugar ?> </span></p>
                <p><span class="label">Evento de: <?= $pub->username ?></span></p>
                <p><span class="label">Tipo Público: <?= $pub->tipo_publico ?> *   </span>     <span class="label">   Categoría: <?= $pub->categoria ?> </span></p>
                <a class="url-box" href=""> URL del Evento</a>
            </div>
            

            <!-- Tarjeta extra grande derecha -->
    <div class="card extra-large">
                 <!-- Evento mas proximo -->
        <div class="event-container">
    
            <div class="event-timer">
                <h3>Tiempo restante</h3>
                <div id="countdown">00 Días 00 Horas</div>
            </div>
        </div>

    </div>

    

            <!-- Tarjeta combinada para Asistentes y Límite de Asistencia -->
            <div class="card small">
                <p class="label">Asistentes</p>
                <p>Asistirán: <?= $pub->currentAsistentes?></p>
                <hr style="width: 100%; border-top: 1px solid #ccc;">
                <?php if ($eq->cantidad_asistentes!=0): ?>
                    <div class="attendance">Sin limite de asistentes </div>
                    <?php else: ?>
                        <div class="attendance">Límite de asistentes: <?= $pub->cantidad_asistentes ?> </div>
                <?php endif; ?>

            </div>
        </div>




        <br>
        <h2>Sobre el Organizador</h2>
        <!-- Tarjeta sobre el organizador -->
        <div class="card about-organizer">
            <p><span class="label">Username: <?= $pub->username?></span></p>
            <p><span class="label">Nombres:</span></p>
            <p><span class="label">Correo de contacto:</span></p>
        </div>
    </div>









<script> 
        // Configura la fecha del evento aquí (formato: "Año-Mes-Día Hora:Minuto:Segundo")
        // const eventDate = new Date("2024-12-25 00:00:00").getTime();
        const eventDate = new Date(<?php echo json_encode($pub->fecha_hora); ?>).getTime();

        // Actualiza el contador cada segundo
        const countdownInterval = setInterval(() => {
            const now = new Date().getTime();
            const timeLeft = eventDate - now;

            // Calcula días, horas, minutos y segundos restantes
            const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

            // Muestra el resultado en el contenedor con id="countdown"
            document.getElementById("countdown").innerHTML = `${days} Días ${hours} Horas`;

            // Si la cuenta regresiva ha terminado
            if (timeLeft < 0) {
                clearInterval(countdownInterval);
                document.getElementById("countdown").innerHTML = "El evento ha comenzado";
            }
        }, 1000);
 
</script>




</body>
</html>