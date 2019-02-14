<?php
	
	class viaje
	{
		public $VIJ_ID;
		public $VIJ_FECHA;
		public $VIJ_TIPO;
		public $VIJ_COSTO;
		public $AGENCIA_AG_ID;
	

		function set_all($VIJ_ID, $VIJ_FECHA, $VIJ_TIPO, $VIJ_COSTO, $AGENCIA_AG_ID)
		{
			$this->VIJ_ID = $VIJ_ID;
			$this->VIJ_FECHA = $VIJ_FECHA;
			$this->VIJ_TIPO = $VIJ_TIPO;
			$this->VIJ_COSTO = $VIJ_COSTO;
			$this->AGENCIA_AG_ID = $AGENCIA_AG_ID;
		}

		/// funciones gets

		public function getVIJID()
		{
			return $this->VIJ_ID;
		}

		public function getVIJFECHA()
		{
			return $this->VIJ_FECHA;
		}

		public function getVIJTIPO()
		{
			return $this->VIJ_TIPO;
		}

		public function getVIJCOSTO()
		{
			return $this->VIJ_COSTO;
		}

		public function getAGENCIA()
		{
			return $this->AGENCIA_AG_ID;
		}

		/// Funcioes Sets

		public function setVIJID($VIJ_ID)
		{
			$this->VIJ_ID = $VIJ_ID;
		}

		public function setVIJFECHA($VIJ_FECHA)
		{
			$this->VIJ_FECHA = $VIJ_FECHA;
		}

		public function setVIJTIPO($VIJ_TIPO)
		{
			$this->VIJ_TIPO = $VIJ_TIPO;
		}

		public function setVIJCOSTO($VIJ_COSTO)
		{
			$this->VIJ_COSTO = $VIJ_COSTO;
		}

		public function setAGENCIA($AGENCIA_AG_ID)
		{
			$this->AGENCIA_AG_ID = $AGENCIA_AG_ID;
		}

	}
?>