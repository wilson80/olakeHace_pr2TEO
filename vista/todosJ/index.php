
<h1>Todos los Jugadores</h1>


<div class="additional-content">
  <!-- Contenido adicional aquí -->
  <p>Guatemala Mundial 2024 </p>
  <br>
  <!-- Más contenido aquí -->
  <div class="containerTarjeta">

      
       <?php foreach($this->modelo->viewAllJugadores() as $eq):?>         <!--ciclo for -->
        <div class="panelTarjetaAlone">
            <div class="info">
            <!-- <p><?= $eq->imagen_equipo?> </p> -->
            <!-- <img src="<?php echo htmlspecialchars($eq->imagen_equipo); ?>" alt="Imagen "> -->
            


            <h2 style="text-align: left;">Nombre:  <?=$eq->jugador?></h2>
            <div class="info"> <br> <br>
            <img src="assets/img/iconoJ.png" alt="Imagen ">
            <br>
            <br>
            <h2 style="text-align: left;">Fecha Insercion: <?=$eq->fecha_insercion?> </h2>
            <br>
                <br>
                <p>Edad:  <?=$eq->edad?> Años</p>
                <br>
                <p>Altura: <?=$eq->altura?></p>
                <br>
                <p>Peso: <?=$eq->peso?></p>
                <br>
                <h2>Nacionalidad: <?=$eq->nacionalidad?> </h2>
                <br>
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
