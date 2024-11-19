



 


<!-- Ventana modal para la denuncia -->
<div id="modale_user" class="modale_user">
    <div class="modale_user-content">
        <h2>Reportando a un usuario publicador</h2>
        <h2>Selecciona una razón</h2>
        <h3 id="titulo-publicacionu"></h3> <!-- Aquí aparecerá el título -->
        <ul>
            <li data-id="1"><input type="radio" name="razonu" value="Contenido violento"> Contenido Violento</li>
            <li data-id="2"><input type="radio" name="razonu" value="Contenido enganoso"> Contenido Enganoso</li>
            <li data-id="3"><input type="radio" name="razonu" value="ubicado en categoria incorrecta"> Ubicado en categoria incorrecta</li>
            <li data-id="4"><input type="radio" name="razonu" value="Parece Spam"> Parece smpam</li>
            <li data-id="5"><input type="radio" name="razonu" value="Incita al odio"> Incita al odio</li>
            <li data-id="6"><input type="radio" name="razonu" value="Contenido no apto para publico sensible"> Contenido no apto para publico sensible</li>
            <li data-id="7"><input type="radio" name="razonu" value="Otro"> Otro</li>
        </ul>
        <form id="reportu-form" action="?c=user_reg&a=insertarReporteUser" method="POST">
            <input type="hidden" id="publicacionu-id" name="publicacionu_id" value="">
            <label for="otra-razonu">Otro:</label>
            <input type="text" id="otra-razonu" name="otra-razonu" placeholder="Especificar otro motivo" required>
                

            <button type="submit" id="enviarUser-btn">Enviar</button>
            <br>
            <button id="cancelarUser-btn">Cancelar</button>
        </form>
    </div>
</div>



<!-- Mensaje de éxito -->
<div id="mensaje-exito" class="mensaje-exito">Denuncia enviada</div>

   


