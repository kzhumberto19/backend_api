<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$datos = json_decode(file_get_contents("php://input"));

if (strtoupper($_SERVER["REQUEST_METHOD"]) == 'POST') 
{
    if( $datos )
    {
        if( validar_datos( $datos ) )
        {
            if( isset($datos->firstname) && isset($datos->lastname) && isset($datos->email) && isset($datos->password) && isset($datos->rol) )
            {
                http_response_code(200);
                $response = create_user( $datos->firstname , $datos->lastname, $datos->email , $datos->password , $datos->rol );
                if( $response['num'] == 1){
                    echo json_encode(array("message" => "Usuario creado.", "error" => false ,"data" => null));
                }
                else{
                    echo json_encode(array("message" => "No se pudo crear el usuario.", "error" => false ,"data" => null));
                }
            }
            else{
                http_response_code(401);
                echo json_encode(array("message" => "Faltan datos." ,"error" => true));
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
else
{
    header("HTTP/1.1 400 Bad Request"); 
}