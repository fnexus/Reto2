<!DOCTYPE html>
<html lang="es">
<head>
    <title>FNEXUS</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
    <!-- estilos CSS-->
    <link href="../CSS/estilos.css" type="text/css" rel="stylesheet">

    <!-- archivos JavaScript-->
    <script src="../JS/main.js"></script>
    <script src="../JS/jquery-3.4.1.min.js"></script>

    <!-- includes php datos-->
    <?php
    include 'acceso_a_datos/conexion.php';
    include 'acceso_a_datos/funciones_index.php';
    ?>

</head>
<body>

<!-- Barra de navegacion -->
<?php
require 'barra_nav_principal.php'
?>
<?php require 'dbh.php'; ?>