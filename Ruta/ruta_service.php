<?php
	require_once "ruta_repository.php";
	
	class RutaService {
		
		function find_all()
        {
            $rutarepository = new RutaRepository();
            return $rutarepository->find_all();
        }
		
		function find_by_id($ID) {
			$rutarepository = new RutaRepository();
            return $rutarepository->find_by_id($ID);
		}
		
		function find_by_pais_origen($PAIS_O)
		{
			$rutarepository = new RutaRepository();
            return $rutarepository->find_by_origen($PAIS_O);
		}
		
		function find_by_pais_destino($PAIS_D)
		{
			$rutarepository = new RutaRepository();
            return $rutarepository->find_by_destino($PAIS_D);
		}
		
		//inserta un ruta
        function insert_ruta($ruta){
            $rutarepository = new RutaRepository();
            return $rutarepository->insert_ruta($ruta);
        }
		
		//actualizar un ruta
        function update_ruta($ruta){
            $rutarepository = new RutaRepository();
            return $rutarepository->update_ruta($ruta);
        }
		
		//eliminar un ruta
        function delete_ruta($ruta){
            $rutarepository = new RutaRepository();
            return $rutarepository->delete_ruta($ruta);
        }

        function rutas_by_agencia($AG_ID){
            $rutarepository = new RutaRepository();
            return $rutarepository->rutas_by_agencia($AG_ID);
        }
	}
?>