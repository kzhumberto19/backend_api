<?php
require_once('vendor/autoload.php');
define("ROOT_PATH", __DIR__ . "/../");

// include main configuration file
require_once ROOT_PATH ."Traits/TraitLogin.php";
require_once ROOT_PATH . "/config/config.php";
require_once ROOT_PATH . "/Controller/ControllerBase.php";
require_once ROOT_PATH . "/Model/Conexion.php";

