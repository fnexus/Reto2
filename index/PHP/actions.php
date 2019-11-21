<?php
session_start();

if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    case "Registrarse":
        insertUser();
        break;
    case "Iniciar Sesion":
        loginUser();
        header("Location: index.php");
        break;
    case "Cerrar Sesion":
        logoutUser();
        header("Location: index.php");
        break;
    case "Borrar":
        include 'acceso_a_datos/funciones_publicar_anuncio.php';
        $id_anuncio = isset($_GET['id_anuncio']) ? $_GET['id_anuncio'] : "";
        deleteAd($id_anuncio);
        break;

}
