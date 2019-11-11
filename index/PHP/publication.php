<?php require 'head.php';?>
<nav>
    <img src="logo.png">
    <input type="text" name="search" id="search">
    <input type="button" name="signIn" id="signIn" value="Registrarse">
    <input type="button" name="logIn" id="logIn" value="Iniciar Sesion">
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
