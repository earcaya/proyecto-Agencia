<?php

        require_once "usuario.php";
        require_once "../Utilidades/conexion.php";

        class UsuarioRepository{

            // Find

            function find_all(){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("SELECT * FROM usuario ");
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Usuario");
                return $resultado;
            }

            function find_by_id($ID){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("SELECT USU_ID,USU_USUARIO,PER_ID FROM usuario WHERE USU_ID = ?"); 
                $stmt->execute(array( $ID));
                $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Usuario");
                return $resultado;
            }

            function find_by_usuario($USUARIO){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("SELECT USU_ID,USU_USUARIO,PER_ID FROM usuario WHERE USU_USUARIO = ?"); 
                $stmt->execute(array($USUARIO));
                $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Usuario");
                return $resultado;
            }
            
            function find_by_per_id($PER_ID){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("SELECT * FROM usuario WHERE PER_ID = ?"); 
                $stmt->execute(array( $PER_ID));
                $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Usuario");
                return $resultado;
            }

            //insertar
            function insert_usuario($usuario){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $PER_ID = $conn->prepare("SELECT PER_ID FROM `persona` ORDER by PER_ID DESC LIMIT 0, 1");
                $PER_ID->execute();
                $resultado = $PER_ID->fetchAll(PDO::FETCH_CLASS, "Usuario");
                $stmt = $conn->prepare("INSERT INTO `usuario`(`USU_USUARIO`,`PER_ID`,`USU_CLAVE`) VALUES (?,?,?)");
                try{
                    $stmt->execute(array($usuario->correo, $resultado[0]->PER_ID, $usuario->clave)); // ==>>Preguntar
                }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                    return false;
                }
                return true;
            }

            //actualizar
            function update_usuario($usuario){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("UPDATE `usuario` SET `USU_CLAVE`=? WHERE USU_ID = ?");
                //try{
                $stmt->execute(array($usuario->PER_EMAIL, $usuario->USU_ID));
                // }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                //    return false;
                //}
                return true;
            }

            //eliminar
            function delete_usuario($usuario){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("DELETE FROM `usuario` WHERE USU_ID = ?");
                //try{
                $stmt->execute(array($usuario->USU_ID));
                //}catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                //    return false;
                //}
                return true;
            }

            function get_password_by_id($usuario){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                //a continuacion viene la consulta en este caso si recibe parametros
                $stmt = $conn->prepare("SELECT USU_CLAVE FROM usuario WHERE USU_USUARIO = ?");
                //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
                $stmt->execute(array($usuario));
                //aqui se obtiene una instancia de un array con objetos de la clase agencia
                $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Usuario");
                return $resultado;
            }
        }
?>