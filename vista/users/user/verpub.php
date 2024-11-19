<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/unitaria.css">

    <title>Ola ke hace</title>
 
    <style>
        .mensaje-asistencia {
            background-color: #d1e7dd; /* Color de fondo verde claro */
            color: #0f5132; /* Color del texto verde oscuro */
            border: 1px solid #badbcc; /* Borde verde claro */
            border-radius: 8px; /* Bordes redondeados */
            padding: 10px 15px; /* Espaciado interno */
            margin: 10px 0; /* Espaciado externo */
            font-size: 16px; /* Tamaño del texto */
            font-weight: bold; /* Negrita */
            text-align: center; /* Centrar el texto */
            width: 100%; /* Ocupa todo el ancho del contenedor */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra suave */
            animation: fadeIn 0.5s ease; /* Animación de entrada */
        }

        /* Animación para que el mensaje aparezca suavemente */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

      

        .modale {
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
    
    .modale-content {
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

<?php    include 'header.php'; ?>

<?php include "form_report.php"; ?>  

<div class="containerUnitaria">


    <!-- Mostrar mensaje de asistencia apuntada o retirada -->
    <?php if (isset($_SESSION['mensaje_asistencia'])): ?>
        <div class="mensaje-asistencia">
            <p><?= htmlspecialchars($_SESSION['mensaje_asistencia']) ?></p>
        </div>
        <?php unset($_SESSION['mensaje_asistencia']); // Eliminar el mensaje después de mostrarlo ?>
    <?php endif; ?>



    <!-- Contenedor de imágenes -->
    <div class="image-containerUnitaria">
        <div class="image-blurred"> 

        <?php $pub = $this->modelo->viewUnaPublicacion($this->currentId); ?>

        <img src="<?= $pub->imgdir?>" alt="Imagen del evento">
            
        </div>
        <div class="image-main">

        <img src="<?= $pub->imgdir?>" alt="Imagen del evento">

           
        </div>
        <div class="image-blurred">
        <img src="<?= $pub->imgdir?>" alt="Imagen del evento">


             
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
            
            
            <!-- verificar si es asistente o no a esta publicacion -->
            <?php $this->asiste = $this->revisarAsistencia(); ?>

            
            <?php if($this->asiste):?>
                <button onclick="cargarVista('?c=user_reg&a=retirarAsistencia&id=')" >   - Retirar asistencia!  </button>
                        <!-- cuando ya es asistente-->
            <?php else:?>
                <button onclick="cargarVista('?c=user_reg&a=registrarAsistencia&id=')" >   + Apuntar asistencia!  </button>
                            <!-- cuando no   es asistente-->
                    
            <?php endif;?>

                <button class="report-button" data-id="<?=$pub->id_publicacion?>" data-tittle="<?=$pub->titulo?>"  >Reportar</button>
        </div>
    </div>
</div>  



<?php require_once "vista/users/user/detallePub.php"; ?>
 
<script src="assets/js/form_report.js" ></script>



<script>

    function cargarVista(url) {
        const id = <?php echo json_encode($this->currentId); ?>;

        window.location.href = url + id;  // Redirige a la nueva URL
    }
</script>






</body>
</html>
