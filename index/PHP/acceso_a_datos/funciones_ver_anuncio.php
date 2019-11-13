<?php

/**
 * @param $db
 * @param $id
 * @return mixed
 */
function getImage($db, $id)
{
    $stmt = $db->prepare("SELECT imagen FROM ANUNCIO WHERE id = :id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch();
    return $row['imagen'];
}

/**
 * @param $db
 * @param $idAnuncio
 * @return mixed
 */
function getAdvertisementData($db, $idAnuncio)
{
    $stmt = $db->prepare("SELECT * FROM ANUNCIO WHERE id = :id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(":id", $idAnuncio, PDO::PARAM_INT);
    $stmt->execute();

    // En este caso $resultado será un array asociativo con todos los datos de la base de datos
    $resultado = $stmt->fetchAll();
    return $resultado;
}

/**
 * @param $db
 * @param $idPersona
 * @return mixed
 */
function getUserData($db, $idPersona)
{
    $stmt = $db->prepare("SELECT * FROM PERSONA WHERE id = :id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(":id", $idPersona, PDO::PARAM_INT);
    $stmt->execute();

    $resultado = $stmt->fetchAll();
    print_r($resultado);

    return $resultado;
}

?>