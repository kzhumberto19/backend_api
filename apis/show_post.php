<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
use \Firebase\JWT\JWT;

$token = isset($_GET['token']) ? $_GET['token'] : "";
$id = isset($_GET['id']) ? $_GET['id'] : "";

if (strtoupper($_SERVER["REQUEST_METHOD"]) == 'GET') 
{
    if( $token )
    {

        try
        {
            $user_details = JWT::decode($token, $key, array('HS256'));
            $rol_id = isset($user_details->data->rol) ? $user_details->data->rol : "";
            $permisos = permisos( $rol_id  );
            $validar_acceso = validar_permisos( 'accesar',$permisos['data'] );
            $validar_consultar = validar_permisos( 'consultar',$permisos['data'] );
            if( $validar_acceso['num'] == 1 )
            {
                if( $validar_consultar['num'] == 1 )
                {
                    http_response_code(200);
                    $response = show_post( $id );
                    if( $response['num'] == 1){
                        echo json_encode(array("message" => "", "error" => false ,"data" => $response['data']));
                    }else{
                        echo json_encode(array("message" => "No se pudo consultar los datos", "error" => false ,"data" => null));
                    }
                }
                else
                {
                    http_response_code(401);
                    echo json_encode(array("message" => $validar_consultar['message'] ,"error" => true, "data" => null));
                }
            }
            else
            {
                http_response_code(401);
                echo json_encode(array("message" => $validar_consultar['message'] ,"error" => true, "data" => null));
            }

        }
        catch(Exception $e){
            echo json_encode(array(
                "message" => "Token invalido.",
                "error" => true,
                "data" => null
            ));
        }

    }
    else{
        http_response_code(401);
        echo json_encode(array("message" => "Token incorrecto." ,"error" => true));
    }
}
else
{
    header("HTTP/1.1 400 Bad Request"); 
}