<?php
// https://codeofaninja.com/rest-api-authentication-example-php-jwt-tutorial/
class DataBase
{

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pwd = DB_PWD;
    private $database = DB_DATABASE;
    public $conexion;

    public function conexion()
    {
        $this->conexion = false;
        try {
            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->database; charset=utf8", $this->user, $this->pwd );
        } catch (PDOException $e) {
            $this->conexion =  false;
        }

        return $this->conexion;
    }
}
