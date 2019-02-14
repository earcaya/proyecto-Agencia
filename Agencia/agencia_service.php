<?php
    require_once "agencia_repository.php";

    //clase que se encarga de realizar operaciones(si las hubiere) o ejecutar logica del negocia, en este caso
    //solo llama al repository por ahora
    class AgenciaService{

         //retorna todas las agencias de la tabla y retorna una lista
        function find_all()
        {
            $agenciarepository = new AgenciaRepository();
            return $agenciarepository->find_all();
        }

        //a partir de aqui los metodos se encargar de buscar dado un parametro en particular, todas las funciones
        //son similares

        //encuentra las agencias que tengan el id especificado
        function find_by_id($ID)
        {
            $agenciarepository = new AgenciaRepository();
            return $agenciarepository->find_by_id($ID);
        }

        //encuentra las agencias que tengan el rif especificado
        function find_by_rif($RIF)
        {
            $agenciarepository = new AgenciaRepository();
            return $agenciarepository->find_by_rif($RIF);
        }

        //encuentra las agencias que tengan el nombre especificado
        function find_by_nombre($NOMBRE)
        {
            $agenciarepository = new AgenciaRepository();
            return $agenciarepository->find_by_nombre($NOMBRE);
        }

        //encuentra las agencias que tengan la direccion especificada
        function find_by_direccion($DIRECCION)
        {
            $agenciarepository = new AgenciaRepository();
            return $agenciarepository->find_by_direccion($DIRECCION);
        }
		
		//insertar
        function insert_agencia($agencia){
            $agenciarepository = new AgenciaRepository();
            return $agenciarepository->insert_agencia($agencia);
        }

        //actualizar
        function update_agencia($agencia){
            $agenciarepository = new AgenciaRepository();
            return $agenciarepository->update_agencia($agencia);
        }

        //eliminar
        function delete_agencia($agencia){
            $agenciarepository = new AgenciaRepository();
            return $agenciarepository->delete_agencia($agencia);
        }
    }
?>