<?php
function insertAd()
{
    $db = connection();

    if (isset($_GET["adTitle"], $_GET["adDescription"], $_GET["companyName"], $_GET["tags"])) {
        $adTitle = $_GET["adTitle"];
        $adDescription = $_GET["adDescription"];
        $companyName = $_GET["companyName"];
        $tags = $_GET["tags"];
        $adImg = $_GET["adImg"];
        $stmt = $db->prepare(
            "INSERT INTO ANUNCIO(persona_id,categoria_id,titulo,descripcion,datos_contacto,imagen,nombre_empresa)
                            VALUES('{$_SESSION["userId"]}', '$tags', '$adTitle', '$adDescription', '{$_SESSION["contactPage"]}', '$adImg','$companyName');");
        $stmt->execute();

    }
    closeConnection($db);

}