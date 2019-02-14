<?php
    require_once "transporte_service.php";

    //el metodo a llamar se obtiene por get, es el unico parametro a ser enviado por get, los datos se envian por post
    //ejemplo: http://localhost/PROYECTO-WEB/transporte_controller.php?f=find_all
    //la parte luego del = es el nombre de la funcion
    if(function_exists($_POST['f'])){
        $_POST['f']();
//		insert_transporte();//reemplacen esto dependiendo de la funcion que deseen llamar, dejen la linea de arriba que esa es la que funciona en el mundo real
    }
	
	//Listar todos los transportes.
    function find_all()
    {
        $transporteservice = new TransporteService();
        echo json_encode($transporteservice->find_all());
    }

    //a partir de aqui los metodos se encargar de buscar dado un parametro en particular, todas las funciones
    //son similares

    //encuentra las transportes que tengan el id especificado
    function find_by_id()
    {
        //aqui deberia de recibir un json con el objeto para replicarlo en todos los endpoints, los datos viene por post
        //$solicitud = json_decode($_POST['DATOS']);//dejar esta linea
		$solicitud = json_decode("{\"TRANS_ID\":\"1\",\"TRANS_PLACA\":\"JAH7\",\"TRANS_TIPO\":\"terrestre\",\"TRANS_PESO\":\"2000\",\"TRANS_CAPACIDAD\":\"52\",\"AGENCIA_AG_ID\":\"2\",\"LOC_ID\":\"1\"}");
		//esta linea emula lo que hace la de arriba, el json que tiene es el que deberia de venir del front
        $transporteservice = new TransporteService();
        echo json_encode($transporteservice->find_by_id($solicitud->TRANS_ID));
    }
	
	function find_by_placa()
    {
        //aqui deberia de recibir un json con el objeto para replicarlo en todos los endpoints, los datos viene por post
        //$solicitud = json_decode($_POST['DATOS']);//dejar esta linea
		$solicitud = json_decode("{\"TRANS_ID\":\"1\",\"TRANS_PLACA\":\"JAH7\",\"TRANS_TIPO\":\"terrestre\",\"TRANS_PESO\":\"2000\",\"TRANS_CAPACIDAD\":\"52\",\"AGENCIA_AG_ID\":\"2\",\"LOC_ID\":\"1\"}");
		//esta linea emula lo que hace la de arriba, el json que tiene es el que deberia de venir del front
        $transporteservice = new TransporteService();
        echo json_encode($transporteservice->find_by_placa($solicitud->TRANS_PLACA));
    }

    //muestra los transportes por el tipo
    function find_by_tipo()
    {
//        $solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"TRANS_ID\":\"1\",\"TRANS_PLACA\":\"JAH7\",\"TRANS_TIPO\":\"terrestre\",\"TRANS_PESO\":\"2000\",\"TRANS_CAPACIDAD\":\"52\",\"AGENCIA_AG_ID\":\"2\",\"LOC_ID\":\"1\"}");       
		$transporteservice = new TransporteService();
        echo json_encode($transporteservice->find_by_tipo($solicitud->TRANS_TIPO));
    }

    //muestra el peso del transporte
    function find_by_peso()
    {
//        $solicitud = json_decode($_POST['DATOS']);
        $solicitud = json_decode("{\"TRANS_ID\":\"1\",\"TRANS_PLACA\":\"JAH7\",\"TRANS_TIPO\":\"terrestre\",\"TRANS_PESO\":\"2000\",\"TRANS_CAPACIDAD\":\"52\",\"AGENCIA_AG_ID\":\"2\",\"LOC_ID\":\"1\"}");
        $transporteservice = new TransporteService();
        echo json_encode($transporteservice->find_by_peso($solicitud->TRANS_PESO));
    }

    //muestra la capacidad del transporte
    function find_by_capacidad()
    {
//        $solicitud = json_decode($_POST['DATOS']);
        $solicitud = json_decode("{\"TRANS_ID\":\"1\",\"TRANS_PLACA\":\"JAH7\",\"TRANS_TIPO\":\"terrestre\",\"TRANS_PESO\":\"2000\",\"TRANS_CAPACIDAD\":\"52\",\"AGENCIA_AG_ID\":\"2\",\"LOC_ID\":\"1\"}");
        $transporteservice = new TransporteService();
        echo json_encode($transporteservice->find_by_capacidad($solicitud->TRANS_CAPACIDAD));
    }

    //encuentra las transportes que tengan la agencia especificado
    function find_by_agencia_id()
    {
//        $solicitud = json_decode($_POST['DATOS']);
        $solicitud = json_decode("{\"TRANS_ID\":\"1\",\"TRANS_PLACA\":\"JAH7\",\"TRANS_TIPO\":\"terrestre\",\"TRANS_PESO\":\"2000\",\"TRANS_CAPACIDAD\":\"52\",\"AGENCIA_AG_ID\":\"2\",\"LOC_ID\":\"1\"}");
        $transporteservice = new TransporteService();
        echo json_encode($transporteservice->find_by_agencia_id($solicitud->AGENCIA_AG_ID));
    }
	
	//Muestra los transportes por localizacion.
	function find_by_localizacion()
    {
//        $solicitud = json_decode($_POST['DATOS']);
        $solicitud = json_decode("{\"TRANS_ID\":\"1\",\"TRANS_PLACA\":\"JAH7\",\"TRANS_TIPO\":\"terrestre\",\"TRANS_PESO\":\"2000\",\"TRANS_CAPACIDAD\":\"52\",\"AGENCIA_AG_ID\":\"2\",\"LOC_ID\":\"1\"}");
        $transporteservice = new TransporteService();
        echo json_encode($transporteservice->find_by_localizacion($solicitud->LOC_ID));
    }
	
	//insertar un transporte
    function insert_transporte(){
        $solicitud = json_decode($_POST['DATOS']);
		//$solicitud = json_decode("{\"TRANS_ID\":\"1\",\"TRANS_PLACA\":\"JAH7\",\"TRANS_TIPO\":\"terrestre\",\"TRANS_PESO\":\"2000\",\"TRANS_CAPACIDAD\":\"52\",\"AGENCIA_AG_ID\":\"2\",\"LOC_ID\":\"1\"}");
        $transporteservice = new TransporteService();
        if($transporteservice->insert_transporte($solicitud)){
            http_response_code();
        }else{
            http_response_code(500);
        }
    }

    //actualizar un transporte
    function update_transporte(){
//        $solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"TRANS_ID\":\"1\",\"TRANS_PLACA\":\"JAH7\",\"TRANS_TIPO\":\"terrestre\",\"TRANS_PESO\":\"2000\",\"TRANS_CAPACIDAD\":\"52\",\"AGENCIA_AG_ID\":\"2\",\"LOC_ID\":\"1\"}");
        $trasporteservice = new TransporteService();
        if($trasporteservice->update_trasporte($solicitud)){
            http_response_code();
        }else{
            http_response_code(500);
        }
    }

    //eliminar un transporte
    function delete_transporte(){
//        $solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"TRANS_ID\":\"1\",\"TRANS_PLACA\":\"JAH7\",\"TRANS_TIPO\":\"terrestre\",\"TRANS_PESO\":\"2000\",\"TRANS_CAPACIDAD\":\"52\",\"AGENCIA_AG_ID\":\"2\",\"LOC_ID\":\"1\"}");
        $trasporteservice = new TransporteService();
        if($trasporteservice->delete_trasporte($solicitud)){
            http_response_code();
        }else{
            http_response_code(500);
        }
    }
?>