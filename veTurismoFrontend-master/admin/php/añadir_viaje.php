<?php
/**
 * Created by PhpStorm.
 * User: Jce
 * Date: 7/2/2018
 * Time: 11:57 PM
 */
$arch = fopen('php.log','a+');
fwrite($arch,"--- añadir_viaje.php ---\n");
if (!empty($_POST["id_agencia"])) {
    fwrite($arch, $_POST["fecha"]."\n");
    fwrite($arch, $_POST["costo"]."\n");
    fwrite($arch, $_POST["boletos"]."\n");
    fwrite($arch, $_POST["tipo"]."\n");

    fwrite($arch, $_POST["ruta"]."\n");
    fwrite($arch, $_POST["unidad"]."\n");
    fwrite($arch, $_POST["id_agencia"]."\n");

    $json = [
        "response" => true,
        "msg" => "Viaje guardado",
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