<?php

require_once "../Utilidades/ResponseWrapper.php";
require_once "../Utilidades/Enumerados.php";
require_once "usuario_service.php";
require_once "../Administrador/administrador_service.php";
require_once "../Token/TokenManager.php";
        if(function_exists($_POST['f'])){
            $_POST['f']();
        }


        function find_all(){
            $usuarioservice = new UsuarioService();
            echo json_encode($usuarioservice->find_all());

        }

        function find_by_id(){
            $solicitud = json_decode($_POST['DATOS']);
            $usuarioservice = new UsuarioService();
            echo json_encode($usuarioservice->find_by_id($solicitud->USU_ID));
        }

        function find_by_usuario(){
            $solicitud = json_decode($_POST['DATOS']);
            $usuarioservice = new UsuarioService();
            echo json_encode($usuarioservice->find_by_cedula($solicitud->USU_USUARIO));
        }
        
        function find_by_per_id(){
            $solicitud = json_decode($_POST['DATOS']);
            $usuarioservice = new UsuarioService();
            echo json_encode($usuarioservice->find_by_nombres($solicitud->PER_ID));
        }

        //insertar
        function insert_usuario(){
            $solicitud = json_decode($_POST['DATOS']);
            $usuarioservice = new UsuarioService();
            if($usuarioservice->insert_usuario($solicitud)){
                http_response_code();
            }else{
                http_response_code(500);
            }
        }

        //actualizar
        function update_usuario(){
            $solicitud = json_decode($_POST['DATOS']);
            $usuarioservice = new UsuarioService();
            if($usuarioservice->update_usuario($solicitud)){
                http_response_code();
            }else{
                http_response_code(500);
            }
        }

        //eliminar
        function delete_usuario(){
            $solicitud = json_decode($_POST['DATOS']);
            $usuarioservice = new UsuarioService();
            if($usuarioservice->delete_usuario($solicitud)){
                http_response_code();
            }else{
                http_response_code(500);
            }
        }

        function iniciar_sesion(){
            //$solicitud = json_decode($_POST['DATOS']);
            ////password_verify('rasmuslerdorf', $hash)
            $usuarioservice = new UsuarioService();
            $responseWrapper  = new ResponseWrapper();
            $responseWrapper->setData($usuarioservice->find_by_usuario($_POST['correo']));
            if($responseWrapper->getData()!=null && $usuarioservice->check_password($_POST['correo'],$_POST['clave'])){
                //entonces es usuario comun, deberia de comprobar si la clave es correcta algun dia
                $responseWrapper->setResponse(true);
                $responseWrapper->setMsg(Enumerados::obtenerMensajeDeExito());
                //acomodo lo del token
                $token_manager = new TokenManager();
                $token_to_return = $token_manager->createToken($_POST['correo'],"usuario");
                $responseWrapper->setData("{\"tipo\":\"usuario\", \"token\":\"$token_to_return\"}");
                //$responseWrapper->setData($token_to_return);
                $responseWrapper->setData($responseWrapper->getData());
            }else{
                //puede que sea administrador
                $administradorservice = new AdministradorService();
                $responseWrapper->setData($administradorservice->find_by_usuario($_POST['correo']));
                if($responseWrapper->getData()!=null && $administradorservice->check_password($_POST['correo'], $_POST['clave'])){
                    //entonces es usuario comun, deberia de comprobar si la clave es correcta algun dia
                    $responseWrapper->setResponse(true);
                    $responseWrapper->setMsg(Enumerados::obtenerMensajeDeExito());
                    //acomodo lo del token
                    $token_manager = new TokenManager();
                    $token_to_return = $token_manager->createToken($_POST['correo'],"administrador");
                    $responseWrapper->setData("{\"tipo\":\"administrador\", \"token\":\"$token_to_return\"}");
                    $responseWrapper->setData($responseWrapper->getData());
                }else{
                    //puede que sea administrador
                    $responseWrapper->setResponse(false);
                    $responseWrapper->setMsg(Enumerados::obtenerMensajeDeError(Enumerados::CONSULTA_NO_ENCONTRADO));
                    $responseWrapper->setData(null);
                }
            }
            echo json_encode($responseWrapper);
        }
?>