<?php

    require_once "viaje.php";
    require_once "../Utilidades/conexion.php";

    //clase que se encarga de realizar los queries a la base de datos para el caso de la tabla agencia
    class viajesRepository
    {

        //retorna todos los viajes de la tabla y retorna una lista
        function find_all()
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso no recibe parametros
            $stmt = $conn->prepare("SELECT VIJ_ID, VIJ_FECHA, VIJ_TIPO, VIJ_COSTO, CANT_BOL, AGENCIA_AG_ID, RUT_ID FROM viaje ");
            $stmt->execute();
            //aqui se obtiene una instancia de un array con objetos de la clase agencia
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "viaje");
            return $resultado;
        }

        //a partir de aqui los metodos se encargar de buscar dado un parametro en particular, todas las funciones
        //son similares

        //encuentra los viajes que tengan el id especificado
        function find_by_id($ID)
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT VIJ_ID, VIJ_FECHA, VIJ_TIPO, VIJ_COSTO, CANT_BOL, AGENCIA_AG_ID, RUT_ID FROM viaje WHERE VIJ_ID =" . $ID);
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array($ID));
            //aqui se obtiene una instancia de un array con objetos de la clase viaje
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "viaje");
            return $resultado;
        }

        //encuentran los viajes con una fecha especifica
        function find_by_fecha($FECHA)
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT VIJ_ID, VIJ_FECHA, VIJ_TIPO, VIJ_COSTO, CANT_BOL, AGENCIA_AG_ID, RUT_ID FROM viaje WHERE VIJ_FECHA =" . $FECHA);
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array($FECHA));
            //aqui se obtiene una instancia de un array con objetos de la clase viaje
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "viaje");
            return $resultado;
        }
        
        //encuentran los viajes de un tipo especifico
        function find_by_tipo($TIPO)
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT VIJ_ID, VIJ_FECHA, VIJ_TIPO, VIJ_COSTO, CANT_BOL, AGENCIA_AG_ID, RUT_ID FROM viaje WHERE VIJ_TIPO = ?");
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array($TIPO));
            //aqui se obtiene una instancia de un array con objetos de la clase viaje
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "viaje");
            return $resultado;
        }

        //encuentran los viajes con un costo especifico
        function find_by_costo($COSTO)
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT VIJ_ID, VIJ_FECHA, VIJ_TIPO, VIJ_COSTO, CANT_BOL, AGENCIA_AG_ID, RUT_ID FROM viaje WHERE VIJ_COSTO =" . $COSTO);
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array($COSTO));
            //aqui se obtiene una instancia de un array con objetos de la clase viaje
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "viaje");
            return $resultado;
        }

        //encuentran los viajes desde un costo especifico
        function find_since_costo($COSTO)
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT VIJ_ID, VIJ_FECHA, VIJ_TIPO, VIJ_COSTO, CANT_BOL, AGENCIA_AG_ID, RUT_ID FROM viaje WHERE VIJ_COSTO >=" . $COSTO ."ORDER BY ASC");
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array($COSTO));
            //aqui se obtiene una instancia de un array con objetos de la clase viaje
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "viaje");
            return $resultado;
        }

         //encuentran los viajes desde un costo especifico
        function find_unti_costo($COSTO)
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT VIJ_ID, VIJ_FECHA, VIJ_TIPO, VIJ_COSTO, CANT_BOL, AGENCIA_AG_ID, RUT_ID FROM viaje WHERE VIJ_COSTO <=" . $COSTO ."ORDER BY DESC");
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array($COSTO));
            //aqui se obtiene una instancia de un array con objetos de la clase viaje
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "viaje");
            return $resultado;
        }

        //retorna todos los viajes de la tabla y retorna una lista ordenada ascendente con repecto al costo
        function find_all_costo_asc()
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT VIJ_ID, VIJ_FECHA, VIJ_TIPO, VIJ_COSTO, CANT_BOL, AGENCIA_AG_ID, RUT_ID FROM viaje ORDER BY VIJ_COSTO ASC");
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array());
            //aqui se obtiene una instancia de un array con objetos de la clase viaje
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "viaje");
            return $resultado;
        }

        //retorna todos los viajes de la tabla y retorna una lista ordenada descendente con repecto al costo
        function find_all_costo_desc()
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT VIJ_ID, VIJ_FECHA, VIJ_TIPO, VIJ_COSTO, CANT_BOL, AGENCIA_AG_ID, RUT_ID FROM viaje ORDER BY VIJ_COSTO DESC");
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array());
            //aqui se obtiene una instancia de un array con objetos de la clase viaje
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "viaje");
            return $resultado;
        }

         //encuentran los viajes desde una agencia especifica
        function find_by_agencia_ag_id($AGENCIA_AG_ID)
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT VIJ_ID, VIJ_FECHA, VIJ_TIPO, VIJ_COSTO, CANT_BOL, AGENCIA_AG_ID, RUT_ID FROM viaje WHERE AGENCIA_AG_ID =" . $AGENCIA_AG_ID );
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array($AGENCIA_AG_ID));
            //aqui se obtiene una instancia de un array con objetos de la clase viaje
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "viaje");
            return $resultado;
        }

        //insertar
        function insert_viaje($VIAJE){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("INSERT INTO `viaje`(`VIJ_FECHA`, `VIJ_TIPO`, `VIJ_COSTO`, `CANT_BOL`, `AGENCIA_AG_ID`, `RUT_ID`) VALUES (?,?,?,?,?,?)");
            try{
                //$stmt->execute(array($VIAJE->VIJ_FECHA, $VIAJE->VIJ_TIPO, $VIAJE->VIJ_COSTO, $VIAJE->AGENCIA_AG_ID, $VIAJE->RUT_ID));
                $stmt->execute(array($VIAJE->fecha, $VIAJE->tipo, $VIAJE->costo, $VIAJE->boletos, $VIAJE->id_agencia, $VIAJE->ruta));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
        }

        //actualizar
        function update_viaje($VIAJE){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("UPDATE `viaje` SET `VIJ_FECHA`=?,`VIJ_TIPO`=?,`VIJ_COSTO`=?, `CANT_BOL`=?, `AGENCIA_AG_ID`=?,`RUT_ID`=? WHERE VIJ_ID = ?");
            try{
            $stmt->execute(array($VIAJE->VIJ_ID, $VIAJE->VIJ_FECHA, $VIAJE->VIJ_TIPO, $VIAJE->VIJ_COSTO, $VIAJE->boletos, $VIAJE->AGENCIA_AG_ID, $VIAJE->RUT_ID, $VIAJE->VIJ_ID));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
        }

         //eliminar
        function delete_viaje($VIAJE){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("DELETE FROM `viaje` WHERE VIJ_ID = ?");
            try{
            $stmt->execute(array($VIAJE->VIJ_ID));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
        }

    }

?>