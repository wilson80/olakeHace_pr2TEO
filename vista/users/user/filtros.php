<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <style>


.contenedor-filtros {
    width: 100%;
    max-width: 1200px; /* Limita el ancho máximo */
    margin: 20px auto; /* Centra el contenedor con margen superior e inferior */
    padding: 0 20px; /* Añade espacio lateral */
}

.filtros {
    display: flex;
    gap: 20px;
    background-color: 	#0a326d; /* Cambiado a azul marino */
    padding: 10px 20px;
    border-radius: 8px;
    color: white;
    align-items: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Sombra ligera para darle efecto */
}

.tipo-publico {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

#tipoPublicoSelect {
    padding: 5px;
    border-radius: 5px;
    border: none;
}

.categorias {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.categoria-opciones {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

/* Estilos personalizados para los radio buttons */
input[type="radio"] {
    appearance: none;
    width: 20px;
    height: 20px;
    border: 2px solid white;
    border-radius: 50%;
    background-color: transparent;
    position: relative;
    cursor: pointer;
    margin-right: 10px;
}

input[type="radio"]:checked {
    background-color: white;
}

input[type="radio"]::before {
    content: '';
    display: block;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #1c3b57; /* Azul marino para el indicador seleccionado */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.2s ease-in-out;
}

input[type="radio"]:checked::before {
    opacity: 1;
}





    </style>



</head>
<body>
    <div class="contenedor-filtros">
        <div class="filtros">
            <div class="tipo-publico">
                <label for="tipoPublicoSelect"><h3>Tipo público</h3></label>
                <select id="tipoPublicoSelect">
                    <option value="familiar" <?php  echo ($this->filtroPublico === 'familiar') ? 'selected' : ''; ?>>Todo público</option>
                    <option value="adulto" <?php  echo ($this->filtroPublico === 'adulto') ? 'selected' : ''; ?> >Adulto</option>
                    <option value="infantil"  <?php  echo ($this->filtroPublico === 'infantil') ? 'selected' : ''; ?> >Infantil</option>
                </select>
            </div>

            
            
            <div class="categorias">
                <h3>Selecciona la categoría</h3>
                <div class="categoria-opciones">
                    <label>
                        <input type="radio" name="categoria" value="nofilter"  <?php  echo ($this->filtroCategoria === 'nofilter') ? 'checked' : ''; ?>  > Sin filtro
                    </label>
                    <label>
                        <input type="radio" name="categoria" value="deporte"  <?php  echo ($this->filtroCategoria === 'deporte') ? 'checked' : ''; ?>  > Deporte
                    </label>
                    <label>
                        <input type="radio" name="categoria" value="cocina"  <?php  echo ($this->filtroCategoria === 'cocina') ? 'checked' : ''; ?> > Cocina 
                    </label>
                    <label>
                        <input type="radio" name="categoria" value="politica" <?php  echo ($this->filtroCategoria === 'politica') ? 'checked' : ''; ?> > Política
                    </label>
                    <label>
                        <input type="radio" name="categoria" value="religioso" <?php  echo ($this->filtroCategoria === 'religioso') ? 'checked' : ''; ?> > Religioso
                    </label>
                    <label>
                        <input type="radio" name="categoria" value="academico" <?php  echo ($this->filtroCategoria === 'academico') ? 'checked' : ''; ?> > Académico
                    </label>
                    <label>
                        <input type="radio" name="categoria" value="historia" <?php  echo ($this->filtroCategoria === 'historia') ? 'checked' : ''; ?> > Historia
                    </label>
                </div>
            </div>
        </div>
    </div>

   
    <script>


    document.addEventListener('DOMContentLoaded', () => {
        const tipoPublicoSelect = document.getElementById('tipoPublicoSelect');
        const categoriaInputs = document.querySelectorAll('input[name="categoria"]');

        tipoPublicoSelect.addEventListener('change', () => {
            // alert('Tipo público seleccionado:' + tipoPublicoSelect.value);
            const controlador = "?c=user_reg&ftipo=";
            const url = controlador + tipoPublicoSelect.value;
            cargarFiltro(url);
            
        });


        categoriaInputs.forEach(input => {
            input.addEventListener('change', () => {
                // alert('Categoría seleccionada:'+  input.value);
                const controlador = "?c=user_reg&fcategoria=";
                const url = controlador + input.value;
                cargarFiltro(url);

            });
        });
    });



    </script>





    
</body>
</html>
