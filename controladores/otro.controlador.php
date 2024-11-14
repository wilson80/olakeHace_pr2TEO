<?php

require_once "modelos/database.php";

class otroControlador {
    
    public function Inicio() {
        // Aquí puedes cargar la vista inicial si deseas.
        echo "Bienvenido al controlador de pubbs.";
    }
    
    public function insertar() {//insertar reporte
    
        // Verificamos que los datos `publicacion_id`, `razon` y `otra-razon` estén disponibles en `$_POST`
        if (isset($_POST['publicacion_id']) && isset($_POST['razon'])) {
            // Obtenemos los valores
            $publicacionId = $_POST['publicacion_id'];
            $razonSeleccionada = $_POST['razon'];
            
 


            // Si la razón seleccionada es "Otro", obtenemos el valor del campo correspondiente
            $otraRazon = isset($_POST['otra-razon']) ? $_POST['otra-razon'] : null;

            // Determinamos el ID de motivo (en este caso, asumimos que `razon` es un texto; necesitarías un mapeo a IDs)
            $idMotivo = $this->mapRazonToId($razonSeleccionada, $otraRazon);

            // Conectar a la base de datos
            $conexion = database::conectar();

            // Prepara la consulta SQL
            $sql = "INSERT INTO reporte (id_publicacion, id_motivo, fecha_report) VALUES (:publicacionId, :idMotivo, NOW())";
            
            try {
                // Preparar la sentencia
                $stmt = $conexion->prepare($sql);
                // Enlazar los valores a los parámetros
                $stmt->bindParam(':publicacionId', $publicacionId, PDO::PARAM_INT);
                $stmt->bindParam(':idMotivo', $idMotivo, PDO::PARAM_INT);
                
                // Ejecutar la sentencia
                $stmt->execute();
                header("location: ?c=user");

                // echo "Datos insertados exitosamente";
            } catch (PDOException $e) {
                echo "Error al insertar los datos: " . $e->getMessage();
            }
        } else {
            echo "Error: Parámetros `publicacion_id` o `razon` faltantes.";
        }
    }


    private function mapRazonToId($razon, $otraRazon) {
        // Mapeo de razones a IDs; aquí puedes agregar más razones según tu base de datos
        $motivos = [
            "Spam" => 1,
            "Contenido ofensivo" => 2,
            "Violencia" => 3,
            "Desinformación" => 4,
            "Engañoso" => 5,
            "Otro" => 6 // Puedes usar un ID específico para "Otro" o manejarlo de otra manera
        ];

        // Si la razón seleccionada es "Otro", usa el valor del campo 'otra-razon'
        if ($razon === "Otro" && !empty($otraRazon)) {
            // Aquí podrías manejar la lógica para insertar "Otra razón" en tu base de datos y retornar su ID
            // Por simplicidad, asumimos que lo guardamos y le asignamos un ID de 7
            return 7; // Esto debe ser reemplazado por la lógica de inserción
        }

        // Retornamos el ID correspondiente
        return isset($motivos[$razon]) ? $motivos[$razon] : null;
    }



    public function aceptar() {
        // Verificar que `id` esté presente en `$_GET`
        $id = isset($_GET['id']) ? $_GET['id'] : null;
    
        if ($id) {
            // Conectar a la base de datos
            $conexion = database::conectar();
    
            // Preparar la consulta SQL
            $sql = "UPDATE publicacion
                    SET id_estado = :ide
                    WHERE id_publicacion = :id;";
    
    
            $estado = 2;        //aceptar en la columna estado de una  
            try {
                // Preparar la sentencia
                $stmt = $conexion->prepare($sql);
                
                // Enlazar los valores a los parámetros
                $stmt->bindParam(':ide', $estado, PDO::PARAM_INT); // Usar una variable para mayor claridad
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
                // Ejecutar la sentencia
                $stmt->execute();
                echo "Publicación actualizada exitosamente";
    
                // Redireccionar
                header("location: ?c=user");

                exit;  // Termina la ejecución para evitar cualquier salida adicional
    
            } catch (PDOException $e) {
                echo "Error al actualizar la publicación: " . $e->getMessage();
            }
        } else {
            echo "Error: Falta el parámetro 'id'.";
        }
    }








    
 

    
}
