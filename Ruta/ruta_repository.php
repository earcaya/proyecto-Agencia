<?php
require_once "../Utilidades/conexion.php";
	require_once "ruta.php";
	
	class RutaRepository {
		
		function find_all() {
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			$stmt = $conn->prepare("SELECT RUT_ID, RUT_PAI_ID_O, RUT_EST_ID_O, RUT_CIU_O, RUT_PAI_ID_D, RUT_EST_ID_D, RUT_CIU_ID_D, TRANS_ID FROM ruta");
			$stmt->execute();
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Ruta");
			return $resultado;
		}
		
		function find_by_id($ID)
		{
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			//a continuacion viene la consulta en este caso si recibe parametros
			$stmt = $conn->prepare("SELECT RUT_ID, RUT_PAI_ID_O, RUT_EST_ID_O, RUT_CIU_O, RUT_PAI_ID_D, RUT_EST_ID_D, RUT_CIU_ID_D, TRANS_ID FROM ruta WHERE RUT_ID =" . $ID);
			//aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
			$stmt->execute(array($ID));
			//aqui se obtiene una instancia de un array con objetos de la clase TRANSencia
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Ruta");
			return $resultado;
		}
		
		function find_by_pais_origen($PAIS_O)
		{
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			$stmt = $conn->prepare("SELECT RUT_ID, RUT_PAI_ID_O, RUT_EST_ID_O, RUT_CIU_O, RUT_PAI_ID_D, RUT_EST_ID_D, RUT_CIU_ID_D, TRANS_ID FROM ruta WHERE RUT_PAI_ID_O = ?");
			$stmt->execute(array($PAIS_O));
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Ruta");
			return $resultado;
		}
		
		function find_by_pais_destino($PAIS_D)
		{
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			$stmt = $conn->prepare("SELECT RUT_ID, RUT_PAI_ID_O, RUT_EST_ID_O, RUT_CIU_O, RUT_PAI_ID_D, RUT_EST_ID_D, RUT_CIU_ID_D, TRANS_ID FROM ruta WHERE RUT_PAI_ID_D = ?");
			$stmt->execute(array($PAIS_D));
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Ruta");
			return $resultado;
		}
		
		//inserta un ruta
        function insert_ruta($ruta){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("INSERT INTO `ruta`(`RUT_PAI_ID_O`, `RUT_EST_ID_O`, `RUT_CIU_ID_O`, `RUT_PAI_ID_D`, `RUT_EST_ID_D`, `RUT_CIU_ID_D`, `TRANS_ID`) VALUES (?, ?, ?, ?, ?, ?, ?)");
            try{
//                $stmt->execute(array($ruta->RUT_PAI_ID_O, $ruta->RUT_EST_ID_O, $ruta->RUT_CIU_ID_O, $ruta->RUT_PAI_ID_D, $ruta->RUT_EST_ID_D, $ruta->RUT_CIU_ID_D, $ruta->TRANS_ID));
                $stmt->execute(array($ruta->pais_origen, $ruta->estado_origen, $ruta->ciudad_origen, $ruta->pais_destino, $ruta->estado_destino, $ruta->ciudad_destino, $ruta->id));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
        }
		
		//actualizar un ruta
        function update_ruta($ruta){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("UPDATE `ruta` SET `RUT_PAI_ID_O`=?,`RUT_EST_ID_O`=?,`RUT_CIU_ID_O`=?,`RUT_PAI_ID_D`=?,`RUT_EST_ID_D`=?,`RUT_CIU_ID_D`=?,`TRANS_ID`=?,`VIJ_ID`=? WHERE RUT_ID = ?");
            try{
                $stmt->execute(array($ruta->RUT_PAI_ID_O, $ruta->RUT_EST_ID_O, $ruta->RUT_CIU_ID_O, $ruta->RUT_PAI_ID_D, $ruta->RUT_EST_ID_D, $ruta->RUT_CIU_ID_D, $ruta->TRANS_ID, $ruta->VIJ_ID, $ruta->RUT_ID));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
        }
		
		//eliminar un ruta
        function delete_ruta($ruta){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("DELETE FROM `ruta` WHERE RUT_ID = ?");
            try{
            $stmt->execute(array($ruta->RUT_ID));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
		}
		
		function rutas_by_agencia($AG_ID){
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			$stmt = $conn->prepare("SELECT AG_ID, AG_NOMBRE, RUT.RUT_PAI_ID_O, RUT.RUT_EST_ID_O, RUT.RUT_CIU_ID_O, RUT.RUT_PAI_ID_D, RUT.RUT_EST_ID_D, RUT.RUT_CIU_ID_D FROM agencia INNER JOIN viaje AS VIJ ON (VIJ.AGENCIA_AG_ID = AG_ID) INNER JOIN RUTA AS RUT ON (RUT.RUT_ID = VIJ.RUT_ID) WHERE AG_ID = ?");
			$stmt->execute(array($AG_ID));
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Ruta");
			return $resultado;
		}
	}
?>