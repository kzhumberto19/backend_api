<?php
function conexion()
{
    $google_cloud = "/cloudsql/celtic-iridium-332206:us-central1:cloudhumberto19";
    $conexion = false;
    $conexion = @mysqli_connect('34.132.199.73', "root", "humberto123", "geniat",null,$google_cloud);
    if (!$conexion) {
        return $conexion;
    }
    return $conexion;
}