<?php

    class Persona {

        public $PER_ID;
        public $PER_CEDULA;	
        public $PER_NOMBRES;	
        public $PER_APELLIDOS;	
        public $PER_EMAIL;	
        public $PER_FECHANAC;

        function set_all($PER_ID, $PER_CEDULA, $PER_NOMBRES, $PER_APELLIDOS, $PER_EMAIL, $PER_FECHANAC)
        {
            $this->PER_ID           = $PER_ID;
            $this->PER_CEDULA       = $PER_CEDULA;
            $this->PER_NOMBRES      = $PER_NOMBRES;
            $this->PER_APELLIDOS    = $PER_APELLIDOS;
            $this->PER_EMAIL        = $PER_EMAIL;
            $this->PER_FECHANAC     = $PER_FECHANAC;

        }

        /*-------------------------------------*/
        /**
         * @return mixed
         */
        public function getPERID ()
        {
            return $this->PER_ID ;
        }

         /**
         * @param mixed $PER_ID 
         */
        public function setPERID ($PER_ID )
        {
            $this->PER_ID  = $PER_ID ;
        }
        /*-------------------------------------*/
        /**
         * @return mixed
         */
        public function getPERCEDULA ()
        {
            return $this->PER_CEDULA ;
        }

         /**
         * @param mixed $PER_CEDULA 
         */
        public function setPERCEDULA ($PER_CEDULA )
        {
            $this->PER_CEDULA  = $PER_CEDULA ;
        }
        /*-------------------------------------*/
        /**
         * @return mixed
         */
        public function getPERNOMBRES ()
        {
            return $this->PER_NOMBRES ;
        }

         /**
         * @param mixed $PER_NOMBRES 
         */
        public function setPERNOMBRES ($PER_NOMBRES )
        {
            $this->PER_NOMBRES  = $PER_NOMBRES ;
        }
        /*-------------------------------------*/
        /**
         * @return mixed
         */
        public function getPERAPELLIDOS ()
        {
            return $this->PER_APELLIDOS ;
        }

         /**
         * @param mixed $PER_APELLIDOS 
         */
        public function setPERAPELLIDOS ($PER_APELLIDOS )
        {
            $this->PER_APELLIDOS  = $PER_APELLIDOS ;
        }
        /*-------------------------------------*/
        /**
         * @return mixed
         */
        public function getPEREMAIL ()
        {
            return $this->PER_EMAIL ;
        }

         /**
         * @param mixed $PER_EMAIL 
         */
        public function setPEREMIL ($PER_EMAIL )
        {
            $this->PER_EMAIL  = $PER_EMAIL ;
        }
        /*-------------------------------------*/
        /**
         * @return mixed
         */
        public function getPER_FECHANAC ()
        {
            return $this->PER_FECHANAC ;
        }

         /**
         * @param mixed $PER_FECHANAC 
         */
        public function setPER_FECHANAC ($PER_FECHANAC )
        {
            $this->PER_FECHANAC  = $PER_FECHANAC ;
        }
        /*-------------------------------------*/
    }


?>