<?php
    class Conexion {

        public static function conectar(){
            $host = "DESKTOP-N31IT5V";
            $dbName = "AppPedidos";
            $puerto = "1433";
            try {
                $conn = new PDO("sqlsrv:Server=$host,$puerto;Database=$dbName", NULL, NULL);
                $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                return $conn;
            } catch ( PDOException $e ) {
                echo "Error: " . $e->getMessage();
            }            

            
        }
    } 
?>