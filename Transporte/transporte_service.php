<?php
    require_once "transporte_repository.php";

    //clase que se encarga de realizar operaciones(si las hubiere) o ejecutar logica del negocio, en este caso
    //solo llama al repository por ahora
    class TransporteService{

         //retorna todos los transportes de la tabla y retorna una lista
        function find_all()
        {
            $transporterepository = new TransporteRepository();
            return $transporterepository->find_all();
        }

        //a partir de aqui los metodos se encargar de buscar dado un parametro en particular, todas las funciones
        //son similares

        //encuentra los transportes que tengan el id especificado
        function find_by_id($ID)
        {
            $transporterepository = new TransporteRepository();
            return $transporterepository->find_by_id($ID);
        }
		
		function find_by_placa($PLACA)
        {
            $transporterepository = new TransporteRepository();
            return $transporterepository->find_by_id($PLACA);
        }

        //encuentra los transportes que tengan el tipo especificado
        function find_by_tipo($TIPO)
        {
            $transporterepository = new TransporteRepository();
            return $transporterepository->find_by_tipo($TIPO);
        }

        //encuentra los transportes que tengan el peso especificado
        function find_by_peso($PESO)
        {
            $transporterepository = new TransporteRepository();
            return $transporterepository->find_by_peso($PESO);
        }

        //encuentra los transportes que tengan la capacidad especificada
        function find_by_capacidad($CAPACIDAD)
        {
            $transporterepository = new TransporteRepository();
            return $transporterepository->find_by_capacidad($CAPACIDAD);
        }

        //encuentra los transportes que tengan la agencia especificado
        function find_by_agencia_id($AGENCIA_ID)
        {
            $transporterepository = new TransporteRepository();
            return $transporterepository->find_by_agencia_id($AGENCIA_ID);
        }
		
		function find_by_localizacion($LOC_ID)
		{
			$transporterepository = new TransporteRepository();
			return $transporterepository->find_by_localizacion($LOC_ID);
		}
		
		//insertar un transporte
        function insert_transporte($transporte){
            $transporterepository = new TransporteRepository();
            return $transporterepository->insert_transporte($transporte);
        }

        //actualizar un transporte
        function update_transporte($transporte){
            $transporterepository = new TransporteRepository();
            return $transporterepository->update_transporte($transporte);
        }

        //eliminar un transporte
        function delete_transporte($transporte){
            $transporterepository = new TransporteRepository();
            return $transporterepository->delete_transporte($transporte);
        }
    }
?>