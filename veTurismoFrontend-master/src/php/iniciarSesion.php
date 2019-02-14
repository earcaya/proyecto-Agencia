<?php
/**
 * Created by PhpStorm.
 * User: Jce
 * Date: 1/2/2018
 * Time: 10:20 PM
 */

$arch = fopen('php.log','a+');
fwrite($arch,"iniciarSesion.php\n");
if (!empty($_POST["correo"]) && !empty($_POST["clave"])){

    fwrite($arch, $_POST["correo"]."\n");
    fwrite($arch, $_POST["clave"]."\n");

    $correo = $_POST["correo"];
    $clave = $_POST["clave"];

    if ($correo === 'test@test.com' && $clave === '123'){
        $json = [
            "response" => true,
            "msg" => "",
            "data" => [
                "token" => '0123456789',
                "tipo" => 'cliente'
            ]
        ];

        fwrite($arch, json_encode($json)."\n");
        fclose($arch);
        echo json_encode($json);
    } else {

        if ($correo === 'test@admin.com' && $clave === '123'){
            $json = [
                "response" => true,
                "msg" => "",
                "data" => [
                    "token" => '0123456789',
                    "tipo" => 'admin'
                ]
            ];

            fwrite($arch, json_encode($json)."\n");
            fclose($arch);
            echo json_encode($json);

        } else {
            $json = [
                "response" => false,
                "msg" => "Usurio incorrecto",
                "data" => []
            ];

            fwrite($arch, json_encode($json)."\n");
            fclose($arch);
            echo json_encode($json);
        }
    }
} else {
    $json = [
        'response' => false,
        'msg' => 'Se enviaron campos vacios',
        'data' => []
    ];
    fwrite($arch, json_encode($json)."\n");
    fclose($arch);
    echo json_encode($json);
}