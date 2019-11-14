<?php
function insertAd()
{
    $db = connection();

    if (isset($_GET["adTitle"], $_GET["adDescription"], $_GET["companyName"], $_GET["publicationDate"], $_GET["tags"])) {
        $adTitle = $_GET["adTitle"];
        $adDescription = $_GET["adDescription"];
        $companyName = $_GET["companyName"];
        $publicationDate = $_GET["publicationDate"];
        $tags = $_GET["tags"];
        $adImg = $_GET["adImg"];
        $stmt = $db->prepare(
            "INSERT INTO ANUNCIO(persona_id,categoria_id,titulo,descripcion,datos_contacto,imagen,nombre_empresa,fecha_creacion)
                            VALUES('{$_SESSION["userId"]}', '$tags', '$adTitle', '$adDescription', '{$_SESSION["contactPage"]}', '$adImg','$companyName','$publicationDate');");
        $stmt->execute();

    }
    closeConnection($db);

}