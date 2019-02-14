<?php
	class Transporte {
		public $TRANS_ID;
		public $TRANS_PLACA;
		public $TRANS_TIPO;
		public $TRANS_PESO;
		public $TRANS_CAPACIDAD;
		public $TRANS_LINEA;
		public $AGENCIA_AG_ID;
		public $LOC_ID;
		
		function set_all($TRANS_ID, $TRANS_PLACA, $TRANS_TIPO, $TRANS_PESO, $TRANS_CAPACIDAD, $TRANS_LINEA, $AGENCIA_AG_ID, $LOC_ID)
        {
			$this->TRANS_ID = $TRANS_ID;
            $this->TRANS_PLACA = $TRANS_PLACA;
            $this->TRANS_TIPO = $TRANS_TIPO;
            $this->TRANS_PESO = $TRANS_PESO;
			$this->TRANS_CAPACIDAD = $TRANS_CAPACIDAD;
			$this->TRANS_LINEA = $TRANS_LINEA;
			$this->AGENCIA_AG_ID = $AGENCIA_AG_ID;
			$this->LOC_ID = $LOC_ID;
        }
		
		public function getTRANSID() {
            return ($this->TRANS_ID);
        }
		
		public function setTRANSID($TRANS_ID) {
            $this->TRANS_ID = $TRANS_ID;
        }
		
		public function getTRANSPLACA() {
            return ($this->TRANS_PLACA);
        }
		
		public function setTRANSPLACA($TRANS_PLACA) {
            $this->TRANS_PLACA = $TRANS_PLACA;
        }
		
		public function getTRANSTIPO() {
			return ($this->TRANS_TIPO);
		}
		
		public function setTRANSTIPO($TRANS_TIPO) {
			$this->TRANS_TIPO = $TRANS_TIPO;
		}
		
		public function getTRANSPESO() {
			return ($this->TRANS_PESO);
		}
		
		public function setTRANSPESO($TRANS_PESO) {
			$this->TRANS_PESO = $TRANS_PESO;
		}
		
		public function getTRANSCAPACIDAD() {
			return ($this->TRANS_CAPACIDAD);
		}
		
		public function setTRANSCAPACIDAD($TRANS_CAPACIDAD) {
			$this->TRANS_CAPACIDAD = $TRANS_CAPACIDAD;
		}

		public function getTRANSLINEA() {
			return ($this->TRANS_LINEA);
		}

		public function setTRANSLINEA($TRANS_LINEA) {
			$this->TRANS_LINEA = $TRANS_LINEA;
		}
		
		public function getAGENCIAAGID() {
			return ($this->AGENCIA_AG_ID);
		}
		
		public function setAGENCIAAGID($AGENCIA_AG_ID) {
			$this->AGENCIA_AG_ID = $AGENCIA_AG_ID;
		}

		public function getLOCID() {
			return ($this->LOC_ID);
		}

		public function setLOCID($LOC_ID) {
			$this->LOC_ID = $LOC_ID;
		}
	}

?>