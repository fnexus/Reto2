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
function addComments($db, $idAnuncio)
{
    // conectar a base de datos
    $dbh = connection();
    $stmt = $db->prepare("SELECT p.foto_perfil, c.fecha_creacion, p.id, p.nickname, c.descripcion FROM COMENTARIO c, PERSONA p WHERE p.id=c.persona_id AND c.anuncio_id = :id");
    $stmt->bindParam(":id", $idAnuncio, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    /*$row = $stmt->fetchAll();
    print_r($row);*/

    while ($row = $stmt->fetch()) {
        //rellenar caja con los comentarios que hay en la base de datos
        echo "<div class='comment'>    
                <p><img src=$row->foto_perfil>$row->nickname </p> 
                <p>$row->descripcion</p>    
                <p>$row->fecha_creacion</p>  
            </div>";
    }
    //cerrar la conexion a base de datos
    closeConnection($dbh);
}
/*function calculateLikes(){
    // conectar a base de datos
    $dbh = connection();
    $stmt = $dbh->prepare("SELECT COUNT(*) FROM LIKES WHERE P.ID=C.PERSONA_ID");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_OBJ);

    while ($row = $stmt->fetch()) {
        //rellenar caja con los comentarios que hay en la base de datos
        echo "<div class='comment'>
                <img src=$row->foto_perfil><p>$row->nickname</p>
                <p>$row->descripcion</p>
                <p>$row->fecha_creacion</p>
            </div>";
    }
    //cerrar la conexion a base de datos
    closeConnection($dbh);
}*/
?>