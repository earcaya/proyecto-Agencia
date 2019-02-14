<?php
    require_once "agencia_service.php";
    require_once "../Ruta/ruta_service.php";
    require_once "../Transporte/transporte_service.php";
    require_once "../Viajes/viaje_service.php";

    require_once "../Utilidades/ResponseWrapper.php";
    require_once "../Utilidades/Enumerados.php";

    //el metodo a llamar se obtiene por get, es el unico parametro a ser enviado por get, los datos se envian por post
    //ejemplo: http://localhost/PROYECTO-WEB/agencia_controller.php?f=find_all
    //la parte luego del = es el nombre de la funcion
    if(function_exists($_POST['f'])){
        $_POST['f']();
		//find_by_all();//reemplacen esto dependiendo de la funcion que deseen llamar, dejen la linea de arriba que esa es la que funciona en el mundo real
    }

    /*
     * {"AG_ID":"1","AG_RIF":"j-123456789","AG_NOMBRE":"TuriZuela","AG_DIRECCION":"av-universidad","AG_TELEFONO":"0241-5114547"}
     * http://localhost:63342/PROYECTO-WEB/agencia_controller.php
     * */

    function find_all()
    {
        $agenciaservice = new AgenciaService();
        echo json_encode($agenciaservice->find_all());
    }

    //a partir de aqui los metodos se encargar de buscar dado un parametro en particular, todas las funciones
    //son similares

    //encuentra las agencias que tengan el id especificado
    function find_by_id()
    {
        //aqui deberia de recibir un json con el objeto para replicarlo en todos los endpoints, los datos viene por post
        $solicitud = json_decode($_POST['DATOS']);//dejar esta linea
		//$solicitud = json_decode("{\"AG_ID\":\"1\",\"AG_RIF\":\"j-123456789\",\"AG_NOMBRE\":\"TuriZuela\",\"AG_DIRECCION\":\"av-universidad\",\"AG_TELEFONO\":\"0241-5114547\"}");
		//esta linea emula lo que hace la de arriba, el json que tiene es el que deberia de venir del front
        $agenciaservice = new AgenciaService();
        echo json_encode($agenciaservice->find_by_id($solicitud->AG_ID));
    }

    //encuentra las agencias que tengan el rif especificado
    function find_by_rif()
    {
        $solicitud = json_decode($_POST['DATOS']);
        //$solicitud = json_decode("{\"AG_ID\":\"1\",\"AG_RIF\":\"j-123456789\",\"AG_NOMBRE\":\"TuriZuela\",\"AG_DIRECCION\":\"av-universidad\",\"AG_TELEFONO\":\"0241-5114547\"}");
        $agenciaservice = new AgenciaService();
//        echo json_encode($agenciaservice->find_by_rif($solicitud->AG_RIF));
        $responseWrapper  = new ResponseWrapper();
         $responseWrapper->setData($agenciaservice->find_by_rif($solicitud->rif));
        if($responseWrapper->getData()!=null){
            $responseWrapper->setResponse(true);
            $responseWrapper->setMsg(Enumerados::obtenerMensajeDeExito());
        }else{
            $responseWrapper->setResponse(false);
            $responseWrapper->setMsg(Enumerados::obtenerMensajeDeError(Enumerados::CONSULTA_NO_ENCONTRADO));
        }
        echo json_encode($responseWrapper);
        //echo json_encode($agenciaservice->find_by_rif($solicitud->rif));
    }

    //encuentra las agencias que tengan el nombre especificado
    function find_by_nombre()
    {
        $solicitud = json_decode($_POST['DATOS']);
        //$solicitud = json_decode("{\"AG_ID\":\"1\",\"AG_RIF\":\"j-123456789\",\"AG_NOMBRE\":\"TuriZuela\",\"AG_DIRECCION\":\"av-universidad\",\"AG_TELEFONO\":\"0241-5114547\"}");
        $agenciaservice = new AgenciaService();
//        echo json_encode($agenciaservice->find_by_nombre($solicitud->AG_NOMBRE));
//        echo json_encode($agenciaservice->find_by_nombre($solicitud->nombre));
        $responseWrapper  = new ResponseWrapper();
          $responseWrapper->setData($agenciaservice->find_by_nombre($solicitud->nombre));
        if($responseWrapper->getData()!=null){
            $responseWrapper->setResponse(true);
            $responseWrapper->setMsg(Enumerados::obtenerMensajeDeExito());
        }else{
            $responseWrapper->setResponse(false);
            $responseWrapper->setMsg(Enumerados::obtenerMensajeDeError(Enumerados::CONSULTA_NO_ENCONTRADO));
        }
        echo json_encode($responseWrapper);
    }

    //encuentra las agencias que tengan la direccion especificada
    function find_by_direccion()
    {
        $solicitud = json_decode($_POST['DATOS']);
//        $solicitud = json_decode("{\"AG_ID\":\"1\",\"AG_RIF\":\"j-123456789\",\"AG_NOMBRE\":\"TuriZuela\",\"AG_DIRECCION\":\"av-universidad\",\"AG_TELEFONO\":\"0241-5114547\"}");
        $agenciaservice = new AgenciaService();
        echo json_encode($agenciaservice->find_by_direccion($solicitud->AG_DIRECCION));
    }
	
	//insertar
    function insert_agencia(){
        $solicitud = json_decode($_POST['DATOS']);
//		$solicitud = json_decode("{\"AG_ID\":\"1\",\"AG_RIF\":\"j-123456789\",\"AG_NOMBRE\":\"TuriZuela\",\"AG_DIRECCION\":\"av-universidad\",\"AG_TELEFONO\":\"0241-5114547\"}");
        $agenciaservice = new AgenciaService();
        if($agenciaservice->insert_agencia($solicitud)){
            $responseWrapper  = new ResponseWrapper();
            $responseWrapper->setResponse(true);
            $responseWrapper->setMsg(Enumerados::obtenerMensajeDeExito());
            echo json_encode($responseWrapper);
        }else{
            $responseWrapper  = new ResponseWrapper();
            $responseWrapper->setResponse(false);
            $responseWrapper->setMsg(Enumerados::obtenerMensajeDeError(Enumerados::INSERCION_FALLIDA));
            echo json_encode($responseWrapper);
        }
    }

    //actualizar
    function update_agencia(){
        $solicitud = json_decode($_POST['DATOS']);
//		$solicitud = json_decode("{\"AG_ID\":\"1\",\"AG_RIF\":\"j-123456789\",\"AG_NOMBRE\":\"TuriZuela\",\"AG_DIRECCION\":\"av-universidad\",\"AG_TELEFONO\":\"0241-5114547\"}");
        $agenciaservice = new AgenciaService();
        if($agenciaservice->update_agencia($solicitud)){
            http_response_code();
        }else{
            http_response_code(500);
        }
    }

    //eliminar
    function delete_agencia(){
        $solicitud = json_decode($_POST['DATOS']);
//		$solicitud = json_decode("{\"AG_ID\":\"1\",\"AG_RIF\":\"j-123456789\",\"AG_NOMBRE\":\"TuriZuela\",\"AG_DIRECCION\":\"av-universidad\",\"AG_TELEFONO\":\"0241-5114547\"}");
        $agenciaservice = new AgenciaService();
        if($agenciaservice->delete_agencia($solicitud)){
            http_response_code();
        }else{
            http_response_code(500);
        }
    }

    function anadir_ruta(){
        $solicitud = json_decode($_POST['DATOS']);
        $rutaservice = new RutaService();
        if($rutaservice->insert_ruta($solicitud)){
            $responseWrapper  = new ResponseWrapper();
            $responseWrapper->setResponse(true);
            $responseWrapper->setMsg(Enumerados::obtenerMensajeDeExito());
            echo json_encode($responseWrapper);
        }else{
            $responseWrapper  = new ResponseWrapper();
            $responseWrapper->setResponse(false);
            $responseWrapper->setMsg(Enumerados::obtenerMensajeDeError(Enumerados::INSERCION_FALLIDA));
            echo json_encode($responseWrapper);
        }
    }

    function anadir_transporte(){
        $solicitud = json_decode($_POST['DATOS']);
        $transporteservice = new TransporteService();
        if($transporteservice->insert_transporte($solicitud)){
            $responseWrapper  = new ResponseWrapper();
            $responseWrapper->setResponse(true);
            $responseWrapper->setMsg(Enumerados::obtenerMensajeDeExito());
            echo json_encode($responseWrapper);
        }else{
            $responseWrapper  = new ResponseWrapper();
            $responseWrapper->setResponse(false);
            $responseWrapper->setMsg(Enumerados::obtenerMensajeDeError(Enumerados::INSERCION_FALLIDA));
            echo json_encode($responseWrapper);
        }
    }

    function anadir_viaje(){
        $solicitud = json_decode($_POST['DATOS']);
        $viajeservice = new ViajeService();
        if($viajeservice->insert_viaje($solicitud)){
            $responseWrapper  = new ResponseWrapper();
            $responseWrapper->setResponse(true);
            $responseWrapper->setMsg(Enumerados::obtenerMensajeDeExito());
            echo json_encode($responseWrapper);
        }else{
            $responseWrapper  = new ResponseWrapper();
            $responseWrapper->setResponse(false);
            $responseWrapper->setMsg(Enumerados::obtenerMensajeDeError(Enumerados::INSERCION_FALLIDA));
            echo json_encode($responseWrapper);
        }
    }

    function listar_rutas(){
        $solicitud = json_decode($_POST['DATOS']);
        $rutaservice = new RutaService();
        $responseWrapper  = new ResponseWrapper();
        $responseWrapper->setData($rutaservice->rutas_by_agencia($solicitud->id_agencia));
        if($responseWrapper->getData()!=null){
            $responseWrapper->setResponse(true);
            $responseWrapper->setMsg(Enumerados::obtenerMensajeDeExito());
        }else{
            $responseWrapper->setResponse(false);
            $responseWrapper->setMsg(Enumerados::obtenerMensajeDeError(Enumerados::CONSULTA_NO_ENCONTRADO));
        }
        echo json_encode($responseWrapper);
    }
	
?>