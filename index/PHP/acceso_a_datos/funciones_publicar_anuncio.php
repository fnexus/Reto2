<?php

function insertAd()
{
    $db = connection();

    $adTitle = $_POST["adTitle"];
    $adDescription = $_POST["adDescription"];
    $companyName = $_POST["companyName"];
    $tags = $_POST["tags"];
    $adImg = $_POST["adImg"];
    $stmt = $db->prepare(
        "INSERT INTO ANUNCIO(persona_id,categoria_id,titulo,descripcion,datos_contacto,imagen,nombre_empresa)
                        VALUES('{$_SESSION["userId"]}', '$tags', '$adTitle', '$adDescription', '{$_SESSION["contactPage"]}', '$adImg','$companyName');");
    $stmt->execute();

    closeConnection($db);

}
function deleteAd($id_anuncio){
   $db = connection();

    $data = array('id_anuncio' => $id_anuncio);
    $url = "DELETE FROM ANUNCIO WHERE id = :id_anuncio";
    query($data, $url);

    closeConnection($db);
}