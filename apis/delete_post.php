<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
use \Firebase\JWT\JWT;
$datos = json_decode(file_get_contents("php://input"));


$token = isset($datos->token) ? $datos->token : "";

$id = 0;
$rol = 0;
if (strtoupper($_SERVER["REQUEST_METHOD"]) == 'DELETE') 
{
    if( $token )
    {
        if( $datos )
        {
            if( validar_datos( $datos ) )
            {
                try
                {
                    $user_details = JWT::decode($token, $key, array('HS256'));
                    $rol_id = isset($user_details->data->rol) ? $user_details->data->rol : "";
                    $permisos = permisos( $rol_id  );
                    $validar_acceso = validar_permisos( 'accesar',$permisos['data'] );
                    $validar_eliminar = validar_permisos( 'eliminar',$permisos['data'] );
                    if( $validar_acceso['num'] == 1 )
                    {
                        if( $validar_eliminar['num'] == 1 )
                        {
                            http_response_code(200);
                            $response = delete_post( $datos->id);
                            if( $response['num'] == 1){
                                echo json_encode(array("message" => "Post eliminado.", "error" => false ,"data" => null));
                            }else{
                                echo json_encode(array("message" => "No se pudo eliminar el Post.", "error" => false ,"data" => null));
                            }
                        }
                        else
                        {
                            http_response_code(401);
                            echo json_encode(array("message" => $validar_eliminar['message'] ,"error" => true, "data" => null));
                        }
                    }
                    else
                    {
                        http_response_code(401);
                        echo json_encode(array("message" => $validar_eliminar['message'] ,"error" => true, "data" => null));
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
                echo json_encode(array("message" => "Existen datos vacios." ,"error" => true));
            }
            
        }
        else
        {
            http_response_code(401);
            echo json_encode(array("message" => "Los datos son incorrectos." ,"error" => true));
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