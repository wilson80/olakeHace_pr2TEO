
<h1>Tops Jugadores</h1>


<div class="additional-content">
  <!-- Contenido adicional aquí -->
  <p>Guatemala Mundial 2024 </p>
  <br>
  <!-- Más contenido aquí -->
  <div class="containerTarjeta">
    
    <div class="panelTarjetaAlone">
            <div class="info">

            <?php $p=$this->modelo->jugadorJoven() ?>

            <div class="info"> <br> <br>

            <h1 style="text-align: left;">El jugador Mas joven</h1>
            <h2 style="text-align: left;">Nombre:  <?=$p->nombre?></h2>
            <img src="assets/img/iconoJ.png" alt="Imagen ">
            <br>
            <h2 style="text-align: left;">Edad: <?=$p->edad?> </h2>
            <br>
                <br>
                <br>
            </div>
        </div>
    </div>
    
    <div class="panelTarjetaAlone">
            <div class="info">

            <?php $p=$this->modelo->jugadorAnotador() ?>

            <div class="info"> <br> <br>

            <h1 style="text-align: left;">Jugador con mas anotaciones</h1>
            <h2 style="text-align: left;">Nombre:  <?=$p->nombre?></h2>
            <img src="assets/img/iconoJ.png" alt="Imagen ">
            <br>
            <h2 style="text-align: left;">anotaciones Totales: <?=$p->total_anotaciones?> </h2>
            <br>
                <br>
                <br>
            </div>
        </div>
    </div>
    <div class="panelTarjetaAlone">
            <div class="info">

            <?php $p=$this->modelo->jugadorGanador() ?>

            <div class="info"> <br> <br>

            <h1 style="text-align: left;">Jugador con mas Partidas Ganadas</h1>
            <h2 style="text-align: left;">Nombre:  <?=$p->nombre?></h2>
            <img src="assets/img/iconoJ.png" alt="Imagen ">
            <br>
            <h2 style="text-align: left;">Partidas Ganadas: <?=$p->total_anotaciones?> </h2>
            <br>
                <br>
                <br>
            </div>
        </div>
    </div>
            
           
  
</div>


</div>
