 
 
<br>
<br>
    <h1>Home</h1>

    <h2>Te podria interesar</h2>
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

   
<div class="grid-container"> 

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

 
 <!-- Puedes agregar más tarjetas aquí siguiendo el mismo formato -->
</div>




 













<script>
 
</script>



        <script src="assets/js/ani.js"></script>
</body>
</html>
