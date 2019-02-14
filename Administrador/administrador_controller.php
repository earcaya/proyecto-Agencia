<?php

require_once "usuario_service.php";

        if(function_exists($_GET['f'])){
            $_GET['f']();
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
            echo json_encode($usuarioservice->find_by_cedula($solicitud->$USU_USUARIO));
        }
        
        function find_by_per_id(){
            $solicitud = json_decode($_POST['DATOS']);
            $usuarioservice = new UsuarioService();
            echo json_encode($usuarioservice->find_by_nombres($solicitud->$PER_ID));
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

?>