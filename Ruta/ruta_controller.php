<?php
	require_once "ruta_service.php";
		
		//el metodo a llamar se obtiene por get, es el unico parametro a ser enviado por get, los datos se envian por post
    //ejemplo: http://localhost/PROYECTO-WEB/ruta_controller.php?f=find_all
    //la parte luego del = es el nombre de la funcion
    if(function_exists($_POST['f'])){
        $_POST['f']();
//		find_all();//reemplacen esto dependiendo de la funcion que deseen llamar, dejen la linea de arriba que esa es la que funciona en el mundo real
    }
	
	//Listar todos los rutas.
    function find_all()
    {
        $rutaservice = new RutaService();
        echo json_encode($rutaservice->find_all());
    }

    //a partir de aqui los metodos se encargar de buscar dado un parametro en particular, todas las funciones
    //son similares

    //encuentra las rutas que tengan el id especificado
    function find_by_id()
    {
        //aqui deberia de recibir un json con el objeto para replicarlo en todos los endpoints, los datos viene por post
        //$solicitud = json_decode($_POST['DATOS']);//dejar esta linea
		$solicitud = json_decode("{\"RUT_ID\":\"1\",\"RUT_ORIGEN\":\"Valencia\",\"RUT_DESTINO\":\"Caracas\",\"TRANS_ID\":\"3\",\"VIJ_ID\":\"1\"}");
		//esta linea emula lo que hace la de arriba, el json que tiene es el que deberia de venir del front
        $rutaservice = new RutaService();
        echo json_encode($rutaservice->find_by_id($solicitud->RUT_ID));
    }

    //muestra los rutas por el tipo
    function find_by_origen()
    {
//        $solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"RUT_ID\":\"1\",\"RUT_ORIGEN\":\"Valencia\",\"RUT_DESTINO\":\"Caracas\",\"TRANS_ID\":\"3\",\"VIJ_ID\":\"1\"}");        
		$rutaservice = new RutaService();
        echo json_encode($rutaservice->find_by_origen($solicitud->RUT_ORIGEN));
    }

    //muestra el peso del ruta
    function find_by_destino()
    {
//        $solicitud = json_decode($_POST['DATOS']);
        $solicitud = json_decode("{\"RUT_ID\":\"1\",\"RUT_ORIGEN\":\"Valencia\",\"RUT_DESTINO\":\"Caracas\",\"TRANS_ID\":\"3\",\"VIJ_ID\":\"1\"}");
        $rutaservice = new RutaService();
        echo json_encode($rutaservice->find_by_destino($solicitud->RUT_DESTINO));
    }

    //muestra la capacidad del ruta
    function find_by_transporte()
    {
//        $solicitud = json_decode($_POST['DATOS']);
        $solicitud = json_decode("{\"RUT_ID\":\"1\",\"RUT_ORIGEN\":\"Valencia\",\"RUT_DESTINO\":\"Caracas\",\"TRANS_ID\":\"3\",\"VIJ_ID\":\"1\"}");
        $rutaservice = new RutaService();
        echo json_encode($rutaservice->find_by_transporte($solicitud->TRANS_ID));
    }

    //encuentra las rutas que tengan la agencia especificado
    function find_by_viaje()
    {
//        $solicitud = json_decode($_POST['DATOS']);
        $solicitud = json_decode("{\"RUT_ID\":\"1\",\"RUT_ORIGEN\":\"Valencia\",\"RUT_DESTINO\":\"Caracas\",\"TRANS_ID\":\"3\",\"VIJ_ID\":\"1\"}");
        $rutaservice = new RutaService();
        echo json_encode($rutaservice->find_by_viaje($solicitud->VIJ_ID));
    }
	
	//insertar un ruta
    function insert_ruta(){
//        $solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"RUT_ID\":\"1\",\"RUT_ORIGEN\":\"Caracas\",\"RUT_DESTINO\":\"San Carlos\",\"TRANS_ID\":\"3\",\"VIJ_ID\":\"1\"}");
        $rutaservice = new RutaService();
        if($rutaservice->insert_ruta($solicitud)){
            http_response_code();
        }else{
            http_response_code(500);
        }
    }

    //actualizar un ruta
    function update_ruta(){
//        $solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"RUT_ID\":\"1\",\"RUT_ORIGEN\":\"Valencia\",\"RUT_DESTINO\":\"Caracas\",\"TRANS_ID\":\"3\",\"VIJ_ID\":\"1\"}");
        $trasporteservice = new RutaService();
        if($trasporteservice->update_ruta($solicitud)){
            http_response_code();
        }else{
            http_response_code(500);
        }
    }

    //eliminar un ruta
    function delete_ruta(){
//        $solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"RUT_ID\":\"1\",\"RUT_ORIGEN\":\"Valencia\",\"RUT_DESTINO\":\"Caracas\",\"TRANS_ID\":\"3\",\"VIJ_ID\":\"1\"}");
        $trasporteservice = new RutaService();
        if($trasporteservice->delete_ruta($solicitud)){
            http_response_code();
        }else{
            http_response_code(500);
        }
	}
?>