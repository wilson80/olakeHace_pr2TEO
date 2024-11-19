


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

   


