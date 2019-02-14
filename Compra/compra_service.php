<?php
	require_once "compra_repository.php";

	class CompraService {

		// Search all elements 
		function findAll() {
			return new CompraRepository()->findAll();
		}

		// Search for ID
		function findID($id) {
			return new CompraRepository()->findID($id);
		}

		// Search for PER_ID
		function findPerID($perID) {
			return new CompraRepository()->findPerID($perID);
		}

		// Search for VIJ_ID
		function findVijID($vijID) {
			return new CompraRepository()->findVijID($vijID);
		}

		// Search for COM_TPAGO
		function findComTpago($comTpago) {
			return new CompraRepository()->findComTpago($comTpago);
		}

		// Search for COM_TCOMPRA
		function findComTcompra($comTcompra) {
			return new CompraRepository()->findComTcompra($comTcompra);
		}

		// Insert one new element
		function insert($compra) {
			return new CompraRepository()->insert($compra);
		}

		// Update one element 
		function update($compra) {
			return new CompraRepository()->update($compra);
		}

		// Delete one element
		function delete($compra) {
			return new CompraRepository()->delete($compra);
		}
	}
?>