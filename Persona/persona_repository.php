<?php

        require_once "persona.php";
        require_once "../Utilidades/conexion.php";

        class PersonaRepository{

            // Find

            function find_all(){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("SELECT PER_ID, PER_TIPO_DOC, PER_CEDULA, PER_NOMBRES, PER_APELLIDOS, PER_EMAIL, PER_FECHANAC, PER_NACIONALIDAD FROM persona ");
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Persona");
                return $resultado;
            }

            function find_by_id($ID){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("SELECT PER_ID, PER_TIPO_DOC, PER_CEDULA, PER_NOMBRES, PER_APELLIDOS, PER_EMAIL, PER_FECHANAC, PER_NACIONALIDAD FROM persona WHERE PER_ID = ?"); 
                $stmt->execute(array( $ID));
                $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Persona");
                return $resultado;
            }

            function find_by_cedula($CEDULA){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("SELECT PER_ID, PER_TIPO_DOC, PER_CEDULA, PER_NOMBRES, PER_APELLIDOS, PER_EMAIL, PER_FECHANAC, PER_NACIONALIDAD FROM persona WHERE PER_CEDULA = ?"); 
                $stmt->execute(array( $CEDULA));
                $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Persona");
                return $resultado;
            }

            function find_by_fechanac($FECHANAC){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("SELECT PER_ID, PER_TIPO_DOC, PER_CEDULA, PER_NOMBRES, PER_APELLIDOS, PER_EMAIL, PER_FECHANAC, PER_NACIONALIDAD FROM persona WHERE PER_FECHANAC = ?"); 
                $stmt->execute(array( $FECHANAC));
                $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Persona");
                return $resultado;
            }

            //insertar
            function insert_persona($persona){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("INSERT INTO persona(PER_TIPO_DOC, PER_CEDULA, PER_NOMBRES, PER_APELLIDOS, PER_EMAIL,PER_FECHANAC, PER_NACIONALIDAD) VALUES (?,?,?,?,?,?,?)");
                try{
                    $stmt->execute(array($persona->tipo_documento, $persona->documento, $persona->nombres, $persona->apellidos, $persona->correo, $persona->fecha_nacimiento, $persona->nacionalidad));
                }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                    return false;
                }
                return true;
            }

            //actualizar
            function update_persona($persona){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("UPDATE `persona` SET `PER_EMAIL`=? WHERE PER_ID = ?");
                //try{
                $stmt->execute(array($persona->PER_EMAIL, $persona->PER_ID));
                // }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                //    return false;
                //}
                return true;
            }

            //eliminar
            function delete_persona($persona){
                $conexion = new Conexion();
                $conn = $conexion->conectar();
                $stmt = $conn->prepare("DELETE FROM `persona` WHERE PER_ID = ?");
                //try{
                $stmt->execute(array($persona->PER_ID));
                //}catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                //    return false;
                //}
                return true;
            }


        }



?>