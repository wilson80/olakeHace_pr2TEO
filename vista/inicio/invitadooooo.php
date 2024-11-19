 

 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ola_ke_hace</title>
    <link rel="stylesheet" href="assets/css/styles2.css">
</head>
<body>


<?php    include 'header.php'; ?>


<br>
<br>

    
                            <?php    include 'bodyPubs.php'; ?>
                            
                   

<script>


        // Configura la fecha del evento aquí (formato: "Año-Mes-Día Hora:Minuto:Segundo")
        const eventDate = new Date("2024-12-25 00:00:00").getTime();

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
 



 


 


function cargarVista(url) {
        const id = <?php echo json_encode($this->currentId); ?>;

        window.location.href = url;  // Redirige a la nueva URL
}

function cargarFiltro(url) {
        window.location.href = url;  // Redirige a la nueva URL
}
  


</script>


        <script src="assets/js/form_report.js" ></script>

        <script src="assets/js/ani.js"></script>
</body>
</html>
