<?php
// lo necesita porque es independiente de los otros includes, por asi decir
// cuando se le llama, solo es a esta pagina y no a la connection etc;
include "conexion.php";
$modo = isset($_GET['modo']) ? $_GET['modo'] : "";
$id_anuncio = isset($_GET['id_anuncio']) ? $_GET['id_anuncio'] : "";
$persona_id = isset($_GET['persona_id']) ? $_GET['persona_id'] : "";

switch ($modo) {
    case "anuncio":
        if ($id_anuncio != "") {
            echo calculateLikes($id_anuncio);
        }
        break;
    case "persona":
        if ($persona_id != "" && $id_anuncio != "") {
            echo checkLike($persona_id, $id_anuncio);
        }
        break;
    case "quitar":
        if ($persona_id != "" && $id_anuncio != "") {
            echo disslike($persona_id, $id_anuncio);
        }
        break;
    case "dar":
        if ($persona_id != "" && $id_anuncio != "") {
            echo like($persona_id, $id_anuncio);
        }
        break;
}


/**
 * @param $id_anuncio
 * @return int
 */
function calculateLikes($id_anuncio)
{
    $data = array("id" => $id_anuncio);
    $url = "SELECT COUNT(*) as total FROM LIKES WHERE anuncio_id = :id";
    return theCall($data, $url);
}

/**
 * @param $persona_id
 * @param $anuncio_id
 * @return int
 */
function checkLike($persona_id, $anuncio_id)
{
    $data = array("persona_id" => $persona_id, "anuncio_id" => $anuncio_id);
    $url = "SELECT COUNT(*) as total FROM LIKES WHERE anuncio_id = :anuncio_id AND persona_id = :persona_id";
    return theCall($data, $url);
}

/**
 * @param $persona_id
 * @param $anuncio_id
 * @return int
 */
function like($persona_id, $anuncio_id)
{
    $data = array("persona_id" => $persona_id, "anuncio_id" => $anuncio_id);
    $url = "INSERT INTO LIKES (persona_id, anuncio_id) VALUES (:persona_id, :anuncio_id)";
    return theCall($data, $url);
}

/**
 * @param $persona_id
 * @param $anuncio_id
 * @return int
 */
function disslike($persona_id, $anuncio_id)
{
    $data = array("persona_id" => $persona_id, "anuncio_id" => $anuncio_id);

    $url = "DELETE FROM LIKES WHERE persona_id = :persona_id AND anuncio_id = :anuncio_id";
    return theCall($data, $url);
}

/**
 * @param $data
 * @param $url
 * @return int
 */
function theCall($data, $url)
{
    $db = connection();
    $stmt = $db->prepare($url);
    $stmt->execute($data);
    $stmt->setFetchMode(2);
    $total = 0;
    while ($row = $stmt->fetch()) {
        $total = $row['total'];
    }
    closeConnection($db);
    return $total;
}

?>
