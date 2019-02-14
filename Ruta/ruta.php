<?php
	class Ruta {
		public $RUT_ID;
		public $RUT_PAI_ID_O;
		public $RUT_EST_ID_O;
		public $RUT_CIU_ID_O;
		public $LOC_ORIGEN;
		public $RUT_PAI_ID_D;
		public $RUT_EST_ID_D;
		public $RUT_CIU_ID_D;
		public $LOC_DESTINO;
		public $TRANS_ID;
		public $VIJ_ID;
		
		function set_all($RUT_ID, $RUT_PAI_ID_O, $RUT_EST_ID_O,  $RUT_CIU_ID_O, $LOC_ORIGEN, $RUT_PAI_ID_D, $RUT_EST_ID_D, $RUT_CIU_ID_D, $LOC_DESTINO, $TRANS_ID, $VIJ_ID) {
			$this->RUT_ID = $RUT_ID;
			$this->RUT_PAI_ID_O = $RUT_PAI_ID_O;
			$this->RUT_EST_ID_O = $RUT_EST_ID_O;
			$this->RUT_CIU_ID_O = $RUT_CIU_ID_O;
			$this->LOC_ORIGEN = $LOC_ORIGEN;
			$this->RUT_PAI_ID_D = $RUT_PAI_ID_D;
			$this->RUT_EST_ID_D = $RUT_EST_ID_D;
			$this->RUT_CIU_ID_D = $RUT_CIU_ID_D;
			$this->LOC_DESTINO = $LOC_DESTINO;
			$this->TRANS_ID = $TRANS_ID;
			$this->VIJ_ID = $VIJ_ID;
		}
		
		function getRUTID() {
			return ($this->TRANS_ID);
		}
		
		function setRUTID($RUT_ID) {
			$this->RUT_ID = $RUT_ID;
		}
		
		function getRUTPAIIDO(){
			return ($this->RUT_PAI_ID_O);
		}

		function SetRUTPAIIDO($RUT_PAI_ID_O){
			$this->RUT_PAI_ID_O = $RUT_PAI_ID_O;
		}

		function getRUTESTIDO(){
			return ($this->RUT_EST_ID_O);
		}

		function SetRUTESTIDO($RUT_EST_ID_O){
			$this->RUT_EST_ID_O = $RUT_EST_ID_O;
		}

		function getRUTCIUIDO(){
			return ($this->RUT_CIU_ID_O);
		}

		function SetRUTCIUIDO($RUT_CIU_ID_O){
			$this->RUT_CIU_ID_O = $RUT_CIU_ID_O;
		}

		function getLOCORIGEN(){
			return ($this->LOC_ORIGEN);
		}

		function SetLOCORIGEN($LOC_ORIGEN){
			$this->LOC_ORIGEN = $LOC_ORIGEN;
		}

		function getRUTPAIIDD(){
			return ($this->RUT_PAI_ID_D);
		}

		function SetRUTPAIIDD($RUT_PAI_ID_D){
			$this->RUT_PAI_ID_D = $RUT_PAI_ID_D;
		}

		function getRUTESTIDD(){
			return ($this->RUT_EST_ID_D);
		}

		function SetRUTESTIDD($RUT_EST_ID_D){
			$this->RUT_EST_ID_D = $RUT_EST_ID_D;
		}

		function getRUTCIUIDD(){
			return ($this->RUT_CIU_ID_D);
		}

		function SetRUTCIUIDD($RUT_CIU_ID_D){
			$this->RUT_CIU_ID_D = $RUT_CIU_ID_D;
		}

		function getLOCDESTINO(){
			return ($this->LOC_DESTINO);
		}

		function SetLOCDESTINO($LOC_DESTINO){
			$this->LOC_DESTINO = $LOC_DESTINO;
		}
		
		function getTRANSID() {
			return ($this->TRANS_ID);
		}
		
		function setTRANSID($TRANS_ID) {
			$this->TRANS_ID = $TRANS_ID;
		}
		
		function getVIJID() {
			return ($this->VIJ_ID);
		}
		
		function setVIJID() {
			$this->VIJ_ID = $VIJ_ID;
		}
	}
?>