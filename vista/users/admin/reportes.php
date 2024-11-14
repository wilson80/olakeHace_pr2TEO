<?php session_start(); ?>

 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ola_ke_hace</title>
    <link rel="stylesheet" href="assets/css/styles2.css">
    <style>

 
    /* Estilos para la barra */
    .barra-reportes {
        width: 25%; /* Ajusta este valor para el ancho de la barra */
        margin: 20px auto; /* Centra la barra horizontalmente y agrega un margen superior */
        background-color: white;
        display: flex;
        justify-content: space-around;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Estilos para los botones */
    .boton {
        padding: 10px 20px;
        border: 2px solid #ccc;
        border-radius: 8px;
        background-color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .boton:hover {
        background-color: #f0f0f0;
        border-color: #888;
    }

    .boton:active {
        background-color: #e0e0e0;
        border-color: #666;
    }

    button:disabled {
        opacity: 0.5;         /* Hace que el botón se vea más claro */
        cursor: not-allowed;  /* Muestra un cursor de "no permitido" */
        background-color: #ccc; /* Cambia el color de fondo */
        color: #666;          /* Cambia el color del texto */
    }



    .details-button.deshabilitado {
        opacity: 0.5;          /* Apariencia visual de deshabilitado */
        cursor: not-allowed; 
    }



</style>


    </style>
</head>

<body>
    <!-- Cabecera -->
 
<!-- Barra de botones -->
<div class="barra-reportes">
    <button class="boton" onclick="cargarVistaa('1')">Sin revision</button>
    <button class="boton" onclick="cargarVistaa('2')">Ignorado</button>
    <button class="boton" onclick="cargarVistaa('3')">Aceptado</button>
</div>
 

<br> <br>


<h1 style="color: blanchedalmond;"><?= $this->filtroReporte ?></h1>




 

<div class="grid-container"> 
    <?php foreach($this->reportes as $r):?>         <!--ciclo for -->
        <?php if ($this->condicionRep == $r->id_estado): ?>
                    <div class="card">
                        <div class="container">
                            <div class="header">
                                <div class="date">Fecha reporte:  <?= $r->fecha_reportxz?></div> 
                                </button>
                            </div>
                        
                            <div class="content">
                                <h5>id reporte: <?= $r->id_reporte?></h3>
                                <h5>Motivo:<?= $r->motivo?></h3>
                            </div>
                            <div class="footerTarjeta">
                                    <button  class="details-button" onclick="updateR('<?= $r->id_reporte?>', 3 )"  >Aceptar</button>
                                    <button  class="details-button" data-id="c" >Ignorar</button>
                            </div>
                        </div>
                        </div>
        <?php endif; ?>     
    
                    <!-- Puedes agregar más tarjetas aquí siguiendo el mismo formato -->
    <?php endforeach;?> 
</div>
   
 



 <script>
     // Deshabilitar el botón
     const ide = <?php echo json_encode($this->filtroReporte); ?>;
     if(ide== "Ignorado" || ide== "Aceptado"  ){
             // Deshabilitar todos los botones con la clase "miBoton"
            document.querySelectorAll('.details-button').forEach(boton => {
            boton.disabled = true;  // Aplica el atributo disabled
            });
        }
        


    function cargarVistaa(url) {
        
        const id = <?php echo json_encode($this->currentId); ?>;
        const controlador = "?c=admin&a=mostrarReportes&id=" + id;
        const otro = "&a=mostrarFiltrarReportes&tipor=" + url;
        const dos = controlador + otro;

        window.location.href = controlador + otro;  // Redirige a la nueva URL
    }



    function updateR(id_reporte, id_estado) {
        const idPubg = <?php echo json_encode($this->currentId); ?>;
        const controlador = "?c=admin&a=updateReporte&id=" + idPubg;
        const dos = "&id_r=" + id_reporte;
        const tres = "&id_e=" + id_estado;

        window.location.href = controlador + dos + tres;  // Redirige a la nueva URL
    }
</script>

 
</body>
</html>
