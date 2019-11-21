<?php
require ('../PHPMailer/PHPMailerAutoload.php');
require '../sendEmails.php';
// lo necesita porque es independiente de los otros includes, por asi decir
// cuando se le llama, solo es a esta pagina y no a la connection etc;
include "conexion.php";
$modo = isset($_GET['modo']) ? $_GET['modo'] : "";
$id_anuncio = isset($_GET['id_anuncio']) ? $_GET['id_anuncio'] : "";
$persona_id = isset($_GET['persona_id']) ? $_GET['persona_id'] : "";
$comentario = isset($_GET['comentario']) ? $_GET['comentario'] : "";
$idComentario = isset($_GET['id_comentario']) ? $_GET['id_comentario'] : "";

switch ($modo) {
    case "comentarios":
        if ($id_anuncio != "") {
            echo sendComments($id_anuncio);
        }
        break;
    case "insertar_comentario":
        insertComment($persona_id, $id_anuncio, $comentario);
        sendEmail(getUserEmail($id_anuncio));
        break;
    case "borrar_comentario":
        if ($idComentario != "") {
            deleteComment($idComentario);
        }
        break;
}

function getUserEmail($idAnuncio)
{

    $db = connection();
    $data = array('anuncio_id' => $idAnuncio);
    $stmt = $db->prepare("SELECT p.email FROM PERSONA p join ANUNCIO a ON a.persona_id = p.id WHERE a.id = :anuncio_id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute($data);

    // En este caso $resultado será un array asociativo con email
    $resultado = $stmt->fetchAll();
    echo $resultado[0]['email'];
    closeConnection($db);
    return $resultado[0]['email'];
}

/**
 * @param $idAnuncio
 * @return int
 */
function sendComments($idAnuncio)
{
    $data = array('anuncio_id' => $idAnuncio);
    $url = "SELECT p.nickname, c.descripcion, c.fecha_creacion, c.persona_id, c.id FROM COMENTARIO c join PERSONA p WHERE c.anuncio_id = :anuncio_id AND c.persona_id = p.id";
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
    query($data, $url);
}

/**
 * @param $idComment
 */
function deleteComment($idComment)
{
    $data = array('id_comentario' => $idComment);
    $url = "DELETE FROM COMENTARIO WHERE id = :id_comentario";
    query($data, $url);
}

/**
 * @param $data
 * @param $url
 */
function query($data, $url)
{
    $db = connection();
    $stmt = $db->prepare($url);
    $stmt->execute($data);
    closeConnection($db);
    return $stmt;
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