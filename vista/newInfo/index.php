<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="assets/css/forms.css">
</head>

<body>
    <div class="bodyFormContenedor">
        <!-- Barra de navegación con los botones -->
        <div class="navbar">
            <button onclick="mostrarFormulario('formJugador')">Nuevo Jugador</button>
            <button onclick="mostrarFormulario('formEquipo')">Nuevo equipo</button>
            <button onclick="mostrarFormulario('formEncuentros')">Nuevo Encuentro</button>
        </div>

        <!-- Contenedor de formularios -->
        <div class="form-container">
            <!-- Formulario 1 -->
            <form id="formJugador" class="formulario" method="POST" action="?c=newInfo&a=insertarJugador">
            <!-- <form id="formJugador" class="formulario" method="" action=""> -->
                <h2>Agregar nuevo jugador</h2><br>
                <!-- nombre, equipo_id, edad, altura, peso, nacionalidad, total_anotaciones, partidos_ganados, partidos_jugados, imagen_path -->
                <!-- Nombre del equipo -->
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre1" name="nombre" placeholder="Ingresa el nombre del jugador" required>
                
                <!-- País -->
                <label for="equipoId">Id del equipo</label>
                <input type="text"  id="equipoId" name="equipoId" placeholder="Ingresa el id de tu equipo" required>
                
                <!-- Fundación (Fecha) -->
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" placeholder="Ingrese la edad del jugador" required>
                
                <!-- Partidas jugadas (Spinner) -->
                <label for="altura">Altura:</label>
                <input type="number" id="altura" name="altura" min="0" placeholder="Ingresa la altura en centimetros" required>
                
                <!-- Partidas ganadas (Spinner) -->
                <label for="peso">Peso:</label>
                <input type="number" id="peso" name="peso" min="0" placeholder="Ingresa el peso en lb" required>

                <label for="nacionalidad">Nacionalidad:</label>
                <input type="text" id="nacionalidad" name="nacionalidad" min="0" placeholder="Ingresa la nacionalidad" required>

                <label for="anotaciones">Total anotaciones:</label>
                <input type="number" id="anotaciones" name="anotaciones" min="0" placeholder="Ingresa las anotaciones" required>
               
                <label for="pganadas">Partidas ganadas:</label>
                <input type="number" id="pganadas" name="pganadas" min="0" placeholder="Ingresa la cantidad" required>
                
                <label for="pjugadas">Partidas jugadadas:</label>
                <input type="number" id="pjugadas" name="pjugadas" min="0" placeholder="Ingresa la cantidad" required>

                <!-- Botón de envío -->
                <button type="submit">Enviar</button>
            </form>
        </div>


        <!-- Contenedor de formularios -->
        <!-- <div class="form-container"  method="POST" action="?c=newInfo&a=insertarEquipo"> -->
        <div class="form-container"  >
            <!-- Formulario 1 -->
            <form id="formEquipo" class="formulario" style="display: none;" method="POST" action="?c=newInfo&a=insertarEquipo">
                <h2>Agregar nuevo equipo</h2><br>
                <!-- $consulta = (nombre, pais, fundacion, imagen_path, partidas_jugadas, partidas_ganadas)  -->
                <!-- Nombre del equipo -->
                <label for="nombre">Nombre equipo:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingresa el nombre del jugador" required>
                
                <!-- País -->
                <label for="pais">Pais</label>
                <input type="text"  id="pais" name="pais" placeholder="Ingresa el id de tu equipo" required>
                
                <!-- Fundación (Fecha) -->
                <label for="fundacion">Fundacion:</label>
                <input type="date" id="fundacion" name="fundacion" placeholder="Ingrese la edad del jugador" required>
                
                <!-- Partidas jugadas (Spinner) -->
                <label for="rutaImg">Ruta imagen:</label>
                <input type="text" id="rutaImg" name="rutaImg" min="0" placeholder="Ingresa la altura en centimetros" required>
          
                
                <label for="pjugadas">Partidas jugadadas:</label>
                <input type="number" id="pjugadas" name="pjugadas" min="0" placeholder="Ingresa la cantidad" required>
               
                <label for="pganadas">Partidas ganadas:</label>
                <input type="number" id="pganadas" name="pganadas" min="0" placeholder="Ingresa la cantidad" required>
                

                <!-- Botón de envío -->
                <button type="submit">Enviar</button>
            </form>
        </div>
        <!-- Contenedor de formularios -->
        <div class="form-container">
            <!-- Formulario 1 -->
            <!-- INSERT INTO encuentros (equipo_local_id, equipo_visitante_id, goles_local, goles_visitante, fecha, lugar, edicion, resultado) 
            VALUES (1, 2, 3, 2, '2024-07-01', 'Estadio Local', 'Edición 2024', 'Equipo Local'); -->

            <form id="formEncuentros" class="formulario" style="display: none;" method="POST" action="?c=newInfo&a=insertarEncuentro">
                <h2>Agregar Encuentros</h2><br>
                <!-- Nombre del equipo -->
                <label for="idquipoL">Id del equipo local:</label>
                <input type="text" id="idquipoL" name="idquipoL" placeholder="Ingresa el id del equipo local" required>
                
                <!-- País -->
                <label for="idequipoV">Id del equipo visitante</label>
                <input type="text"  id="idequipoV" name="idequipoV" placeholder="Ingresa el id del equipo visitante" required>
                
                <!-- Partidas jugadas (Spinner) -->
                <label for="golesL">Goles local:</label>
                <input type="number" id="golesL" name="golesL" min="0" placeholder="Ingresa la cantidad" required>
                
                <!-- Fundación (Fecha) -->
                <label for="golesS">Goles visitante:</label>
                <input type="number" id="golesS" name="golesS" placeholder="Ingrese la cantidad" required>
                
                
                <!-- Partidas ganadas (Spinner) -->
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" min="0" placeholder="Ingresa la fecha del encuentro" required>

                <label for="lugar">Lugar:</label>
                <input type="text" id="lugar" name="lugar" min="0" placeholder="Ingresa el lugar de realizacion" required>

                <label for="edicion">Edicion:</label>
                <input type="number" id="edicion" name="edicion" min="0" placeholder="Ingresa la edicion del encuentro" required>
               
                <label for="ganador">Ganador:</label>
                <input type="text" id="ganador" name="ganador" min="0" placeholder="Ingresa el nombre de equipo ganador" required>

                <!-- Botón de envío -->
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>


    <script src="assets/js/cambiarForm.js"></script>

</body>

</html>
