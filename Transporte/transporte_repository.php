<?php
	require_once "transporte.php";
    require_once "../Utilidades/conexion.php";
	
	class TransporteRepository {
		
		//Retorna todos los datos de la tabla Transporte.
		function find_all() {
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			$stmt = $conn->prepare("SELECT TRANS_ID, TRANS_PLACA, TRANS_TIPO, TRANS_PESO, TRANS_CAPACIDAD, TRANS_LINEA, AGENCIA_AG_ID, LOC_ID FROM transporte");
			$stmt->execute();
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Transporte");
			return $resultado;
		}
		
		//a partir de aqui los metodos se encargar de buscar dado un parametro en particular, todas las funciones
		//son similares

		//encuentra los transportes que tengan el id especificado
		function find_by_id($ID)
		{
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			//a continuacion viene la consulta en este caso si recibe parametros
			$stmt = $conn->prepare("SELECT TRANS_ID, TRANS_PLACA, TRANS_TIPO, TRANS_PESO, TRANS_CAPACIDAD, TRANS_LINEA, AGENCIA_AG_ID, LOC_ID FROM transporte WHERE TRANS_ID =" . $ID);
			//aqui van los parametros de la consulta, que es lo que reemplaza los simbolos de interrogacion en ese orden
			$stmt->execute(array($ID));
			//aqui se obtiene una instancia de un array con objetos de la clase TRANSencia
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Transporte");
			return $resultado;
		}
		
		//encuentra los transportes que tengan el id especificado
		function find_by_placa($PLACA)
		{
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			$stmt = $conn->prepare("SELECT TRANS_ID, TRANS_PLACA, TRANS_TIPO, TRANS_PESO, TRANS_CAPACIDAD, TRANS_LINEA, AGENCIA_AG_ID, LOC_ID FROM transporte WHERE TRANS_PLACA = ?");
			echo "PLACA: " . $PLACA;
			$stmt->execute(array($PLACA));
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Transporte");
			return $resultado;
		}

		//encuentra los transportes por el tipo especificado
		function find_by_tipo($TIPO)
		{
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			$stmt = $conn->prepare("SELECT TRANS_ID, TRANS_PLACA, TRANS_TIPO, TRANS_PESO, TRANS_CAPACIDAD, TRANS_LINEA, AGENCIA_AG_ID, LOC_ID FROM transporte WHERE TRANS_TIPO = ?");
			echo "TIPO: " . $TIPO;
			$stmt->execute(array($TIPO));
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Transporte");
			return $resultado;
		}

		//encuentra los transportes por el peso especificado
		function find_by_peso($PESO)
		{
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			$stmt = $conn->prepare("SELECT TRANS_ID, TRANS_PLACA, TRANS_TIPO, TRANS_PESO, TRANS_CAPACIDAD, TRANS_LINEA, AGENCIA_AG_ID, LOC_ID FROM transporte WHERE TRANS_PESO = ?");
			$stmt->execute(array($PESO));
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Transporte");
			return $resultado;
		}

		//encuentra los transportes por la capacidad especificada
		function find_by_capacidad($CAPACIDAD)
		{
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			$stmt = $conn->prepare("SELECT TRANS_ID, TRANS_PLACA, TRANS_TIPO, TRANS_PESO, TRANS_CAPACIDAD, TRANS_LINEA, AGENCIA_AG_ID, LOC_ID FROM transporte WHERE TRANS_CAPACIDAD = ?");
			$stmt->execute(array($CAPACIDAD));
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Transporte");
			return $resultado;
		}

		//encuentra los transportes por agencia que se especifique
		function find_by_agencia_id($AGENCIA_ID)
		{
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			$stmt = $conn->prepare("SELECT TRANS_ID, TRANS_PLACA, TRANS_TIPO, TRANS_PESO, TRANS_CAPACIDAD, TRANS_LINEA, AGENCIA_AG_ID, LOC_ID FROM transporte WHERE AGENCIA_AG_ID = ?");
			$stmt->execute(array($AGENCIA_ID));
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Transporte");
			return $resultado;
		}
		
		//encuentra los transportes por localizacion especificada.
		function find_by_localizacion($LOC_ID)
		{
			$conexion = new Conexion();
			$conn = $conexion->conectar();
			$stmt = $conn->prepare("SELECT TRANS_ID, TRANS_PLACA, TRANS_TIPO, TRANS_PESO, TRANS_CAPACIDAD, TRANS_LINEA, AGENCIA_AG_ID, LOC_ID FROM transporte WHERE LOC_ID = ?");
			$stmt->execute(array($LOC_ID));
			$resultado = $stmt->fetchAll(PDO::FETCH_CLASS, "Transporte");
			return $resultado;
		}
		
		//inserta un transporte
        function insert_transporte($transporte){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("INSERT INTO `transporte`(`TRANS_PLACA`, `TRANS_TIPO`, `TRANS_PESO`, `TRANS_CAPACIDAD`, `TRANS_LINEA`, `AGENCIA_AG_ID`, `LOC_ID`) VALUES (?, ?, ?, ?, ?, ?, ?)");
            try{
                //$stmt->execute(array($transporte->TRANS_PLACA, $transporte->TRANS_TIPO, $transporte->TRANS_PESO, $transporte->TRANS_CAPACIDAD, $transporte->TRANS_LINEA, $transporte->AGENCIA_AG_ID, $transporte->LOC_ID));
                $stmt->execute(array("placa", $transporte->tipo, "peso", $transporte->capacidad, $transporte->linea, $transporte->id_agencia, $transporte->id));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
        }
		
		//actualizar un transporte
        function update_transporte($transporte){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("UPDATE `transporte` SET `TRANS_PLACA`=?, `TRANS_TIPO`=?,`TRANS_PESO`=?,`TRANS_CAPACIDAD`=?, `TRANS_LINEA`=?,`AGENCIA_AG_ID`=?,`LOC_ID`=? WHERE TRANS_ID = ?");
            try{
            $stmt->execute(array($transporte->TRANS_PLACA, $transporte->TRANS_TIPO, $transporte->TRANS_PESO, $transporte->TRANS_CAPACIDAD, $TRANS_LINEA->TRANS_LINEA,$transporte->AGENCIA_AG_ID, $transporte->LOC_ID, $transporte->TRANS_ID));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
        }
		
		//eliminar un transporte
        function delete_transporte($transporte){
            $conexion = new Conexion();
            $conn = $conexion->conectar();
            $stmt = $conn->prepare("DELETE FROM `transporte` WHERE TRANS_ID = ?");
            try{
            $stmt->execute(array($transporte->TRANS_ID));
            }catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
                return false;
            }
            return true;
        }
	}
?>