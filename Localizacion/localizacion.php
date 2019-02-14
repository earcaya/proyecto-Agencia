<?php
	class Localizacion {
		public $LOC_ID;
		public $LOC_DESC;
		public $LOC_LAT;
		public $LOC_LONG;
		
		function set_all($LOC_ID, $LOC_DESC, $LOC_LAT, $LOC_LONG){
			$this->LOC_ID = $LOC_ID;
			$this->LOC_DESC = $LOC_DESC;
			$this->LOC_LAT = $LOC_LAT;
			$this->LOC_LONG = $LOC_LONG;
		}
		
		function get_LOCID(){
			return ($this->LOC_ID);
		}
		
		function set_LOCID($LOC_ID){
			$this->LOC_ID = $LOC_ID;
		}
		
		function get_LOCDESC(){
			return ($this->LOC_DESC);
		}
		
		function set_LOCDESC($LOC_DESC){
			$this->LOC_DESC = $LOC_DESC;
		}
		
		function get_LOCLAT(){
			return ($this->LOC_LAT);
		}
		
		function set_LOCLAT($LOC_LAT){
			$this->LOC_LAT = $LOC_LAT;
		}
		
		function get_LOCLONG(){
			return ($this->LOC_LONG);
		}
		
		function set_LOCLONG($LOC_LONG){
			$this->LOC_LONG = $LOC_LONG;
		}
	}
?>