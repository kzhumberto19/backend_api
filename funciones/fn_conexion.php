<?php
function conexion()
{
    global $db_host, $db_user, $db_pwd, $db_database;
    $conexion = false;
    $conexion = @mysqli_connect("127.0.0.1", "root", "", "geniat");;
    if (!$conexion) {
        return $conexion;
    }
    return $conexion;
}