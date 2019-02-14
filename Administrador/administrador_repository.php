<?php

        require_once "administrador.php";
        require_once "../Utilidades/conexion.php";

        class AdministradorRepository{

            // Find

            function find_all(){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("SELECT * FROM administrador ");
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Administrador");
                return $resultado;
            }

            function find_by_id($ID){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("SELECT ADM_ID,ADM_USUARIO,PER_ID FROM administrador WHERE ADM_ID = ?"); 
                $stmt->execute(array( $ID));
                $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Administrador");
                return $resultado;
            }

            function find_by_usuario($USUARIO){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("SELECT ADM_ID,ADM_USUARIO,PER_ID FROM administrador WHERE ADM_USUARIO = ?"); 
                $stmt->execute(array($USUARIO));
                $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Administrador");
                return $resultado;
            }
            
            function find_by_per_id($PER_ID){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("SELECT * FROM usuario WHERE PER_ID = ?"); 
                $stmt->execute(array( $PER_ID));
                $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Administrador");
                return $resultado;
            }

            //insertar
            function insert_administrador($administrador){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("INSERT INTO `administrador`(`ADM_ID`,`ADM_USUARIO`,`PER_ID`,`ADM_CLAVE`) VALUES (?,?,?,?)");
                try{
                    $stmt->execute(array($administrador->ADM_ID, $administrador->ADM_USUARIO, $administrador->PER_ID, $administrador->ADM_CLAVE));
                }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                    return false;
                }
                return true;
            }

            //actualizar
            function update_administrador($administrador){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("UPDATE `administrador` SET `ADM_CLAVE`=? WHERE ADM_ID = ?");
                try{
                $stmt->execute(array($administrador->PER_EMAIL, $administrador->ADM_ID));
                 }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                    return false;
                }
                return true;
            }

            //eliminar
            function delete_administrador($administrador){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("DELETE FROM `administrador` WHERE ADM_ID = ?");
                try{
                $stmt->execute(array($administrador->ADM_ID));
                }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                    return false;
                }
                return true;
            }

            function get_password_by_id($usuario){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                //a continuacion viene la consulta en este caso si recibe parametros
                $stmt = $conn->prepare("SELECT ADM_CLAVE FROM administrador WHERE ADM_USUARIO = ?");
                //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
                $stmt->execute(array($usuario));
                //aqui se obtiene una instancia de un array con objetos de la clase agencia
                $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Administrador");
                return $resultado;
            }
        }
?>