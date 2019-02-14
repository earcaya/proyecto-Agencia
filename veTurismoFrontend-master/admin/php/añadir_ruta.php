<?php
/**
 * Created by PhpStorm.
 * User: Jce
 * Date: 7/2/2018
 * Time: 10:53 PM
 */
$arch = fopen('php.log','a+');
fwrite($arch,"--- añadir_ruta.php ---\n");
if (!empty($_POST["id_agencia"])) {
    fwrite($arch, $_POST["id_agencia"]."\n");
    fwrite($arch, $_POST["pais_origen"]."\n");
    fwrite($arch, $_POST["estado_origen"]."\n");
    fwrite($arch, $_POST["ciudad_origen"]."\n");

    fwrite($arch, $_POST["pais_destino"]."\n");
    fwrite($arch, $_POST["estado_destino"]."\n");
    fwrite($arch, $_POST["ciudad_destino"]."\n");

    fwrite($arch, $_POST["id"]."\n");

    $json = [
        "response" => true,
        "msg" => "Ruta guardada",
        "data" => []
    ];

    $json = json_encode($json);
    fwrite($arch, "$json\n");
    fclose($arch);
    echo $json;
} else {
    $json = [
        'response' => false,
        'msg' => 'Se enviaron campos vacios',
        'data' => []
    ];
    $json = json_encode($json);
    fwrite($arch, "$json\n");
    fclose($arch);
    echo $json;
}