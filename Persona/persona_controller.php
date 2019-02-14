<?php

require_once "persona_service.php";
require_once "../Usuario/usuario_service.php";
require_once "../Utilidades/ResponseWrapper.php";
require_once "../Utilidades/Enumerados.php";

        if(function_exists($_POST['f'])){
           
            $_POST['f']();
        }


        function find_all(){
            $personaservice = new PersonaService();
            echo json_encode($personaservice->find_all());

        }

        function find_by_id(){
            $solicitud = json_decode($_POST['DATOS']);
            $personaservice = new PersonaService();
            echo json_encode($personaservice->find_by_id($solicitud->PER_ID));
        } 

        function find_by_cedula(){
            $solicitud = json_decode($_POST['DATOS']);
            $personaservice = new PersonaService();
            echo json_encode($personaservice->find_by_cedula($solicitud->PER_CEDULA));
        }
        
        function find_by_nombres(){
            $solicitud = json_decode($_POST['DATOS']);
            $personaservice = new PersonaService();
            echo json_encode($personaservice->find_by_nombres($solicitud->PER_NOMBRES));
        }
        function find_by_apellidos(){
            $solicitud = json_decode($_POST['DATOS']);
            $personaservice = new PersonaService();
            echo json_encode($personaservice->find_by_apellidos($solicitud->PER_APELIDOS));
        }
        function find_by_email(){
            $solicitud = json_decode($_POST['DATOS']);
            $personaservice = new PersonaService();
            echo json_encode($personaservice->find_by_email($solicitud->PER_EMAIL));
        }
        function find_by_fechanac(){
            $solicitud = json_decode($_POST['DATOS']);
            $personaservice = new PersonaService();
            echo json_encode($personaservice->find_by_fechanac($solicitud->PER_FECHANAC));
        }

        //insertar
        function insert_persona(){
            $solicitud = json_decode($_POST['DATOS']);
            $personaservice = new PersonaService();
            if($personaservice->insert_persona($solicitud)){
                http_response_code();
            }else{
                http_response_code(500);
            }
        }

        //actualizar
        function update_persona(){
            $solicitud = json_decode($_POST['DATOS']);
            $personaservice = new PersonaService();
            if($personaservice->update_persona($solicitud)){
                http_response_code();
            }else{
                http_response_code(500);
            }
        }

        //eliminar
        function delete_persona(){
            $solicitud = json_decode($_POST['DATOS']);
            $personaservice = new PersonaService();
            if($personaservice->delete_persona($solicitud)){
                http_response_code();
            }else{
                http_response_code(500);
            }
        }
        
        function registrar(){
            $solicitud = json_decode($_POST['DATOS']);
            $personaservice = new PersonaService();
            $usuarioservice = new UsuarioService();
            if($personaservice->insert_persona($solicitud)){
                $responseWrapper  = new ResponseWrapper();
                $responseWrapper->setResponse(true);
                $responseWrapper->setMsg(Enumerados::obtenerMensajeDeExito());
                //echo json_encode($responseWrapper);
            }else{
                $responseWrapper  = new ResponseWrapper();
                $responseWrapper->setResponse(false);
                $responseWrapper->setMsg(Enumerados::obtenerMensajeDeError(Enumerados::INSERCION_FALLIDA));
                echo json_encode($responseWrapper);
            }
            if($usuarioservice->insert_usuario($solicitud)){
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
?>