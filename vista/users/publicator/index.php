<?php session_start(); ?>

 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Carrusel</title>
    <link rel="stylesheet" href="assets/css/styles2.css">
</head>

<body>
    <!-- Cabecera -->
    <header class="header-fijo">
    <a href="?c=userPublicator&a=mostrarFormulario">
        <h2>Mis eventos</h2>
    </a>


<a href="javascript:void(0)" onclick="abrirModal()">
    <h2>+ Crear Evento</h2>
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

                        <a href="?c=user">
                            <button  class="details-button">Más detalles</button>

                        </a>
                    </div>
                </div>
                                
                     
                
                
                </div>
                    
                     
 
        
              <?php endforeach;?> 
 
              
            
            
            <div class="card">Tarjeta 5</div>
            <div class="card">Tarjeta 6</div>
            <div class="card">Tarjeta 7</div>
            <div class="card">Tarjeta 7</div>
             
             
            
            
        </div>
        <button class="nav-button right" onclick="moveRight()">&#10095;</button>
    </div> 



<br> 
<br> 
  






   
<div class="grid-container"> 

<?php foreach($this->modelo->viewPublications("Aceptada") as $eq):?>         <!--ciclo for -->
      
    <div class="container">
                    <div class="header">
                        <div class="date"><?=$eq->fecha_hora?></div>
                        <button class="report-button" title="Reportar">
                            &#9888;
                        </button>
                    </div>
                    <div class="image">
                        <img src="https://media.gettyimages.com/id/472324721/es/vector/rally-de-demostraci%C3%B3n.jpg?s=612x612&w=gi&k=20&c=rnxvRUQmuLfif1cEpkWA0UALppYpIx_1-zY5y20lWK8=" alt="Imagen del evento">
                    </div>
                    <div class="content">
                        <h3>Un título</h3>
                        <p>Un Subtítulo</p>
                    </div>
                    <div class="footerTarjeta">
                        <div class="attendance">Límite de asistentes * Asistirán</div>
                        <button class="details-button">Más detalles</button>
                    </div>
                </div>
   
 
        <?php endforeach;?> 
 
 <!-- Puedes agregar más tarjetas aquí siguiendo el mismo formato -->
</div>


        












<!-- Modal para Crear Evento -->
<div class="overlay" id="overlay" style="display: none;">
        <div class="modal">
            <div class="modal-header">Nueva Publicación</div>
            <div class="modal-body">
                <!-- Formulario para nueva publicación -->
                <form id="form-publication" class="publication-form" method="POST" action="?c=userPublicator&a=insertPublication">
                    <input type="hidden" id="id_user" name="id_user" value="<?= $_SESSION['id'] ?>">
                    <input type="hidden" id="estado" name="estado" value="1">

                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo">

                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion"></textarea>

                    <label for="fecha-hora">Fecha y Hora:</label>
                    <input type="datetime-local" id="fecha-hora" name="fecha-hora">

                    <label for="lugar">Lugar:</label>
                    <input type="text" id="lugar" name="lugar">
                    
                    <label for="sin-limite">Sin límite de asistencia:</label>
                    <input type="checkbox" id="sin-limite" name="sin-limite">

                    <label for="cantidad-asistentes">Cantidad de asistentes:</label>
                    <input type="number" id="cantidad-asistentes" name="cantidad-asistentes">


                    <label for="categoria">Categoría:</label>
                    <select id="categoria" name="categoria">
                        <option value="">Seleccione una categoría</option>
                        <option value="1">Categoría 1</option>
                        <option value="2">Categoría 2</option>
                    </select>

                    <label for="tipo">Tipo público:</label>
                    <select id="tipo" name="tipo">
                        <option value="">Seleccione una categoría</option>
                        <option value="1">Categoría 1</option>
                        <option value="2">Categoría 2</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="cerrarModal()">Cerrar</button> 
                    <button  type="submit" form="form-publication" id="submit-publication">Guardar</button> 
            </div>
        </div>
    </div>





        <script src="assets/js/ani.js"></script>

 
</body>
</html>
