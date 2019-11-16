<!DOCTYPE html>
<html lang="es">
<head>
    <title>FNEXUS</title>
    <!--Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon2.png"/>

    <!-- Libreria iconos social media footer-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400&display=swap" rel="stylesheet">

    <!-- estilos CSS-->
    <link href="../CSS/estilos.css" type="text/css" rel="stylesheet">

    <!-- archivos JavaScript-->
    <script src="../JS/jquery-3.4.1.min.js"></script>
    <script src="../JS/main.js"></script>

    <script src="../JS/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="../JS/jquery.modal.min.css" />



    <!-- includes php datos-->
    <?php
    include 'acceso_a_datos/conexion.php';
    include 'acceso_a_datos/funciones_index.php';
    include 'acceso_a_datos/funciones_vista_anuncio.php';
    include 'acceso_a_datos/funciones_vista_perfil.php';
    include 'acceso_a_datos/funciones_publicar_anuncio.php';
    require 'actions.php';
    ?>

</head>
<body>

<!-- Barra de navegacion -->
<?php
require 'barra_nav_principal.php'
?>

