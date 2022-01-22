<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
use \Firebase\JWT\JWT;
$datos = json_decode(file_get_contents("php://input"));
if (strtoupper($_SERVER["REQUEST_METHOD"]) == 'POST') 
{
    if( $datos )
    {
        $verificar = verificar_correo(  $datos->email );
        if ($verificar['num'] == 1) 
        {
            $password = "";
            $usuario = $verificar['data'];
            if( isset( $datos->password ) ){
                $password = $datos->password;
            }
            if (password_verify( $password, $usuario['password']) && $usuario) 
            {
                $payload = array(
                    // "iss" => "",
                    // "aud" => "",
                    "exp" => $time + (60 * 60),
                    "iat" => $time,
                    "data" => array(
                        "id"        => $usuario['id'],
                        "firstname"    => $usuario['firstname'],
                        "lastname" => $usuario['lastname'],
                        "email"    => $usuario['email'],
                        "rol"     => $usuario['rol']
                    )
                );
                http_response_code(200);
                $jwt = JWT::encode($payload, $key);
                echo json_encode(
                    array(
                        "message" => "Correcto",
                        "token" => $jwt,
                        "error" => false
                    )
                );
            } 
            else 
            {
                http_response_code(401);
                echo json_encode(array("message" => "La contraseña ha sido incorrecta.","error" => true));
            }
        } 
        else 
        {
            http_response_code(401);
            echo json_encode(array("message" => "El correo no fue encontrado.","error" => true));
        }
    }
    else
    {
        http_response_code(401);
        echo json_encode(array("message" => "Los datos son incorrectos.","error" => true));
    }

}
else
{
    header("HTTP/1.1 400 Bad Request"); 
}
