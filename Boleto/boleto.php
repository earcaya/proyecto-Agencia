<?php
	
	class boleto
	{
		public $BOL_ID;
		public $BOL_NUMERO;
		public $BOL_FECHA;
		public $BOL_TIPO;
		public $PER_ID;
		public $VIJ_ID;
	

		function set_all($BOL_ID, $BOL_NUMERO, $BOL_FECHA, $BOL_TIPO, $PER_ID, $VIJ_ID)
		{
			$this->BOL_ID = $BOL_ID;
			$this->BOL_NUMERO = $BOL_NUMERO;
			$this->BOL_FECHA = $BOL_FECHA;
			$this->BOL_TIPO = $BOL_TIPO;
			$this->PER_ID = $PER_ID;
			$this->VIJ_ID = $VIJ_ID;
		}

		/// funciones gets

		public function getBOLID()
		{
			return $this->BOL_ID;
		}

		public function getBOLNUMERO()
		{
			return $this->BOL_NUMERO;
		}

		public function getBOLFECHA()
		{
			return $this->BOL_FECHA;
		}

		public function getBOLTIPO()
		{
			return $this->BOL_TIPO;
		}

		public function getPERID()
		{
			return $this->PER_ID;
		}

		public function getVIJID()
		{
			return $this->VIJ_ID;
		}


		/// Funcioes Sets

		public function setBOLID($BOL_ID)
		{
			$this->BOL_ID = $BOL_ID;
		}

		public function setBOLNUMERO($BOL_NUMERO)
		{
			$this->BOL_NUMERO = $BOL_NUMERO;
		}

		public function setBOLFECHA($BOL_FECHA)
		{
			$this->BOL_FECHA = $BOL_FECHA;
		}

		public function setBOLTIPO($BOL_TIPO)
		{
			$this->BOL_TIPO = $BOL_TIPO;
		}

		public function setPERID($PER_ID)
		{
			$this->PER_ID = $PER_ID;
		}

		public function setVIJID($VIJ_ID)
		{
			$this->VIJ_ID = $VIJ_ID;
		}

	}
?>