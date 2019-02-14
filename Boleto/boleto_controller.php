<?php
    require_once "boleto_service.php";

    if(function_exists($_POST['f'])){
        $_POST['f']();
//		find_by_id();
    }


    function find_all()
    {
        $boletoservice = new boletoService();
        echo json_encode($boletoservice->find_all());
    }

    function find_by_id()
    {
        //$solicitud = json_decode($_POST['DATOS']);//dejar esta linea
		$solicitud = json_decode("{\"BOL_ID\":\"1\",\"BOL_NUMERO\":\"123\",\"BOL_FECHA\":\"10/03/2018\", \"BOL_TIPO\":\"Pasajes Bus\",\"PER_ID\":\"1\",\"VIJ_ID\":\"1\"}");
        $boletoservice = new boletoService();
        echo json_encode($boletoservice->find_by_id($solicitud->BOL_ID));
    }

    function find_by_numero()
    {
        //$solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"BOL_ID\":\"1\",\"BOL_NUMERO\":\"123\",\"BOL_FECHA\":\"10/03/2018\", \"BOL_TIPO\":\"Pasajes Bus\",\"PER_ID\":\"1\",\"VIJ_ID\":\"1\"}");
        $boletoservice = new boletoService();
        echo json_encode($boletoservice->find_by_numero($solicitud->BOL_NUMERO));
    }

    function find_by_fecha()
    {
        //$solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"BOL_ID\":\"1\",\"BOL_NUMERO\":\"123\",\"BOL_FECHA\":\"10/03/2018\", \"BOL_TIPO\":\"Pasajes Bus\",\"PER_ID\":\"1\",\"VIJ_ID\":\"1\"}");
        $boletoservice = new boletoService();
        echo json_encode($boletoservice->find_by_fecha($solicitud->BOL_FECHA));
    }

    function find_by_tipo()
    {
        //$solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"BOL_ID\":\"1\",\"BOL_NUMERO\":\"123\",\"BOL_FECHA\":\"10/03/2018\", \"BOL_TIPO\":\"Pasajes Bus\",\"PER_ID\":\"1\",\"VIJ_ID\":\"1\"}");
        $boletoservice = new boletoService();
        echo json_encode($boletoservice->find_by_tipo($solicitud->BOL_TIPO));
    }

    function find_by_per_id()
    {
        //$solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"BOL_ID\":\"1\",\"BOL_NUMERO\":\"123\",\"BOL_FECHA\":\"10/03/2018\", \"BOL_TIPO\":\"Pasajes Bus\",\"PER_ID\":\"1\",\"VIJ_ID\":\"1\"}");
        $boletoservice = new boletoService();
        echo json_encode($boletoservice->find_by_per_id($solicitud->PER_ID));
    }

    function find_by_vij_id()
    {
        //$solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"BOL_ID\":\"1\",\"BOL_NUMERO\":\"123\",\"BOL_FECHA\":\"10/03/2018\", \"BOL_TIPO\":\"Pasajes Bus\",\"PER_ID\":\"1\",\"VIJ_ID\":\"1\"}");
        $boletoservice = new boletoService();
        echo json_encode($boletoservice->find_by_vij_id($solicitud->VIJ_ID));
    }
    //inserta elemento en la tabla boleto
    function insert_boleto()
    {
        ////$solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"BOL_ID\":\"1\",\"BOL_NUMERO\":\"123\",\"BOL_FECHA\":\"10/03/2018\", \"BOL_TIPO\":\"Pasajes Bus\",\"PER_ID\":\"1\",\"VIJ_ID\":\"1\"}");
        $boletoservice = new boletoService();
        if($boletoservice->insert_boleto($solicitud))
        {
            http_response_code();
        }
        else
        {
            http_response_code(500);
        }
    }
    //elimina elemento en la agencia boleto
     function delete_boleto()
    {
        //$solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"BOL_ID\":\"1\",\"BOL_NUMERO\":\"123\",\"BOL_FECHA\":\"10/03/2018\", \"BOL_TIPO\":\"Pasajes Bus\",\"PER_ID\":\"1\",\"VIJ_ID\":\"1\"}");
        $boletoservice = new boletoService();
        if($boletoservice->delete_boleto($solicitud))
        {
            http_response_code();
        }
        else
        {
            http_response_code(500);
        }
    }
    //actualiza datos de un elemento de la tabla boleto
     function update_boleto()
    {
        //$solicitud = json_decode($_POST['DATOS']);
		$solicitud = json_decode("{\"BOL_ID\":\"1\",\"BOL_NUMERO\":\"123\",\"BOL_FECHA\":\"10/03/2018\", \"BOL_TIPO\":\"Pasajes Bus\",\"PER_ID\":\"1\",\"VIJ_ID\":\"1\"}");
        $boletoservice = new boletoService();
        if($boletoservice->insert_boleto($solicitud))
        {
            http_response_code();
        }
        else
        {
            http_response_code(500);
        }
    }
?>