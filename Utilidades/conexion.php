<?php

    //clase para manejar la conexion la idea es instaciarla y que regreso una instancia de un pdo
    class Conexion{
        function conectar(){
            try {
//                $servername = "localhost";
//                $username = "id4884716_admin";
//                $password = "987654321*";
//                $conn = new PDO("mysql:host=$servername;dbname=id4884716_venturismo", $username, $password);
                $servername = "localhost";
                $username = "root";
                $password = "";
                $conn = new PDO("mysql:host=$servername;dbname=venturismo", $username, $password);
                //al darse un error lanza una excepcion
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "\n\nConección Satisfactoria";
                return $conn;
                }
            catch(PDOException $e)
                {
                echo "Fallo la conexion: " . $e->getMessage();
                }
        }
    }
?>