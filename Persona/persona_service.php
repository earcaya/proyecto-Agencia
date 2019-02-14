<?php
    require_once "persona_repository.php";

        class PersonaService{

            function find_all(){
                $personarepository = new PersonaRepository();
                return $personarepository->find_all();

            }

            function find_by_id($ID){
                $personarepository = new PersonaRepository();
                return $personarepository->find_by_id($ID);
            }

            function find_by_cedula($CEDULA){
                $personarepository = new PersonaRepository();
                return $personarepository->find_by_cedula($CEDULA);
            }
            
            function find_by_nombres($NOMBRES){
                $personarepository = new PersonaRepository();
                return $personarepository->find_by_nombres($NOMBRES);
            }
            function find_by_apellidos($APELIDOS){
                $personarepository = new PersonaRepository();
                return $personarepository->find_by_apellidos($APELIDOS);
            }
            function find_by_email($EMAIL){
                $personarepository = new PersonaRepository();
                return $personarepository->find_by_email($EMAIL);
            }
            function find_by_fechanac($FECHANAC){
                $personarepository = new PersonaRepository();
                return $personarepository->find_by_fechanac($FECHANAC);
            }

            //insertar
            function insert_persona($persona){
                $personarepository = new PersonaRepository();
                return $personarepository->insert_persona($persona);
            }

            //actualizar
            function update_persona($persona){
                $personarepository = new PersonaRepository();
                return $personarepository->update_persona($persona);
            }

            //eliminar
            function delete_persona($persona){
                $personarepository = new PersonaRepository();
                return $personarepository->delete_persona($persona);
            }



        }





?>