<?php
/**
 * Created by PhpStorm.
 * User: LGomez
 * Date: 08/03/2018
 * Time: 2:06 PM
 */

class Enumerados
{
    const CONSULTA_NO_ENCONTRADO = 1;
    const INSERCION_FALLIDA = 2;
    const ACTUALIZACION_FALLIDA = 3;
    const ELIMINACION_FALLIDA = 4;
    const SOLICITUD_ERRONEA = 5;

    function obtenerMensajeDeError($enum){
        switch ($enum):
            case 1:
                return "No se ha encontrado la informacion solicitada";
                break;
            case 2:
                return "No se ha logrado la inserción de los datos";
                break;
            case 3:
                return "No se ha logrado la actualización de los datos";
                break;
            case 4:
                return "No se ha logrado la eliminación de los datos";
                break;
            case 5:
                return "Solicitud estructurada de manera incorrecta";
                break;
            default:
                return "Ha ocurrida un error desconocido";
        endswitch;
    }

    function obtenerMensajeDeExito(){
        return "Operación Exitosa";
    }
}