<?php
    require_once "viaje_service.php";

    //el metodo a llamar se obtiene por get, es el unico parametro a ser enviado por get, los datos se envian por post
    //ejemplo: http://localhost/PROYECTO-WEB/agencia_controller.php?f=find_all
    //la parte luego del = es el nombre de la funcion
    if(function_exists($_POST['f'])){
        $_POST['f']();
//		find_by_id();//reemplacen esto dependiendo de la funcion que deseen llamar, dejen la linea de arriba que esa es la que funciona en el mundo real
    }

    /*
     * {"AG_ID":"1","AG_RIF":"j-123456789","AG_NOMBRE":"TuriZuela","AG_DIRECCION":"av-universidad","AG_TELEFONO":"0241-5114547"}
     * http://localhost:63342/PROYECTO-WEB/agencia_controller.php
     * */

    function find_all()
    {
        $viajeservice = new viajeService();
        echo json_encode($viajeservice->find_all());
    }

    //a partir de aqui los metodos se encargar de buscar dado un parametro en particular, todas las funciones
    //son similares

    //encuentra las agencias que tengan el id especificado
    function find_by_id()
    {
        //aqui deberia de recibir un json con el objeto para replicarlo en todos los endpoints, los datos viene por post
        $solicitud = json_decode($_POST['DATOS']);//dejar esta linea
//		$solicitud = json_decode("{\"VIJ_ID\":\"1\",\"VIJ_FECHA\":\"14/02/2018\",\"VIJ_TIPO\":\"negocios\",\"VIJ_COSTO\":\"455546.56\",\"AGENCIA_AG_ID\":\"45\"}");
		//esta linea emula lo que hace la de arriba, el json que tiene es el que deberia de venir del front
        $viajeservice = new viajeService();
        echo json_encode($viajeservice->find_by_id($solicitud->VIJ_ID));
    }

    //encuentra las agencias que tengan el rif especificado
    function find_by_fecha()
    {
        $solicitud = json_decode($_POST['DATOS']);
//        $solicitud = json_decode("{\"VIJ_ID\":\"1\",\"VIJ_FECHA\":\"14/02/2018\",\"VIJ_TIPO\":\"negocios\",\"VIJ_COSTO\":\"455546.56\",\"AGENCIA_AG_ID\":\"45\"}");
        $viajeservice = new viajeService();
        echo json_encode($viajeservice->find_by_fecha($solicitud->VIJ_FECHA));
    }

    //encuentra las agencias que tengan el nombre especificado
    function find_by_tipo()
    {
        $solicitud = json_decode($_POST['DATOS']);
//        $solicitud = json_decode("{\"VIJ_ID\":\"1\",\"VIJ_FECHA\":\"14/02/2018\",\"VIJ_TIPO\":\"negocios\",\"VIJ_COSTO\":\"455546.56\",\"AGENCIA_AG_ID\":\"45\"}");
        $viajeservice = new viajeService();
        echo json_encode($viajeservice->find_by_tipo($solicitud->VIJ_TIPO));
    }

    //encuentra las agencias que tengan la direccion especificada
    function find_by_costo()
    {
        $solicitud = json_decode($_POST['DATOS']);
//        $solicitud = json_decode("{\"VIJ_ID\":\"1\",\"VIJ_FECHA\":\"14/02/2018\",\"VIJ_TIPO\":\"negocios\",\"VIJ_COSTO\":\"455546.56\",\"AGENCIA_AG_ID\":\"45\"}");
        $viajeservice = new viajeService();
        echo json_encode($viajeservice->find_by_costo($solicitud->VIJ_COSTO));
    }

    //encuentra las agencias que tengan el telefono especificado
    function find_by_agencia_ag_id()
    {
        $solicitud = json_decode($_POST['DATOS']);
//        $solicitud = json_decode("{\"VIJ_ID\":\"1\",\"VIJ_FECHA\":\"14/02/2018\",\"VIJ_TIPO\":\"negocios\",\"VIJ_COSTO\":\"455546.56\",\"AGENCIA_AG_ID\":\"45\"}");
        $viajeservice = new viajeService();
        echo json_encode($viajeservice->find_by_agencia_ag_id($solicitud->AGENCIA_AG_ID));
    }
    //inserta elemento en la tabla viaje
    function insert_viaje()
    {
        $solicitud = json_decode($_POST['DATOS']);
//        $solicitud = json_decode("{\"VIJ_ID\":\"1\",\"VIJ_FECHA\":\"14/02/2018\",\"VIJ_TIPO\":\"negocios\",\"VIJ_COSTO\":\"455546.56\",\"AGENCIA_AG_ID\":\"45\"}");
        $viajeservice = new viajeService();
        if($viajeservice->insert_viaje($solicitud))
        {
            http_response_code();
        }
        else
        {
            http_response_code(500);
        }
    }
    //elimina elemento en la agencia viaje
     function delete_viaje()
    {
        $solicitud = json_decode($_POST['DATOS']);
//        $solicitud = json_decode("{\"VIJ_ID\":\"1\",\"VIJ_FECHA\":\"14/02/2018\",\"VIJ_TIPO\":\"negocios\",\"VIJ_COSTO\":\"455546.56\",\"AGENCIA_AG_ID\":\"45\"}");
        $viajeservice = new viajeService();
        if($viajeservice->delete_viaje($solicitud))
        {
            http_response_code();
        }
        else
        {
            http_response_code(500);
        }
    }


    //actualiza datos de un elemento de la tabla viaje
     function update_viaje()
    {
        $solicitud = json_decode($_POST['DATOS']);
//        $solicitud = json_decode("{\"VIJ_ID\":\"1\",\"VIJ_FECHA\":\"14/02/2018\",\"VIJ_TIPO\":\"negocios\",\"VIJ_COSTO\":\"455546.56\",\"AGENCIA_AG_ID\":\"45\"}");
        $viajeservice = new viajeService();
        if($viajeservice->insert_viaje($solicitud))
        {
            http_response_code();
        }
        else
        {
            http_response_code(500);
        }
    }
?>