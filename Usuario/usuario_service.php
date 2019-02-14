<?php
    require_once "usuario_repository.php";

        class UsuarioService{

            function find_all(){
                $usuariorepository = new UsuarioRepository();
                return $usuariorepository->find_all();

            }

            function find_by_id($ID){
                $usuariorepository = new UsuarioRepository();
                return $usuariorepository->find_by_id($ID);
            }

            function find_by_usuario($USUARIO){

                $usuariorepository = new UsuarioRepository();
                return $usuariorepository->find_by_usuario($USUARIO);
            }
            
            function find_by_per_id($PER_ID){
                $usuariorepository = new UsuarioRepository();
                return $usuariorepository->find_by_per_id($PER_ID);
            }

            //insertar
            function insert_usuario($usuario){
                $usuario->clave = password_hash($usuario->clave, PASSWORD_DEFAULT);
                $usuariorepository = new UsuarioRepository();
                return $usuariorepository->insert_usuario($usuario);
            }

            //actualizar
            function update_usuario($usuario){
                $usuariorepository = new UsuarioRepository();
                return $usuariorepository->update_usuario($usuario);
            }

            //eliminar
            function delete_usuario($usuario){
                $usuariorepository = new UsuarioRepository();
                return $usuariorepository->delete_usuario($usuario);
            }

            function check_password($id, $password){
                $usuariorepository = new UsuarioRepository();
                $password_temp = $usuariorepository->get_password_by_id($id);
                if(password_verify($password, $password_temp[0]->USU_CLAVE)){
                    return true;
                }else{
                    return false;
                }
            }
        }
?>