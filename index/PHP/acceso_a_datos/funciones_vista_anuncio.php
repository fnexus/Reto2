<?php

/**
 * @param $db
 * @param $id
 * @return mixed
 */
function getImage($id)
{
    $db = connection();
    $stmt = $db->prepare("SELECT imagen FROM ANUNCIO WHERE id = :id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch();
    closeConnection($db);
    return $row['imagen'];
}

/**
 * @param $db
 * @param $idAnuncio
 * @return mixed
 */
function getAdvertisementData($idAnuncio)
{
    $db = connection();
    $stmt = $db->prepare("SELECT * FROM ANUNCIO WHERE id = :id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(":id", $idAnuncio, PDO::PARAM_INT);
    $stmt->execute();

    // En este caso $resultado será un array asociativo con todos los datos de la base de datos
    $resultado = $stmt->fetchAll();
    closeConnection($db);
    return $resultado;
}

/**
 * @param $db
 * @param $idPersona
 * @return mixed
 */
function getUserData($idPersona)
{
    $db = connection();
    $stmt = $db->prepare("SELECT * FROM PERSONA WHERE id = :id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(":id", $idPersona, PDO::PARAM_INT);
    $stmt->execute();

    $resultado = $stmt->fetchAll();
    //print_r($resultado);
    closeConnection($db);
    return $resultado;
}

/**
 * @param $idAnuncio
 * @return array
 */
function addComments($idAnuncio)
{
    $db = connection();
    $stmt = $db->prepare("SELECT p.foto_perfil, p.id, p.nickname, c.fecha_creacion, c.descripcion FROM COMENTARIO c, PERSONA p WHERE p.id=c.persona_id AND c.anuncio_id = :id");
    $stmt->bindParam(":id", $idAnuncio, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultado = $stmt->fetchAll();
    //print_r($resultado);

    closeConnection($db);
    return $resultado;
}



/*
function addDetails($idAnuncio) {
    $arrayAssocAnuncio = getAdvertisementData($idAnuncio);
    $arrayAssocUser = getUserData($arrayAssocAnuncio[0]['persona_id']);
    $arrayAssocComments = addComments($idAnuncio);

    //valor del id_usuario  COGER EL ID USUARIO NO DEL DEL PROPIO ANUNCIO, sino del SESSION id del usuario conectado
    echo '<input type="text" value="' . $_SESSION['userId'] . '" id="vista_anuncio_persona_id" name="persona_id" hidden>';

    //echo datos usuario
    echo '<p>DATOS USUARIO<p>';
    echo '<img src="' . $arrayAssocUser[0]['foto_perfil'] . '">';
    echo '<br>';
    echo $arrayAssocUser[0]['nickname'];
    echo '<br><br>';

    //echo datos anuncio
    echo '<p>DATOS ANUNCIO<p>';
    echo $arrayAssocAnuncio[0]['titulo'];
    echo '<br>';
    echo $arrayAssocAnuncio[0]['descripcion'];
    echo '<br>';
    echo $arrayAssocAnuncio[0]['nombre_empresa'];
    echo '<br>';
    echo $arrayAssocAnuncio[0]['fecha_creacion'];
    echo '<br><br>';
}*/

/**
 * Coge el id del anuncio y luego devuelve una persona entera
 * @param $anuncio_id
 * @return objeto persona
 */
function getPersonaByIdFromAnuncio($anuncio_id)
{
    // array asociativo para la query
    $anuncio = array("id" => $anuncio_id);
    // conectar a base de datos
    $db = connection();
    $stmt = $db->prepare("SELECT persona_id FROM ANUNCIO WHERE id = :id ");
    $stmt->execute($anuncio);
    // devolver un objeto
    $result = $stmt->fetch(PDO::FETCH_OBJ);

    $persona = array("id" => $result->persona_id);
    $stmt = $db->prepare("SELECT * FROM PERSONA WHERE id = :id ");
    $stmt->execute($persona);
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    closeConnection($db);
    return $result;
}

/**
 * @param $persona_id
 * @return objeto con los datos del anuncio
 */
function getAnuncioById($anuncio_id)
{
    // array asociativo para la query
    $persona = array("id" => $anuncio_id);
    // conectar a base de datos
    $db = connection();
    $stmt = $db->prepare("SELECT * FROM ANUNCIO WHERE id = :id ");
    $stmt->execute($persona);
    // devolver un objeto
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
}

/**
 * @param $variable
 * @param $queLlenar
 */
function fillAnuncio($variable, $queLlenar)
{
    switch ($queLlenar) {
        case "enlace_a_su_perfil":
            echo "vista_perfil.php?persona_id={$_SESSION['userId']}&anunciante_id={$variable->id}";
            break;
        case "persona_imagen":
            echo $variable->foto_perfil;
            break;
        case "persona_nickname":
            echo $variable->nickname;
            break;
        case "anuncio_titulo":
            echo $variable->titulo;
            break;
        case "anuncio_descripcion":
            echo $variable->descripcion;
            break;
        case "anuncio_nombre_empresa":
            echo $variable->nombre_empresa;
            break;
        case "anuncio_fecha":
            echo $variable->fecha_creacion;
            break;
        case "anuncio_imagen":
            echo $variable->imagen;
            break;
        case "datos_contacto":
            echo $variable->datos_contacto;
            break;
    }
}

