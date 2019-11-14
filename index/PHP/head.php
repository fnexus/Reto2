<!DOCTYPE html>
<html lang="es">
<head>
    <title>FNEXUS</title>

    <!-- estilos CSS-->
    <link href="../CSS/estilos.css" type="text/css" rel="stylesheet">

    <!-- archivos JavaScript-->
    <script src="../JS/main.js"></script>
    <script src="../JS/jquery-3.4.1.min.js"></script>

    <!-- includes php datos-->
    <?php
    include 'acceso_a_datos/conexion.php';
    include 'acceso_a_datos/funciones_index.php';
    include 'acceso_a_datos/funciones_vista_anuncio.php';
    include 'acceso_a_datos/funciones_vista_perfil.php';
    include 'acceso_a_datos/funciones_publicar_anuncio.php';
    ?>

</head>
<body onload="logged()">

<!-- Barra de navegacion -->
<?php
require 'barra_nav_principal.php'
?>

