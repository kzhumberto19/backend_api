<?php
include_once 'vendor/firebase/php-jwt/src/BeforeValidException.php';
include_once 'vendor/firebase/php-jwt/src/ExpiredException.php';
include_once 'vendor/firebase/php-jwt/src/SignatureInvalidException.php';
include_once 'vendor/firebase/php-jwt/src/JWT.php';

use \Firebase\JWT\JWT;

require __DIR__ . "/config/bootstrap.php";
require ROOT_PATH . "/Controller/ControllerLogin.php";

$datos = json_decode(file_get_contents("php://input"));

// print_r( $datos->pwd );
// die();
$database = new Database();
$db = $database->conexion();

$login = new Login($db);
$verificar = $login->verificar_correo($datos->correo);

if ($verificar['num'] == 1) {
    $usuario = $verificar['data'];
    if (password_verify($datos->pwd, $usuario['PWD'])) {

        $payload = array(
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            "exp" => $time + (60 * 60),
            "iat" => $time,
            "data" => array(
                "id"        => $usuario['ID'],
                "name"    => $usuario['NOMBRE'],
                "lastname" => $usuario['APELLIDOS'],
                "email"    => $usuario['CORREO'],
                "rol"     => array(
                    '1',
                    '2',
                    '3',
                    '4',
                 ) 
            )
        );
        http_response_code(200);
        $jwt = JWT::encode($payload, $key);
        echo json_encode(
            array(
                "message" => "Correcto",
                "jwt" => $jwt
            )
        );
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "La contraseña ha sido incorrecta."));
    }
} else {
    http_response_code(401);
    echo json_encode(array("message" => "El correo no fue encontrado."));
}
