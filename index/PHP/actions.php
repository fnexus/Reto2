<?php
session_start();
if($_SESSION["logged"] == "true"){

}
else{
    $_SESSION["logged"] = "false";
}

if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    case "Registrarse":
        insertUser();
        break;
    case "Iniciar_Sesion":
        loginUser();
        break;
    case "Cerrar_Sesion":
        logoutUser();
        break;
    case "Guardar":
        insertAd();
        break;
}
