
<h1>Definicion de Encuentros del MUNDIAL</h1>

<div class="additional-content">
  <!-- Contenido adicional aquí -->
  <p>Guatemala Mundial 2024 </p>
  <br>
  <!-- Más contenido aquí -->
  <div class="containerTarjeta">

      
       <?php foreach($this->modelo->viewEcuentros() as $eq):?>         <!--ciclo for -->
        <div class="panelTarjetaAlone">
            <div class="info">
            <!-- <p><?= $eq->imagen_equipo?> </p> -->
            <!-- <img src="<?php echo htmlspecialchars($eq->imagen_equipo); ?>" alt="Imagen "> -->
            


            <h2 style="text-align: left;">Equipo Local: <?=$eq->equipo_local?></h2>
            <div class="info"> <br> <br>
            <img src="<?php echo htmlspecialchars($eq->imagen_local); ?>" alt="Imagen ">
            <br>
            <br>
            <h2 style="text-align: left;">Equipo visitante: <?=$eq->equipo_visitante?> </h2>
            <br>
                <br>
                <p>Fecha:  <?=$eq->fecha?></p>
                <br>
                <p>Edicion: <?=$eq->edicion?></p>
                <br>
                <p>Lugar: <?=$eq->lugar?></p>
                <br>
                <h2>Ganador <?=$eq->resultado?> </h2>
                <br>
                <h2> <?=$eq->goles_local?>------ <?=$eq->goles_visitante?> </h2>
                <br>
            </div>
         </div>
         </div>
        <?php endforeach;?>            
            
            
            <!-- <div class="panelTarjetaAlone"> -->
            <!-- <?php $p=$this->modelo->viewEquipos()?> -->
            <!-- <img src="<?php echo $p->yo; ?>" alt="Imagen del jugador"> -->
  
</div>


</div>
