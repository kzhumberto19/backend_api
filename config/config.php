<?php
require_once('vendor/autoload.php');
define("ROOT_PATH", __DIR__ . "/../");

//Archivos de configuración
require_once ROOT_PATH . "/config/config.php";
require_once ROOT_PATH . "/funciones/fn_conexion.php";
require_once ROOT_PATH . "/funciones/fn_generales.php";
require_once ROOT_PATH . "/funciones/fn_api.php";

setlocale( LC_ALL, "es_MX.UTF-8" );
$key = "Humb$02920120sKmd82";
$time = time();