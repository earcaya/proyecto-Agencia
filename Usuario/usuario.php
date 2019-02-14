<?php

    class Usuario{

        public $USU_ID;
        public $USU_USUARIO;
        public $USU_CLAVE;	
        public $PER_ID;	

        function set_all($USU_ID, $USU_USUARIO, $USU_CLAVE, $PER_ID)
        {
            $this->USU_ID           = $USU_ID;
            $this->USU_USUARIO      = $USU_USUARIO;
            $this->USU_CLAVE        = $USU_CLAVE;
            $this->PER_ID           = $PER_ID;


        }

        /*-------------------------------------*/
        /**
         * @return mixed
         */
        public function getUSUID ()
        {
            return $this->USU_ID ;
        }

         /**
         * @param mixed $USU_ID 
         */
        public function seUSURID ($USU_ID )
        {
            $this->USU_ID  = $USU_ID ;
        }
        /*-------------------------------------*/
        /**
         * @return mixed
         */
        public function getUSUUSUARIO ()
        {
            return $this->USU_USUARIO ;
        }

         /**
         * @param mixed $USU_USUARIO 
         */
        public function setUSUUSUARIO ($USU_USUARIO )
        {
            $this->USU_USUARIO  = $USU_USUARIO ;
        }
        /*-------------------------------------*/
        /**
         * @return mixed
         */
        public function getUSUCLAVE ()
        {
            return $this->USU_CLAVE ;
        }

         /**
         * @param mixed $USU_CLAVE 
         */
        public function setUSUCLAVE ($USU_CLAVE )
        {
            $this->USU_CLAVE  = $USU_CLAVE ;
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