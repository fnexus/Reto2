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
        break;
    case "Cerrar Sesion":
        logoutUser();
        header("Location: index.php");
        break;
}
