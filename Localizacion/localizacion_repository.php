<?php
	require_once "localizacion.php";
    require_once "../Utilidades/conexion.php";
	
	class LocalizacionRepository {
		
		//Retorna todos los datos de la tabla Localizacion.
		function find_all() {
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			$stmt = $conn->prepare("SELECT LOC_ID, LOC_DESC, LOC_LAT, LOC_LONG FROM localizacion");
			$stmt->execute();
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Localizacion");
			return $resultado;
		}
		
		//a partir de aqui los metodos se encargar de buscar dado un parametro en particular, todas las funciones
		//son similares

		//encuentra las localizaciones por id.
		function find_by_id($ID)
		{
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			//a continuacion viene la consulta en este caso si recibe parametros
			$stmt = $conn->prepare("SELECT LOC_ID, LOC_DESC, LOC_LAT, LOC_LONG FROM localizacion WHERE LOC_ID =" . $ID);
			//aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
			$stmt->execute(array($ID));
			//aqui se obtiene una instancia de un array con objetos de la clase TRANSencia
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Localizacion");
			return $resultado;
		}
		
		//inserta una localizacion
        function insert_localizacion($localizacion){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("INSERT INTO `localizacion`(`LOC_DESC`, `LOC_LAT`, `LOC_LONG`) VALUES (?,?,?)");
            try{
                $stmt->execute(array($localizacion->LOC_DESC, $localizacion->LOC_LAT, $localizacion->LOC_LONG));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
        }
		
		//actualizar un Localizacion
        function update_Localizacion($localizacion){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("UPDATE `localizacion` SET `LOC_DESC`=?,`LOC_LAT`=?,`LOC_LONG`=? WHERE LOC_ID = ?");
            try{
            $stmt->execute(array($localizacion->LOC_DESC, $localizacion->LOC_LAT, $localizacion->LOC_LONG, $localizacion->LOC_ID));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
        }
		
		//eliminar un Localizacion
        function delete_Localizacion($localizacion){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("DELETE FROM `Localizacion` WHERE LOC_ID = ?");
            try{
            $stmt->execute(array($localizacion->LOC_ID));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
        }
	}
?>