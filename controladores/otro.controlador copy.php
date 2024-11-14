y<?php

require_once "modelos/database.php";

class otroControlador {
    
    public function Inicio() {
        // Aquí puedes cargar la vista inicial si deseas.
        echo "Bienvenido al controlador de usuario.";
    }
    
    public function insertar() {
        // Verificamos que los datos `id1` e `id2` estén disponibles en `$_POST`
        if (isset($_POST['id1']) && isset($_POST['id2'])) {
            // Obtenemos los valores de `id1` e `id2`
            $id1 = $_POST['id1'];
            $id2 = $_POST['id2'];



            
            // Conectar a la base de datos
            $conexion = database::conectar();
            

            // INSERT INTO reporte (id_publicacion, id_motivo, fecha_report)
            // VALUES (3, 5, NOW());
            

            // Prepara la consulta SQL
            $sql = "INSERT INTO reporte (id_publicacion, id_motivo, fecha_report) VALUES (:id1, :id2, NOW() )";
            
            try {
                // Preparar la sentencia
                $stmt = $conexion->prepare($sql);
                // Enlazar los valores a los parámetros
                $stmt->bindParam(':id1', $id1, PDO::PARAM_INT);
                $stmt->bindParam(':id2', $id2, PDO::PARAM_INT);
                
                // Ejecutar la sentencia
                $stmt->execute();
                echo "Datos insertados exitosamente";
            } catch (PDOException $e) {
                echo "Error al insertar los datos: " . $e->getMessage();
            }
        } else {
            echo "Error: Parámetros `id1` o `id2` faltantes.";
        }
    }
    
    public function aceptar() {
        // Verificamos que los datos `id1` e `id2` estén disponibles en `$_POST`
        if (isset($_POST['id1']) && isset($_POST['id2'])) {
            // Obtenemos los valores de `id1` e `id2`
            $id1 = $_POST['id1'];
            $id2 = $_POST['id2'];

            // Conectar a la base de datos
            $conexion = database::conectar();
            

            // INSERT INTO reporte (id_publicacion, id_motivo, fecha_report)
            // VALUES (3, 5, NOW());
            

            // Prepara la consulta SQL
            $sql = "INSERT INTO reporte (id_publicacion, id_motivo, fecha_report) VALUES (:id1, :id2, NOW() )";
            
            try {
                // Preparar la sentencia
                $stmt = $conexion->prepare($sql);
                // Enlazar los valores a los parámetros
                $stmt->bindParam(':id1', $id1, PDO::PARAM_INT);
                $stmt->bindParam(':id2', $id2, PDO::PARAM_INT);
                
                // Ejecutar la sentencia
                $stmt->execute();
                echo "Datos insertados exitosamente";
            } catch (PDOException $e) {
                echo "Error al insertar los datos: " . $e->getMessage();
            }
        } else {
            echo "Error: Parámetros `id1` o `id2` faltantes.";
        }
    }
}
