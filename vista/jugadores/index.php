
<h1>Equipos del MUNDIAL</h1>

<div class="additional-content">
  <!-- Contenido adicional aquí -->
  <p>Guatemala Mundial 2024 </p>
  <br>
  <!-- Más contenido aquí -->
  <div class="containerTarjeta">

      
       <?php foreach($this->modelo->viewEquipos() as $eq):?>         <!--ciclo for -->
        <div class="panelTarjetaAlone">
            <div class="info">
            <!-- <p><?= $eq->imagen_equipo?> </p> -->
            <img src="<?php echo htmlspecialchars($eq->imagen_equipo); ?>" alt="Imagen ">

                <h2><?=$eq->equipo?></h2>
                <br>
                <p>Pais: <?=$eq->pais?> </p>
                <br>
                <p>Fundacion: <?=$eq->fundacion?> </p>
                <br>
                <p>Partidas Jugadas: <?=$eq->partidas_jugadas?></p>
                <br>
                <p>Partidas Ganadas: <?=$eq->partidas_ganadas?></p>
                <br>
                <p>Cantidad jugadores: <?=$eq->cantidad_jugadores?> </p>
                <br>
            </div>
         </div>
        <?php endforeach;?>            
            
            
            <!-- <div class="panelTarjetaAlone"> -->
            <!-- <?php $p=$this->modelo->viewEquipos()?> -->
            <!-- <img src="<?php echo $p->yo; ?>" alt="Imagen del jugador"> -->
  
</div>


</div>
