<?php
/**
 * Created by PhpStorm.
 * User: Jce
 * Date: 4/2/2018
 * Time: 3:41 AM
 */
$arch = fopen('php.log','a+');
fwrite($arch,"agencias.php\n");

foreach($_POST as $campo => $valor){
    fwrite($arch,"$campo => $valor ");
}

if(validar()){
    $arch2 = fopen('bd_agencias.txt','a+');
    foreach($_POST as $campo => $valor){
        fwrite($arch2,"$campo : $valor |");
    }
    fwrite($arch2,"\n");
    $json = [
        "response" => true,
        "msg" => "guardado",
        "data" => []
    ];

    fwrite($arch, json_encode($json)."\n");
    fclose($arch);
    fclose($arch2);
    echo json_encode($json);
}
else{
    $json = [
        "response" => false,
        "msg" => "Los datos son incorrectos",
        "data" => []
    ];

    fwrite($arch, json_encode($json)."\n");
    fclose($arch);
    echo json_encode($json);
}

function validar(){
    return (
        !empty($_POST['tipo-agencia'])&&
        !empty($_POST['nombre'])&&
        !empty($_POST['tipo-rif'])&&
        !empty($_POST['rif'])&&
        !empty($_POST['pais'])&&
        !empty($_POST['estado'])&&
        !empty($_POST['ciudad'])&&
        !empty($_POST['direccion'])&&
        !empty($_POST['telefono1'])&&
        //!empty($_POST['telefono2'])&&
        !empty($_POST['hora-apertura'])&&
        !empty($_POST['hora-cierre'])
    );
}