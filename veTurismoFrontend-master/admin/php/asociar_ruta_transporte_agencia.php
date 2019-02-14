<?php
/**
 * Created by PhpStorm.
 * User: Jce
 * Date: 7/2/2018
 * Time: 10:06 PM
 */
$arch = fopen('php.log','a+');
fwrite($arch,"---- asociar_ruta_transporte_agencia.php ---\n");
if (!empty($_POST["agencia"])) {
    fwrite($arch, $_POST["agencia"]."\n");

    $json = [
        "response" => true,
        "msg" => "",
        "data" => [
            "id_agencia" => '1',
            "nombre_agencia" => 'Avior',
            "rif" => 'J-123456789',
            "telefono_1" => '04245555555',
            "telefono_2" => '04249999999' //puede ser vacio si no tiene segundo telefono
        ]
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