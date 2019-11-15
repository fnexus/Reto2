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
function getComments($idAnuncio)
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


