<?php
	require_once "compra.php";
	require_once "conexion.php";

	// Define methods of search and modifications of the class 'compra'
	class CompraRepository {
		
		// Search all elements 
		function findAll() {
			$conex = new Conexion();
			$conn = $conex->conectar();
			$stmt = $conn->prepare("SELECT * FROM compra");
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, "Compra");
			return $result;
		}

		// Search for ID
		function findID($id) {
			$conex = new Conexion();
			$conn = $conex->conectar();
			$stmt = $conn->prepare("SELECT * FROM compra WHERE COM_ID =" . $id);
			$stmt->execute(array($id));
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, "Compra");
			return $result;
		}

		// Search for PER_ID
		function findPerID($perID) {
			$conex = new Conexion();
			$conn = $conex->conectar();
			$stmt = $conn->prepare("SELECT * FROM compra WHERE PER_ID =" . $perID);
			$stmt->execute(array($perID));
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, "Compra");
			return $result;
		}

		// Search for VIJ_ID
		function findVijID($vijID) {
			$conex = new Conexion();
			$conn = $conex->conectar();
			$stmt = $conn->prepare("SELECT * FROM compra WHERE VIJ_ID =" . $vijID);
			$stmt->execute(array($vijID));
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, "Compra");
			return $result;
		}

		// Search for COM_TPAGO
		function findComTpago($comTpago) {
			$conex = new Conexion();
			$conn = $conex->conectar();
			$stmt = $conn->prepare("SELECT * FROM compra WHERE COM_TPAGO =" . $comTpago);
			$stmt->execute(array($comTpago));
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, "Compra");
			return $result;
		}

		// Search for COM_TCOMPRA
		function findComTcompra($comTcompra) {
			$conex = new Conexion();
			$conn = $conex->conectar();
			$stmt = $conn->prepare("SELECT * FROM compra WHERE COM_TCOMPRA =" . $comTcompra);
			$stmt->execute(array($comTcompra));
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, "Compra");
			return $result;
		}

		// Insert one new element type compra
	  function insert($compra) {
      $conex = new Conexion();
      $conn = $conex->conectar();
      $stmt = $conn->prepare("INSERT INTO `compra` (`PER_ID`, `VIJ_ID`, `COM_TPAGO`, `COM_TCOMPRA`) VALUES (?,?,?,?)");
      try {
          $stmt->execute(array($compra->perID, $compra->vijID, $compra->comTpago, $compra->comTcompra));
      } catch(PDOException $e) {
          return false;
      }
      return true;
    }

    // Update one element 
    function update($compra) {
      $conex = new Conexion();
      $conn = $conex->conectar();
      $stmt = $conn->prepare("UPDATE `compra` SET `PER_ID`=?, `VIJ_ID`=?, `COM_TPAGO`=?, `COM_TCOMPRA`=? WHERE COM_ID = ?");
      try {
     		$stmt->execute(array($compra->perID, $compra->vijID, $compra->comTpago, $compra->comTcompra, $compra->comID));
      } catch(PDOException $e) {
          return false;
      }
      return true;
    }
		
		// Delete one element
    function delete($compra) {
      $conex = new Conexion();
      $conn = $conex->conectar();
      $stmt = $conn->prepare("DELETE FROM `compra` WHERE COM_ID = ?");
      try {
      	$stmt->execute(array($compra->comID));
      } catch(PDOException $e){//aqui cae si sucede un error a nivel de base de datos
          return false;
      }
      return true;
    }

	}
?>