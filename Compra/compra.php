<?php
	// Class of the table 'compra'
	class Compra {
		// Attributes
		public $comID; // Primary Key
		public $perID;
		public $vijID;
		public $comTpago;
		public $comTcompra;

		// Methods setters and getters
		function setAll($comID, $perID, $vijID, $comTpago, $comTcompra) {
			$this->comID = $comID;
            $this->perID = $perID;
            $this->vijID = $vijID;
            $this->comTpago = $comTpago;
            $this->comTcompra = $comTcompra;
		}

		function setComID($comID) {
            $this->comID = $comID;
		}

		function setPerID($perID) {
            $this->perID = $perID;
		}

		function setVijID($vijID) {
            $this->vijID = $vijID;
		}

		function setComTpago($comTpago) {
            $this->comTpago = $comTpago;
		}

		function setComTcompra($comTcompra) {
            $this->comTcompra = $comTcompra;
		}

		function getComID() {
			return $this->comID;
		}

		function getPerID() { 
			return $this->perID;
		}

		function getVijID() { 
			return $this->vijID;
		}

		function getComTpago() { 
			return $this->comTpago;
		}

		function getComTcompra() { 
			return $this->comTcompra;
		}
	}
?>