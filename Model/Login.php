<?php
require_once ROOT_PATH . "/Model/Conexion.php";

class LoginModel extends Database
{
    public function getUsers($limit)
    {
        return $this->select("SELECT * FROM users ORDER BY user_id ASC LIMIT ?", ["i", $limit]);
    }
}