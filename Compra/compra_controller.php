<?php
	// Luis Colmenarez
	require_once "compra_service.php";

	// Call method send for GET
	if(function_exists($_POST['function']))
		$_POST['function']();
	
	// Search all elements
	function findAll() {
		return json_encode(new CompraService()->findAll());
	}

	// Search for COM_ID
	function findID() {
		$solic = json_decode($_POST['DATA']);
		return json_encode(new CompraService()->findID($solic->comID));
	}

	// Search for PER_ID
	function findPerID() {
		$solic = json_decode($_POST['DATA']);
		return json_encode(new CompraService()->findPerID($solic->perID));
	}

	// Search for VIJ_ID
	function findVijID() {
		$solic = json_decode($_POST['DATA']);
		return json_encode(new CompraService()->findVijID($solic->vijID));
	}

	// Search for COM_TPAGO
	function findComTpago() {
		$solic = json_decode($_POST['DATA']);
		return json_encode(new CompraService()->findComTpago($solic->comTpago));
	}

	// Search for COM_TCOMPRA
	function findComTcompra() {
		$solic = json_decode($_POST['DATA']);
		return json_encode(new CompraService()->findComTcompra($solic->comTcompra));
	}

	// Insert one new element
	function insert() {
		$solic = json_decode($_POST['DATA']);
		$service = new CompraService();
		if($service->insert($solic))
			http_response_code();
		else
			http_response_code(500);
	}

	// Update one element 
	function update() {
		$solic = json_decode($_POST['DATA']);
		$service = new CompraService();
		if($service->update($solic))
			http_response_code();
		else
			http_response_code(500);
	}

	// Delete one element
	function delete() {
		$solic = json_decode($_POST['DATA']);
		$service = new CompraService();
		if($service->delete($solic))
			http_response_code();
		else
			http_response_code(500);
	}
?>