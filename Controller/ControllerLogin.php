<?php
class Login extends BaseController
{
    use SetearApi;
    private $conexion;
    // public $correo;
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function verificar_correo($correo)
    {
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if (strtoupper($requestMethod) == 'GET') {
            $query = "SELECT 
            ID,
            NOMBRE,
            APELLIDOS,
            CORREO,
            PWD
            FROM USERS WHERE CORREO = ?";

            $resultado = $this->conexion->prepare($query);
            $correo = htmlspecialchars(strip_tags($correo));
            $resultado->bindParam(1, $correo);
            $resultado->execute();
            $num = $resultado->rowCount();
            if ($num > 0) {

                if ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {

                    return $this->successResponse($fila, 200);
                }
            }
            return $this->errorResponse(null, 500);
        }
    }

    public function eliminar_acentos($cadena)
    {

        $cadena = str_replace(
            array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
            array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
            $cadena
        );

        $cadena = str_replace(
            array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
            array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
            $cadena
        );


        $cadena = str_replace(
            array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
            array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
            $cadena
        );


        $cadena = str_replace(
            array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
            array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
            $cadena
        );


        $cadena = str_replace(
            array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
            array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
            $cadena
        );


        $cadena = str_replace(
            array('Ñ', 'ñ', 'Ç', 'ç'),
            array('N', 'n', 'C', 'c'),
            $cadena
        );

        return $cadena;
    }
}
