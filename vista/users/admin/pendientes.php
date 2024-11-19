<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/unitaria.css">
    <title>Reportadas</title>
 
</head>
<body>


<?php include "header.php"?>

<div class="containerUnitaria">
    <!-- Contenedor de imágenes -->
    <div class="image-containerUnitaria">
        <div class="image-blurred"> 
            <img src="https://i0.wp.com/juezdeatletismo.com/wp-content/uploads/2023/12/23-Marcha-equipo-Paris.jpg?fit=600%2C400&ssl=1" alt="">
        </div>
        <div class="image-main">
            <img src="https://i0.wp.com/juezdeatletismo.com/wp-content/uploads/2023/12/23-Marcha-equipo-Paris.jpg?fit=600%2C400&ssl=1" alt="">
            
        </div>
        <div class="image-blurred">
            <img src="https://i0.wp.com/juezdeatletismo.com/wp-content/uploads/2023/12/23-Marcha-equipo-Paris.jpg?fit=600%2C400&ssl=1" alt="">
            
        </div>
    </div>
 
 
<br>
    <!-- Títulos y subtítulos -->
    <div class="titles">
        <?php $pub = $this->modelo->viewUnaPublicacion($this->currentId); ?>
        <h3><?= $pub->fecha_hora?></h3>
        <h2><?= $pub->titulo?></h2>
        <h3> <?= $pub->lugar?></h3>
    </div>

    <!-- Contenedor de Información y Botones en una fila -->
    <div class="info-buttons-containerUnitaria">
        <div class="info">Información</div>
        <div class="buttons">
                <button onclick="cargarVista('?c=admin&a=updatePub&idU=2')" >Aceptar Publicacion</button>
                <button onclick="cargarVista('?c=admin&a=updatePub&idU=4')" >Rechazar Publicacion</button>
        </div>
    </div>
</div>


<?php require_once "vista/users/admin/detallePub.php"; ?>
 

<script>
    function cargarVista(url) {
        const id = <?php echo json_encode($this->currentId); ?>;
        const idPub = "&id=" + id; 

        window.location.href = url + idPub;  // Redirige a la nueva URL
    }
</script>






</body>
</html>
