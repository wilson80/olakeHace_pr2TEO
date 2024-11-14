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
    <a href="?c=userPublicator&a=mostrarFormulario">
        <h2>Mis eventos</h2>
    </a>

 
<a class="" href="?c=logout">
                <button  >Cerrar Sesion</button>
            </a>


    <a href="?c=user">
                <img  src="assets/img/logo.png" alt="Logo" class="logo">
    </a>
    <a href="?c=user" class="logo-container">
                <img  src="https://icones.pro/wp-content/uploads/2021/02/icone-utilisateur-bleu.png" alt="Logo" class="logo">
    </a>
    
    </header>



    <div class="barra-botones">
    <a href="?c=admin&a=filtrar&filtro=2">
        <button class="boton" data-id="Aceptadas"    >Aceptadas</button>
    </a>
    <a href="?c=admin&a=filtrar&filtro=1">
        <button class="boton" data-id="Pendientes"  >Pendientes</button>
    </a>
    <a href="?c=admin&a=filtrar&filtro=6">
        <button class="boton" data-id="Ocultas"     >Ocultas</button>
    </a>
    <a href="?c=admin&a=filtrar&filtro=5">
        <button class="boton" data-id="Reportadas"  >Reportadas</button>
    </a>
    <a href="?c=admin&a=filtrar&filtro=3">
        <button class="boton" data-id="Vencidas"    >Vencidas</button>
    </a>
</div>

  
 <br> <br> <br> <br><br>
 <br> <br> <br> <br>
<br> <br>


<h1 style="color: blanchedalmond;"><?= $this->titulo ?></h1>

   
<div class="grid-container"> 
<?php foreach($this->modelo->viewFiltradas_estados($this->filtro) as $eq):?>         <!--ciclo for -->
                <div class="card">
                <div class="container">
                    <div class="header">
                        <div class="date"><?=$eq->fecha_hora?></div> 
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
                            <button class="details-button" data-id="<?=$eq->id_publicacion?>" onclick="redirectToController(this)">Revisar</button>

                    </div>
                </div>
                                
                     
                
                
                </div>
                    
                     
 
        
              <?php endforeach;?> 
 <!-- Puedes agregar más tarjetas aquí siguiendo el mismo formato -->
</div>


        
 


        <script src="assets/js/ani.js"></script>

 
</body>
</html>
