<?php
/**
 * Valida si los campos estan vacios
 *
 * @param  mixed $datos
 * @return void
 */
function validar_datos($datos)
{
    $b = true;
    foreach ($datos as $key => $value) {
        if( !$value ){
            $b = false;
        }
    }
    return $b;
}
/**
 * Nos permite eliminar registros $tabla es el nombre de la tabla donde
 * vamos a eliminar, $datos las condiciones a eliminar
 *
 * @param  string $table
 * @param  string $datos
 * @param  string $clave
 * @return void
 */
function delete($table, $datos, $clave)
{
    $query = "delete from " . $table . " where " . $datos . "=" . $clave . "";
    return $query;
}
/**
 * Nos permite insertar registros donde $tabla es el nombre de la tabla donde
 * vamos a registrar
 * $datos es el arreglo de los campos.
 *
 * @param  string $tabla
 * @param  array $datos
 * @return void
 */
function insert($tabla, $datos)
{
    $query    = "insert into $tabla ( ";
    $columnas = "";
    $valores  = "";
    foreach ($datos as $campo => $valor) {
        $columnas .= $campo . ",";
        $valores .= "'" . $valor . "',";
    }
    $columnas = substr($columnas, 0, -1);
    $valores  = substr($valores, 0, -1);

    $query .= $columnas . ") values (" . $valores . ");";
    return $query;
}
/**
 * Nos permite actualizar donde $tabla es el nombre de la tabla donde 
 * vamos actualizar , $datos es el arreglo de los datos a actualizar
 * $where las condiciones.
 *
 * @param  mixed $tabla
 * @param  mixed $datos
 * @param  mixed $where
 * @return void
 */
function update($tabla, $datos, $where)
{
    $columnas = array();

    foreach ($datos as $key => $valor) {
        $columnas[] = "$key = '" . $valor . "'";
    }
    $query = "UPDATE $tabla SET " . implode(', ', $columnas) . " WHERE $where";

    return $query;
}


/**
 * Valida los permisos necesarios para consumir las APIS
 *
 * @param  string $accion
 * @param  array $permisos
 * @return void
 */
function validar_permisos( $accion , $permisos )
{
    $response = array( 'num' => 1 , 'message' => 'Permisos correctos.' );
    switch ($accion) {
        case 'crear':
            if(!crear($permisos))
            {
                $response['num'] = 2;
                $response['message'] = 'No cuentas con los permisos necesarios para crear.';
            }
            break;
        case 'eliminar':
            if(!eliminar($permisos))
            {
                $response['num'] = 2;
                $response['message'] = 'No cuentas con los permisos necesarios para eliminar.';
            }
            break;
        case 'actualizar':
            if(!actualizar($permisos))
            {
                $response['num'] = 2;
                $response['message'] = 'No cuentas con los permisos necesarios para actualizar.';
            } 
            break;
        case 'consultar':
            if(!consultar($permisos))
            {
                $response['num'] = 2;
                $response['message'] = 'No cuentas con los permisos necesarios para consultar.';
            }
            break;
        case 'accesar':
            if(!accesar($permisos))
            {
                $response['num'] = 2;
                $response['message'] = 'No cuentas con los permisos necesarios para accesar.';
            }
            break;
    }

    if( $permisos == null ){
        $response['num'] = 2;
        $response['message'] = 'No tienes permisos asignados.';
    }
    return $response;

}
/**
 * permisos para crear usuarios
 *
 * @param  array $permisos
 * @return void
 */
function crear($permisos) 
{
    if(in_array('create',$permisos))
        return true;
    else
        return false;
}

/**
 * permisos para accesar
 *
 * @param  array $permisos
 * @return void
 */
function accesar($permisos) 
{
    if(in_array('login',$permisos))
        return true;
    else
        return false;
}

/**
 * permisos para eliminar
 *
 * @param  array $permisos
 * @return void
 */
function eliminar($permisos) 
{
    if(in_array('delete', $permisos))
        return true;
    else
        return false;
}

/**
 * permisos para actualizar
 *
 * @param  array $permisos
 * @return void
 */
function actualizar($permisos) 
{
    if(in_array('update', $permisos))
        return true;
    else
        return false;
}

/**
 * permisos para consultar
 *
 * @param  array $permisos
 * @return void
 */
function consultar($permisos) 
{
    if(in_array('read', $permisos))
        return true;
    else
        return false;
}

/**
 * permisos para administrador total
 *
 * @param  array $permisos
 * @return void
 */
function total($permisos) 
{
    if(in_array('total', $permisos))
        return true;
    else
        return false;
}

/**
 * Funcion para capturar variables
 *
 * @param  mixed $result variable por referencia
 * @param  mixed $var
 * @param  mixed $type
 * @param  mixed $multibyte
 * @return void
 */
function set_var( &$result, $var, $type, $multibyte = true )
{
    settype($var, $type);
    $result = $var;

    if ($type == 'string')
    {
        $result = trim(htmlspecialchars(str_replace(array("\r\n", "\r", "\0"), array("\n", "\n", ''), $result), ENT_COMPAT, 'UTF-8'));

        if (!empty($result))
        {
            if ($multibyte)
            {
                if (!preg_match('/^./u', $result))
                {
                    $result = '';
                }
            }
            else
            {
                $result = preg_replace('/[\x80-\xFF]/', '?', $result);
            }
        }

        $result = (true) ? stripslashes($result) : $result;
    }
}

function request_var($var_name, $default, $multibyte = true, $cookie = false)
{
    if (!$cookie && isset($_COOKIE[$var_name]))
    {
        if (!isset($_GET[$var_name]) && !isset($_POST[$var_name]))
        {
            return (is_array($default)) ? array() : $default;
        }
        $_REQUEST[$var_name] = isset($_POST[$var_name]) ? $_POST[$var_name] : $_GET[$var_name];
    }

    $super_global = ($cookie) ? '_COOKIE' : '_REQUEST';
    if (!isset($GLOBALS[$super_global][$var_name]) || is_array($GLOBALS[$super_global][$var_name]) != is_array($default))
    {
        return (is_array($default)) ? array() : $default;
    }

    $var = $GLOBALS[$super_global][$var_name];
    if (!is_array($default))
    {
        $type = gettype($default);
    }
    else
    {
        $key_type	= null;
        $type		= null;
        // list($key_type, $type) = each($default); Se cambio por un foreach
        foreach( $default as $_key_type => $_type )
        {
            $key_type	= $_key_type;
            $type		= $_type;
            break;
        }
        
        $type = gettype($type);
        $key_type = gettype($key_type);
        if ($type == 'array')
        {
            reset($default);
            $default = current($default);
            
            // list($sub_key_type, $sub_type) = each($default); Se cambio por un foreach
            foreach( $default as $_sub_key_type => $_sub_type )
            {
                $sub_key_type	= $_sub_key_type;
                $sub_type		= $_sub_type;
                break;
            }
            
            $sub_type = gettype($sub_type);
            $sub_type = ($sub_type == 'array') ? 'NULL' : $sub_type;
            $sub_key_type = gettype($sub_key_type);
        }
    }

    if (is_array($var))
    {
        $_var = $var;
        $var = array();

        foreach ($_var as $k => $v)
        {
            set_var($k, $k, $key_type);
            if ($type == 'array' && is_array($v))
            {
                foreach ($v as $_k => $_v)
                {
                    if (is_array($_v))
                    {
                        $_v = null;
                    }
                    set_var($_k, $_k, $sub_key_type, $multibyte);
                    set_var($var[$k][$_k], $_v, $sub_type, $multibyte);
                }
            }
            else
            {
                if ($type == 'array' || is_array($v))
                {
                    $v = null;
                }
                set_var($var[$k], $v, $type, $multibyte);
            }
        }
    }
    else
    {
        set_var($var, $var, $type, $multibyte);
    }

    return $var;
}