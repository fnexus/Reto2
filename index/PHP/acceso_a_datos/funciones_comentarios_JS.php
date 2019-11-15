<?php
// lo necesita porque es independiente de los otros includes, por asi decir
// cuando se le llama, solo es a esta pagina y no a la connection etc;
include "conexion.php";
$modo = isset($_GET['modo']) ? $_GET['modo'] : "";
$id_anuncio = isset($_GET['id_anuncio']) ? $_GET['id_anuncio'] : "";
$persona_id = isset($_GET['persona_id']) ? $_GET['persona_id'] : "";
$comentario = isset($_GET['comentario']) ? $_GET['comentario'] : "";

switch ($modo) {
    case "comentarios":
        if ($id_anuncio != "") {
            echo sendComments($id_anuncio);
        }
        break;
    case "insertar_comentario":
        //echo "$modo - $id_anuncio - $persona_id - $comentario";
        echo insertComment($persona_id, $id_anuncio, $comentario);
        break;
}

/**
 * @param $idAnuncio
 * @return int
 */
function sendComments($idAnuncio)
{
    $data = array('anuncio_id' => $idAnuncio);
    $url = "SELECT p.nickname, c.descripcion, c.fecha_creacion FROM COMENTARIO c join PERSONA p WHERE c.anuncio_id = :anuncio_id AND c.persona_id = p.id";
    return getAll($data, $url);
}

/**
 * @param $idUser
 * @param $idAnuncio
 * @param $comment
 */
function insertComment($idUser, $idAnuncio, $comment)
{
    $data = array('anuncio_id' => $idAnuncio, 'persona_id' => $idUser, 'descripcion' => $comment);
    $url = "INSERT INTO COMENTARIO (anuncio_id, persona_id, descripcion) VALUES (:anuncio_id, :persona_id, :descripcion)";
    return insert($data, $url);
}


/**
 * @param $data
 * @param $url
 */
function insert($data, $url)
{
    $db = connection();
    $stmt = $db->prepare($url);
    $stmt->execute($data);
    closeConnection($db);
}

/**
 * @param $data
 * @param $url
 * @return bool|PDOStatement
 */
function getAll($data, $url)
{
    $db = connection();
    $stmt = $db->prepare($url);
    $stmt->execute($data);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    closeConnection($db);
    return json_encode($results);
}