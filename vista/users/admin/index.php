<?php session_start(); ?>

 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ola_ke_hace</title>
    <link rel="stylesheet" href="assets/css/styles2.css">
</head>

<body>
<?php    include 'vista/users/admin/header.php'; ?>



<?php if($this->menu == "publicaciones"):?>
    <h1>Control de publicaciones</h1>
    <?php    include 'aprobar_publicaciones.php'; ?>
    
    <?php elseif($this->menu == "usuarios"):?>
<h1>Control de Usuarios</h1>
        <?php    include 'reportes_user.php'; ?>
        
<?php elseif($this->menu == "reportes"):?>
    <h1>Reportes</h1>
    <?php    include 'reportes_g.php'; ?>

            

<?php endif; ?>





 
</body>
</html>
