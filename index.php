<?php
include_once 'vendor/firebase/php-jwt/src/BeforeValidException.php';
include_once 'vendor/firebase/php-jwt/src/ExpiredException.php';
include_once 'vendor/firebase/php-jwt/src/SignatureInvalidException.php';
include_once 'vendor/firebase/php-jwt/src/JWT.php';

require __DIR__ . "/config/config.php";
$conexion = conexion();
$api    = request_var('api', '');
$php    = request_var('i', '');

if (file_exists("funciones/fn_$api.php"))
    require_once("funciones/fn_$api.php");


if (!empty($api)) 
{
    if (file_exists("apis/$api.php"))
        include_once("apis/$api.php");
}
