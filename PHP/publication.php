<?php require 'head.php';?>
<nav>
    <img src="logo.png">
    <input type="text" name="buscador" id="buscador">
    <input type="button" name="registrarse" id="registrarse" value="Registrarse">
    <input type="button" name="iniciarSesion" id="iniciarSesion" value="Iniciar Sesion">
</nav>
<article id="anuncio">

</article>
<article id="descripcion">
    <p><img src="<?php $userimg ?>"><p id="username"><?php $username ?></p></p>
    <div id="like"></div>
    <div><?php $adtitle ?></div>
    <div><?php $addescription ?></div>
    <div id="comentarios">
        <p>Comentarios</p>
        <div id="comentarios">

        </div>
        <p><img src="<?php $userimg ?>"><input type="text" id="comentar" placeholder="escribe un comentario"></p>
    </div>
</article>
<?php require 'footer.php';?>
