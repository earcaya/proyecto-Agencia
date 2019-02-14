<?php
	
	require_once "viaje_repository.php";

	class viajeService
	{

		function find_all()
		{
			$viajes_repository = new viajesRepository();
			return $viajes_repository->find_all();
		}

		function find_all_costo_asc()
		{
			$viajes_repository = new viajesRepository();
			return $viajes_repository->find_all_costo_asc();
		}

		function find_all_costo_desc()
		{
			$viajes_repository = new viajesRepository();
			return $viajes_repository->find_all_costo_desc();
		}

		function find_by_id($ID)
		{
			$viajes_repository = new viajesRepository();
			return $viajes_repository->find_by_id($ID);
		}

		function find_by_fecha($FECHA)
		{
			$viajes_repository = new viajesRepository() ;
			return $viajes_repository->find_by_fecha($FECHA);
		}

		function find_by_tipo($TIPO)
		{
			$viajes_repository = new viajesRepository();
			return $viajes_repository->find_by_tipo($TIPO);
		}

		function find_by_costo($COSTO)
		{
			$viajes_repository = new viajesRepository();
			return $viajes_repository->find_by_costo($COSTO);
		}

		function find_since_costo($COSTO)
		{
			$viajes_repository = new viajesRepository();
			return $viajes_repository->find_since_costo($COSTO);
		}

		function find_until_costo($COSTO)
		{
			$viajes_repository = new viajesRepository();
			return $viajes_repository->find_until_costo($COSTO);
		}

		function find_by_agencia_ag_id($AGENCIA_AG_ID)
		{
			$viajes_repository = new viajesRepository();
			return $viajes_repository->find_by_agencia_ag_id($AGENCIA_AG_ID);
		}

		     //insertar
        function insert_viaje($VIAJE){
            $viajesrepository = new viajesRepository();
            return $viajesrepository->insert_viaje($VIAJE);
        }

        //actualizar
        function update_viaje($VIAJE){
            $viajesrepository = new viajesRepository();
            return $viajesrepository->update_viaje($VIAJE);
        }

        //eliminar
        function delete_viaje($VIAJE){
            $viajesrepository = new viajesRepository();
            return $viajesrepository->delete_viaje($VIAJE);
        }

	}


?>