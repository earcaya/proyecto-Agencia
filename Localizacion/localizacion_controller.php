<?php
    require_once "localizacion_service.php";

    //el metodo a llamar se obtiene por get, es el unico parametro a ser enviado por get, los datos se envian por post
    //ejemplo: http://localhost/PROYECTO-WEB/Localizacion_controller.php?f=find_all
    //la parte luego del = es el nombre de la funcion
    if(function_exists($_POST['f'])){
        $_POST['f']();
//		insert_localizacion();//reemplacen esto dependiendo de la funcion que deseen llamar, dejen la linea de arriba que esa es la que funciona en el mundo real
    }
	
	//Listar todos los Localizacions.
    function find_all()
    {
        $localizacionservice = new LocalizacionService();
        echo json_encode($localizacionservice->find_all());
    }

    //a partir de aqui los metodos se encargar de buscar dado un parametro en particular, todas las funciones
    //son similares

    //encuentra las Localizacions que tengan el id especificado
    function find_by_id()
    {
        //aqui deberia de recibir un json con el objeto para replicarlo en todos los endpoints, los datos viene por post
        //$solicitud = json_decode($_POST['DATOS']);//dejar esta linea
		$solicitud = json_decode("{\"LOC_ID\":\"1\",\"LOC_DESC\":\"Esta en camino\",\"LOC_LAT\":\"10000\",\"LOC_LONG\":\"18524\"}");
		//esta linea emula lo que hace la de arriba, el json que tiene es el que deberia de venir del front
        $localizacionservice = new LocalizacionService();
        echo json_encode($localizacionservice->find_by_id($solicitud->LOC_ID));
    }
	
	//insertar un Localizacion
    function insert_localizacion(){
//        $solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"LOC_ID\":\"1\",\"LOC_DESC\":\"Esta en camino\",\"LOC_LAT\":\"10000\",\"LOC_LONG\":\"18524\"}");
        $localizacionservice = new LocalizacionService();
        if($localizacionservice->insert_localizacion($solicitud)){
            http_response_code();
        }else{
            http_response_code(500);
        }
    }

    //actualizar un Localizacion
    function update_localizacion(){
//        $solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"LOC_ID\":\"1\",\"LOC_DESC\":\"Esta en camino\",\"LOC_LAT\":\"10000\",\"LOC_LONG\":\"18524\"}");
        $localizacionservice = new LocalizacionService();
        if($localizacionservice->update_localizacion($solicitud)){
            http_response_code();
        }else{
            http_response_code(500);
        }
    }

    //eliminar un Localizacion
    function delete_localizacion(){
//        $solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"LOC_ID\":\"1\",\"LOC_DESC\":\"Esta en camino\",\"LOC_LAT\":\"10000\",\"LOC_LONG\":\"18524\"}");
        $localizacionservice = new LocalizacionService();
        if($localizacionservice->delete_localizacion($solicitud)){
            http_response_code();
        }else{
            http_response_code(500);
        }
    }
?>