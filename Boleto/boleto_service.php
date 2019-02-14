<?php
	
	require_once "boleto_repository.php";

	class boletoService
	{

		function find_all()
		{
			$boleto_repository = new boletoRepository();
			return $boleto_repository->find_all();
		}

		function find_by_id($ID)
		{
			$boleto_repository = new boletoRepository();
			return $boleto_repository->find_by_id($ID);
		}
		
		function find_by_numero($NUMERO)
		{
			$boleto_repository = new boletoRepository() ;
			return $boleto_repository->find_by_numero($NUMERO);
		}

		function find_by_fecha($FECHA)
		{
			$boleto_repository = new boletoRepository();
			return $boleto_repository->find_by_fecha($FECHA);
		}

		function find_by_tipo($TIPO)
		{
			$boleto_repository = new boletoRepository();
			return $boleto_repository->find_by_tipo($TIPO);
		}

		function find_by_per_id($PER_ID)
		{
			$boleto_repository = new boletoRepository();
			return $boleto_repository->find_by_per_id($PER_ID);
		}

		function find_by_vij_id($VIJ_ID)
		{
			$boleto_repository = new boletoRepository();
			return $boleto_repository->find_by_vij_id($VIJ_ID);
		}

		
		     //insertar
        function insert_boleto($boleto){
            $boletorepository = new boletoRepository();
            return $boletorepository->insert_boleto($boleto);
        }

        //actualizar
        function update_boleto($boleto){
            $boletorepository = new boletoRepository();
            return $boletorepository->update_boleto($boleto);
        }

        //eliminar
        function delete_boleto($boleto){
            $boletorepository = new boletoRepository();
            return $boletorepository->delete_boleto($boleto);
        }

	}


?>