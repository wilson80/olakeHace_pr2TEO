<?php session_start(); ?>
 
 
    <style>
        /* Estilos para oscurecer el fondo */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        /* Estilos del modal */
        .modal {
            background-color: #333;
    border-radius: 8px;
    width: 450px; /* Reducir un poco el ancho */
    padding: 20px;
    color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    position: relative;
    margin-right: 20px; /* Añadir margen derecho */
        }



        .modal .publication-form {
        padding: 10px 20px; /* Espacio dentro del formulario en los lados */
        }

        /* Encabezado del modal */
        .modal-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Estilos del formulario */
        .publication-form label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }





        .publication-form input[type="text"],
        .publication-form input[type="datetime-local"],
        .publication-form input[type="number"],
        .publication-form select,
        .publication-form textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #555;
            border-radius: 4px;
            background-color: #222;
            color: #fff;
        }

        .publication-form textarea {
            resize: vertical;
            height: 80px;
        }

        /* Botones en la parte inferior */
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .modal-footer button {
            background-color: #444;
            border: none;
            border-radius: 4px;
            color: #fff;
            padding: 10px 20px;
            margin-left: 10px;
            cursor: pointer;
        }

        .modal-footer button:disabled {
            background-color: #666;
            cursor: not-allowed;
        }
    </style>
 
    <!-- Overlay del modal -->
    <!-- <div class="overlay" id="overlay"> -->
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

                    <label for="cantidad-asistentes">Cantidad de asistentes:</label>
                    <input type="number" id="cantidad-asistentes" name="cantidad-asistentes">

                    <label for="sin-limite">Sin límite de asistencia:</label>
                    <input type="checkbox" id="sin-limite" name="sin-limite">

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
                <button onclick="closeModal()">Cerrar</button>
                <button type="submit" form="form-publication" id="submit-publication">Guardar</button>
            </div>
        </div>
    <!-- </div> -->

    <script>
        function closeModal() {
            document.getElementById("overlay").style.display = "none";
        }
    </script> 
