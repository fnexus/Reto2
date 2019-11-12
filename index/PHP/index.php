<?php require 'head.php';?>
<nav>
    <img src="logo.png">
    <input type="text" name="search" id="search">
    <input type="button" name="signIn" id="signIn" value="Registrarse" onclick="SignIn()">
    <input type="button" name="logIn" id="logIn" value="Iniciar Sesion" onclick="LogIn()">
</nav>
<?php
    if(isset($_GET["action"])) {
        $action = $_GET["action"];
    }
    switch($action){
        case "Registrarse":
            insertUser();
        break;
        case "Iniciar Sesion":
            loginUser();
            break;
    }
?>
<div id="contenedor-formulario"></div>
<article id="tags">

    <nav>
        <!--        <img src="../img/FNEXUS-logo.jpg">-->
        <input type="text" name="search" id="search">
        <input type="button" name="signIn" id="signIn" value="Registrarse">
        <input type="button" name="logIn" id="logIn" value="Iniciar Sesion">
    </nav>
    <div id="contenedor-formulario"></div>
    <article id="tags_container">
        <?= add_categorias_bar() ?>
    </article>
    <main id="ads_container">
        <?= add_ads() ?>
    </main>
<?php require 'footer.php'; ?>