<?php
/**
 * Created by PhpStorm.
 * User: Jce
 * Date: 4/2/2018
 * Time: 6:57 AM
 */

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
header('Location: '.$uri.'/veTurismoFrontend/public/');
exit;
