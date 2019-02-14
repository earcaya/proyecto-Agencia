<?php
    require_once "administrador_repository.php";

        class AdministradorService{

            function find_all(){
                $administradorpository = new AdministradorRepository();
                return $administradorpository->find_all();

            }

            function find_by_id($ID){
                $administradorpository = new AdministradorRepository();
                return $administradorpository->find_by_id($ID);
            }

            function find_by_usuario($USUARIO){
                $administradorpository = new AdministradorRepository();
                return $administradorpository->find_by_usuario($USUARIO);
            }
            
            function find_by_per_id($PER_ID){
                $administradorpository = new AdministradorRepository();
                return $administradorpository->find_by_per_id($PER_ID);
            }

            //insertar
            function insert_administrador($administrador){
                $administradorpository = new AdministradorRepository();
                return $administradorpository->insert_administrador($administrador);
            }

            //actualizar
            function update_administrador($administrador){
                $administradorpository = new AdministradorRepository();
                return $administradorpository->update_administrador($administrador);
            }

            //eliminar
            function delete_administrador($administrador){
                $administradorpository = new AdministradorRepository();
                return $administradorpository->delete_administrador($administrador);
            }

            function check_password($id, $password){
                $administrador_repository = new AdministradorRepository();
                $password_temp = $administrador_repository->get_password_by_id($id);
                if($password === $password_temp[0]->ADM_CLAVE){
                    return true;
                }else{
                    return false;
                }
            }
        }
?>