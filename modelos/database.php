<?php
 
class database{
    // CREATE USER 'user_proyect_finak'@'localhost' IDENTIFIED BY 'proyectofinal';
    // GRANT SELECT, INSERT, UPDATE, DELETE ON dbolake.* TO 'user_proyect_finak'@'localhost';
    

   const servidor = "localhost"; 
   const  usuariobd = "root";
   const  clave = "";
   const  nombrebd = "bd_olake";
//    const servidor = "localhost"; 
//    const  usuariobd = "root";
//    const  clave = "";
//    const  nombrebd = "bd_olake";

   
//    const  nombrebd = "bd_olake";


    public static function conectar(){
        try {
            $conexion = new PDO(
            "mysql:host=".self::servidor.
            ";dbname=".self::nombrebd.
            ";charset=utf8"
            ,self::usuariobd
            ,self::clave
            );

            $conexion->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

            return $conexion;

            echo "olllllll";
        } catch (PDOException $e) {
            $mensaje = "¡Error conexcion!";
            echo "<script>alert('$mensaje');</script>";
        
                return "Fallo la conexion".$e->getMessage();
        }
    }

    



}

