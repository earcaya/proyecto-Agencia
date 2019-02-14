<?php

    class Administrador{

        public $ADM_ID;
        public $ADM_USUARIO;
        public $ADM_CLAVE;	
        public $PER_ID;	

        function set_all($ADM_ID, $USU_USUARIO, $ADM_CLAVE, $PER_ID)
        {
            $this->ADM_ID           = $ADM_ID;
            $this->USU_USUARIO      = $USU_USUARIO;
            $this->ADM_CLAVE        = $ADM_CLAVE;
            $this->PER_ID           = $PER_ID;
        }

        /*-------------------------------------*/
        /**
         * @return mixed
         */
        public function getADMID ()
        {
            return $this->ADM_ID ;
        }

         /**
         * @param mixed $ADM_ID 
         */
        public function seADMRID ($ADM_ID )
        {
            $this->ADM_ID  = $ADM_ID ;
        }
        /*-------------------------------------*/
        /**
         * @return mixed
         */
        public function getADMUUSUARIO ()
        {
            return $this->ADM_USUARIO ;
        }

         /**
         * @param mixed $ADM_USUARIO 
         */
        public function setADMUSUARIO ($ADM_USUARIO )
        {
            $this->ADM_USUARIO  = $ADM_USUARIO ;
        }
        /*-------------------------------------*/
        /**
         * @return mixed
         */
        public function getADMCLAVE ()
        {
            return $this->ADM_CLAVE ;
        }

         /**
         * @param mixed $ADM_CLAVE 
         */
        public function setADMCLAVE ($ADM_CLAVE )
        {
            $this->ADM_CLAVE  = $ADM_CLAVE ;
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
    }


?>