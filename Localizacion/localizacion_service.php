<?php
    require_once "localizacion_repository.php";

    //clase que se encarga de realizar operaciones(si las hubiere) o ejecutar logica del negocio, en este caso
    //solo llama al repository por ahora
    class LocalizacionService{

         //retorna todos los Localizacions de la tabla y retorna una lista
        function find_all()
        {
            $localizacionrepository = new LocalizacionRepository();
            return $localizacionrepository->find_all();
        }

        //a partir de aqui los metodos se encargar de buscar dado un parametro en particular, todas las funciones
        //son similares

        //encuentra los Localizacions que tengan el id especificado
        function find_by_id($ID)
        {
            $localizacionrepository = new LocalizacionRepository();
            return $localizacionrepository->find_by_id($ID);
        }
		
		//insertar un Localizacion
        function insert_localizacion($localizacion){
            $localizacionrepository = new LocalizacionRepository();
            return $localizacionrepository->insert_localizacion($localizacion);
        }

        //actualizar un Localizacion
        function update_Localizacion($localizacion){
            $localizacionrepository = new LocalizacionRepository();
            return $localizacionrepository->update_Localizacion($localizacion);
        }

        //eliminar un Localizacion
        function delete_Localizacion($localizacion){
            $localizacionrepository = new LocalizacionRepository();
            return $localizacionrepository->delete_Localizacion($localizacion);
        }
    }
?>