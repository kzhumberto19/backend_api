<?php

/**
 * Valida roles y permisos del usuario
 *
 * @param  mixed $rol_id
 * @return array
 */
function permisos($rol_id)
{
    global $conexion;
    $response = array('num' => 2, 'msj' => null, 'data' => array());
    $permi = array();
    $query = "SELECT 
        r.id                AS id,
        r.rol_description   AS rol,
        p.per_description   AS permissions 
    FROM permission_role pr
    INNER JOIN permissions p ON p.id = pr.permission_id
    INNER JOIN roles r ON r.id = pr.role_id
    WHERE r.id = $rol_id
    ORDER BY r.id";
    $resultado  = $conexion->query($query);
    while ($fila = mysqli_fetch_assoc($resultado)) 
    {
        array_push( $permi, $fila['permissions']);
    }

    if( $permi ){
        $response['num'] = 1;
        $response['data'] = $permi;
    }
    return $response;

}
/**
 * Verificamos si existe el correo
 *
 * @param  string $correo
 * @return array
 */
function verificar_correo($correo)
{
    global $conexion;
    $response = array('num' => 2, 'msj' => null, 'data' => null);
    $correo = htmlspecialchars(strip_tags($correo));
    $query = "SELECT 
    id,
    firstname,
    lastname,
    email,
    password,
    pr_id as rol
    FROM users WHERE LOWER(email) = LOWER('$correo')";
    $resultado  = $conexion->query($query);
    while ($fila = mysqli_fetch_assoc($resultado)) 
    {
        $response['num'] = 1;
        $response['data'] = $fila;
    }
    return $response;
}

/**
 * Funcion para crear los posts
 *
 * @param  string $title
 * @param  string $description
 * @param  id $id_user
 * @return array
 */
function create_user( $firstname , $lastname, $email , $password, $rol )
{
    
    global $conexion;
    mysqli_autocommit($conexion, false);
    $response = array('num' => 2, 'msj' => null, 'data' => null );
    $datos = array();

    $firstname  = htmlspecialchars(strip_tags($firstname));
    $lastname   = htmlspecialchars(strip_tags($lastname));
    $email      = htmlspecialchars(strip_tags($email));
    $password   = htmlspecialchars(strip_tags($password));
    $rol        = htmlspecialchars(strip_tags($rol));
    $email      = strtolower( $email );

    $pwd_hash = password_hash($password, PASSWORD_DEFAULT);
	$datos = array(
		'firstname' 	=> $firstname,
		'lastname' 	    => $lastname,
		'email' 		=> $email,
		'password' 		=> $pwd_hash,
		'pr_id' 		=> $rol,
	);

    $query = insert('users', $datos);
    $resultado  = $conexion->query($query);
    if($resultado) 
    {
        $response['num'] = 1;
        $response['msj'] = 'Correcto';
    } 
    else 
    {
        $response['num'] = 2;
        $response['msj'] = 'No se pudo crear el usuario.';
    }

    if ($response['num'] == 1) 
		mysqli_commit($conexion);

    return $response;

}

/**
 * Funcion para crear los posts
 *
 * @param  string $title
 * @param  string $description
 * @param  id $id_user
 * @return array
 */
function create_post( $title , $description , $id_user )
{
    
    global $conexion;
    mysqli_autocommit($conexion, false);
    $response = array('num' => 2, 'msj' => null, 'data' => null );
    $datos = array();

	$datos = array(
		'title' 		=> $title,
		'description' 	=> $description,
		'create_at' 	=> date('Y-m-d H:i:s'),
		'id_user' 		=> $id_user,
	);

    $query = insert('post', $datos);
    $resultado  = $conexion->query($query);
    if($resultado) 
    {
        $response['num'] = 1;
        $response['msj'] = 'Correcto';
    } 
    else 
    {
        $response['num'] = 2;
        $response['msj'] = 'No se pudo crear post.';
    }

    if ($response['num'] == 1) 
		mysqli_commit($conexion);

    return $response;

}

/**
 * Funcion para actualizar los posts
 *
 * @param  string $title
 * @param  string $description
 * @param  id $id_post
 * @return array
 */
function update_post( $title , $description , $id_post )
{
    
    global $conexion;
    mysqli_autocommit($conexion, false);
    $response = array('num' => 2, 'msj' => null, 'data' => null );
    $datos = array();

	$datos = array(
		'title' 		=> $title,
		'description' 	=> $description,
	);

    $query = update('post',$datos,"id = $id_post");
    // echo json_encode($query);
    // die;
    $resultado  = $conexion->query($query);
    if($resultado) 
    {
        $response['num'] = 1;
        $response['msj'] = 'Correcto';
    } 
    else 
    {
        $response['num'] = 2;
        $response['msj'] = 'No se pudo actualizar el post.';
    }

    if ($response['num'] == 1) 
		mysqli_commit($conexion);

    return $response;

}

/**
 * Funcion para eliminar los posts
 *
 * @param  string $title
 * @param  string $description
 * @param  id $id_post
 * @return array
 */
function delete_post( $id )
{
    
    global $conexion;
    mysqli_autocommit($conexion, false);
    $response = array('num' => 2, 'msj' => null, 'data' => null );

    $query = delete('post','id',$id);
    $resultado  = $conexion->query($query);
    // echo json_encode($query);
    // die;
    if($resultado) 
    {
        $response['num'] = 1;
        $response['msj'] = 'Correcto';
    } 
    else 
    {
        $response['num'] = 2;
        $response['msj'] = 'No se pudo eliminar el post.';
    }

    if ($response['num'] == 1) 
		mysqli_commit($conexion);

    return $response;

}

/**
 * Muestra todos los posts
 *
 * @return array
 */
function posts()
{
    global $conexion;
    $response = array('num' => 2, 'msj' => null, 'data' => array());
    $posts = array();
    $query = "SELECT 
    p.id                                    AS id,
    p.title                                 AS title,
    p.description                           AS description,
    p.create_at                             AS create_at,
    CONCAT( u.firstname, ' ', u.lastname )  AS name,
    r.rol_description                       AS rol
    FROM post p
    INNER JOIN users u ON u.id = p.id_user
    INNER JOIN roles r ON r.id = u.pr_id
    ORDER BY p.create_at desc";
    $resultado  = $conexion->query($query);
    while ($fila = mysqli_fetch_assoc($resultado)) 
    {
        array_push( $posts, $fila);
    }

    if( $posts ){
        $response['num'] = 1;
        $response['data'] = $posts;
    }
    return $response;

}

/**
 * Ver detalles del post
 *
 * @param  string $id_post
 * @return array
 */
function show_post($id_post)
{
    global $conexion;
    $response = array('num' => 2, 'msj' => null, 'data' => array());
    $post = array();
    $query = "SELECT 
    p.title                                 AS title,
    p.description                           AS description,
    p.create_at                             AS create_at,
    CONCAT( u.firstname, ' ', u.lastname )  AS name,
    r.rol_description                       AS rol
    FROM post p
    INNER JOIN users u ON u.id = p.id_user
    INNER JOIN roles r ON r.id = u.pr_id
    WHERE p.id = $id_post
    ORDER BY p.create_at desc";
    $resultado  = $conexion->query($query);
    while ($fila = mysqli_fetch_assoc($resultado)) 
    {
        array_push( $post, $fila);
    }

    if( $post ){
        $response['num'] = 1;
        $response['data'] = $post;
    }
    return $response;

}
