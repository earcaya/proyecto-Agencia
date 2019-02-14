<?php

    require_once "boleto.php";
    require_once "../Utilidades/conexion.php";

    //clase que se encarga de realizar los queries a la base de datos para el caso de la tabla agencia
    class boletoRepository
    {

        //retorna todos los boletos de la tabla y retorna una lista
        function find_all()
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso no recibe parametros
            $stmt = $conn->prepare("SELECT BOL_ID, BOL_NUMERO, BOL_FECHA, BOL_TIPO, PER_ID, VIJ_ID FROM boleto ");
            $stmt->execute();
            //aqui se obtiene una instancia de un array con objetos de la clase agencia
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "boleto");
            return $resultado;
        }

        //a partir de aqui los metodos se encargar de buscar dado un parametro en particular, todas las funciones
        //son similares

        //encuentra los boletos que tengan el id especificado
        function find_by_id($ID)
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT BOL_ID, BOL_NUMERO, BOL_FECHA, BOL_TIPO, PER_ID, VIJ_ID FROM boleto WHERE BOL_ID =" . $ID);
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array($ID));
            //aqui se obtiene una instancia de un array con objetos de la clase boleto
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "boleto");
            return $resultado;
        }

        //encuentran los boletos con una fecha especifica
        function find_by_numero($NUMERO)
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT BOL_ID, BOL_NUMERO, BOL_FECHA, BOL_TIPO, PER_ID, VIJ_ID FROM boleto WHERE BOL_NUMERO =" . $NUMERO);
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array($NUMERO));
            //aqui se obtiene una instancia de un array con objetos de la clase boleto
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "boleto");
            return $resultado;
        }
        
        //encuentran los boletos de un tipo especifico
        function find_by_fecha($FECHA)
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT BOL_ID, BOL_NUMERO, BOL_FECHA, BOL_TIPO, PER_ID, VIJ_ID FROM boleto WHERE BOL_FECHA =". $FECHA);
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array($FECHA));
            //aqui se obtiene una instancia de un array con objetos de la clase boleto
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "boleto");
            return $resultado;
        }

        //encuentran los boletos con un costo especifico
        function find_by_tipo($TIPO)
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT BOL_ID, BOL_NUMERO, BOL_FECHA, BOL_TIPO, PER_ID, VIJ_ID FROM boleto WHERE BOL_TIPO =" . $TIPO);
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array($TIPO));
            //aqui se obtiene una instancia de un array con objetos de la clase boleto
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "boleto");
            return $resultado;
        }

        //encuentran los boletos desde un costo especifico
        function find_by_per_id($PER_ID)
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT BOL_ID, BOL_NUMERO, BOL_FECHA, BOL_TIPO, PER_ID, VIJ_ID FROM boleto WHERE PER_ID =" . $PER_ID );
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array($PER_ID));
            //aqui se obtiene una instancia de un array con objetos de la clase boleto
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "boleto");
            return $resultado;
        }

         //encuentran los boletos desde un costo especifico
        function find_by_vij_id($VIJ_ID)
        {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            //a continuacion viene la consulta en este caso si recibe parametros
            $stmt = $conn->prepare("SELECT BOL_ID, BOL_NUMERO, BOL_FECHA, BOL_TIPO, PER_ID, VIJ_ID FROM boleto WHERE VIJ_ID <=" . $VIJ_ID);
            //aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
            $stmt->execute(array($VIJ_ID));
            //aqui se obtiene una instancia de un array con objetos de la clase boleto
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "boleto");
            return $resultado;
        }

      
        //insertar
        function insert_boleto($BOLETO){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("INSERT INTO `boleto`(`BOL_NUMERO`,`BOL_FECHA`,`BOL_TIPO`,`PER_ID`,`VIJ_ID`) VALUES (?,?,?,?,?)");
            try{
                $stmt->execute(array($BOLETO->BOL_NUMERO, $BOLETO->BOL_FECHA, $BOLETO->BOL_TIPO, $BOLETO->PER_ID, $BOLETO->VIJ_ID));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
        }

        //actualizar
        function update_boleto($BOLETO){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("UPDATE `boleto` SET `BOL_NUMERO`=?,`BOL_FECHA`=?,`BOL_TIPO`=?,`PER_ID`=?,`VIJ_ID`=? WHERE BOL_ID = ?");
            try{
            $stmt->execute(array($BOLETO->BOL_ID, $BOLETO->BOL_NUMERO, $BOLETO->BOL_FECHA, $BOLETO->BOL_TIPO, $BOLETO->PER_ID, $BOLETO->VIJ_ID));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
        }

         //eliminar
        function delete_boleto($BOLETO){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("DELETE FROM `boleto` WHERE BOL_ID = ?");
            try{
            $stmt->execute(array($BOLETO->BOL_ID));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
        }

    }

?> 