<?php require 'head.php';?>
<nav>
    <img src="logo.png">
    <input type="text" name="buscador" id="buscador">
    <input type="button" name="registrarse" id="registrarse" value="Registrarse">
    <input type="button" name="iniciarSesion" id="iniciarSesion" value="Iniciar Sesion">
</nav>
<article id="perfil">
    <img src="<?php $userimg ?>">
    <p id="username"><?php $username ?></p>
    <p id="userURL"><?php $userURL ?></p>
</article>
<main id="anunciosPropios">

</main>
<?php require 'footer.php';?>