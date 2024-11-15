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


            <?php foreach($this->modelo->viewPublications("Aceptada") as $eq):?>         <!--ciclo for -->
                <div class="card">
                <div class="container">
                    <div class="header">
                        <div class="date"><?=$eq->fecha_hora?></div>
                        <button class="report-button" title="Reportar">
                            &#9888;
                        </button>
                    </div>
                    <div class="image">
                        <img src="https://i.pinimg.com/736x/c9/49/e2/c949e213eddf6aec9af7a1fc31f0848b.jpg" alt="Imagen del evento">
                    </div>
                    <div class="content">
                        <h3><?=$eq->titulo?></h3>
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
  


<script>
    function cargarVista(url) {
        const id = <?php echo json_encode($this->currentId); ?>;

        window.location.href = url;  // Redirige a la nueva URL
    }
 


</script>



        <script src="assets/js/ani.js"></script>
</body>
</html>
