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


<?php include "vista/users/publicator/header.php";?>






    
<br>
<br>
 

 
<br>
<br>
 


<br> 
<br> 
  



   
<div class="grid-container"> 

<?php foreach($this->modelo->viewPublications_byUser($_SESSION['id']) as $eq):?>         <!--ciclo for -->
    
    
                <div class="card">
                <div class="container">
                    <div class="header">
                        <div class="date"><?=$eq->fecha_hora?></div>
                       
                    </div>
                    <div class="image">
                        <img src="<?= $eq->imgdir?>" alt="Imagen del evento">
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

                    <label for="website">Introduce un enlace:</label>
                    <input type="url" id="website" name="website" placeholder="https://example.com" required>





                    <label for="categoria">Categoría:</label>
                    <select id="categoria" name="categoria">
                        <option value="">Seleccione una categoría</option>
                        <option value="1">Deporte</option>
                        <option value="2">cocina</option>
                        <option value="3">politica</option>
                        <option value="4">religioso</option>
                        <option value="5">academica</option>
                        <option value="6">cultural</option>
                        <option value="7">historia</option>
                    </select>

                    <label for="tipo">Tipo público:</label>
                    <select id="tipo" name="tipo">
                        <option value="">Seleccione el tipo de publico adecuado</option>
                        <option value="1">Adulto</option>
                        <option value="2">Infantil</option>
                        <option value="3">familiar</option>
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
