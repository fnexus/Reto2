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
    case "Iniciar Sesion":
        loginUser();
        break;
    case "Cerrar Sesion":
        logoutUser();
        header("Location: index.php");
        break;
}
