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

    //Codigo para evitar que se reenvie el formulario y asi poder evitar que lo introducido en el formulario se pueda insertar mas de una vez(intente hacerlo con header("Location: index.php") pero no funciona);
    echo "
    <script language='JavaScript'>
        location.href = 'http://localhost:8765/index/PHP/index.php'
    </script>";

}
function deleteAd($id_anuncio){
    include "conexion.php";
    $db = connection();

    $data = array('id_anuncio' => $id_anuncio);
    $stmt = $db->prepare("DELETE FROM ANUNCIO WHERE id = :id_anuncio");
    $stmt->execute($data);

    closeConnection($db);
}