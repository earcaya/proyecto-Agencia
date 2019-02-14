<?php
    // clase base que representa una entidad de la tabla
    class Agencia {

        //aqui las variables deben de tener el mismo nombre de las columnas de la tabla
        public $AG_ID;
        public $AG_RIF;
        public $AG_NOMBRE;
        public $AG_DIRECCION;
        public $AG_TELEFONO;

        function set_all($AG_ID, $AG_RIF, $AG_NOMBRE, $AG_DIRECCION, $AG_TELEFONO)
        {
            $this->AG_ID = $AG_ID;
            $this->AG_RIF = $AG_RIF;
            $this->AG_NOMBRE = $AG_NOMBRE;
            $this->AG_DIRECCION = $AG_DIRECCION;
            $this->AG_TELEFONO = $AG_TELEFONO;
        }

        /**
         * @return mixed
         */
        public function getAGID()
        {
            return $this->AG_ID;
        }

        /**
         * @param mixed $AG_ID
         */
        public function setAGID($AG_ID)
        {
            $this->AG_ID = $AG_ID;
        }

        /**
         * @return mixed
         */
        public function getAGRIF()
        {
            return $this->AG_RIF;
        }

        /**
         * @param mixed $AG_RIF
         */
        public function setAGRIF($AG_RIF)
        {
            $this->AG_RIF = $AG_RIF;
        }

        /**
         * @return mixed
         */
        public function getAGNOMBRE()
        {
            return $this->AG_NOMBRE;
        }

        /**
         * @param mixed $AG_NOMBRE
         */
        public function setAGNOMBRE($AG_NOMBRE)
        {
            $this->AG_NOMBRE = $AG_NOMBRE;
        }

        /**
         * @return mixed
         */
        public function getAGDIRECCION()
        {
            return $this->AG_DIRECCION;
        }

        /**
         * @param mixed $AG_DIRECCION
         */
        public function setAGDIRECCION($AG_DIRECCION)
        {
            $this->AG_DIRECCION = $AG_DIRECCION;
        }

        /**
         * @return mixed
         */
        public function getAGTELEFONO()
        {
            return $this->AG_TELEFONO;
        }

        /**
         * @param mixed $AG_TELEFONO
         */
        public function setAGTELEFONO($AG_TELEFONO)
        {
            $this->AG_TELEFONO = $AG_TELEFONO;
        }
    }
?>