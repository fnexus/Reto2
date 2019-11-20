<?php
function insertAd($idUser, $adTitle, $adDescription, $companyName, $tags)
{
    $db = connection();
    $url_basica = "../img/imagenes_usuarios/";

    $url_imagen_anuncio = null;
    if (isset($_FILES) && isset($_FILES['subida_imagen_anuncio']) && !empty($_FILES['subida_imagen_anuncio']['name'] && !empty($_FILES['subida_imagen_anuncio']['tmp_name']))) {
        $url_imagen_anuncio = validateAndUploadImage($url_basica, $idUser, "subida_imagen_anuncio", "Anuncio", $adTitle . $companyName . random_int(PHP_INT_MIN, PHP_INT_MAX)); // evitar sobreescribir
    } else {
        $url_imagen_anuncio = "../img/imagenes_usuarios/defaultAnuncio.png";
    }

    //columna => clave
    $data = array('persona_id' => $idUser, 'categoria_id' => $tags, 'titulo' => $adTitle, 'descripcion' => $adDescription, 'datos_contacto' => $_SESSION["contactPage"], 'imagen' => $url_imagen_anuncio, 'nombre_empresa' => $companyName);
    $select = "INSERT INTO ANUNCIO (persona_id, categoria_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa)
                VALUES (:persona_id, :categoria_id, :titulo, :descripcion, :datos_contacto, :imagen, :nombre_empresa)";

    $stmt = $db->prepare($select);
    $stmt->execute($data);

    closeConnection($db);

    //Codigo para evitar que se reenvie el formulario y asi poder evitar que lo introducido en el formulario se pueda insertar mas de una vez(intente hacerlo con header("Location: index.php") pero no funciona);
    echo "
      <script language='JavaScript'>
          location.href = 'http://localhost:8765/index/PHP/index.php';
      </script>";

}

function deleteAd($id_anuncio)
{
    include "conexion.php";
    $db = connection();

    $data = array('id_anuncio' => $id_anuncio);
    $stmt = $db->prepare("DELETE FROM ANUNCIO WHERE id = :id_anuncio");
    $stmt->execute($data);

    closeConnection($db);
}