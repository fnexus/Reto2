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
    <p><img src="<?php $userimg ?>"><p id="username"><?php $userName ?></p></p>
    <div id="like"></div>
    <div><?php $adtitle ?></div>
    <div><?php $addescription ?></div>
    <div id="comentarios">
        <p>Comentarios</p>
        <div id="comentarios">
            <?php addComments() ?>
        </div>
        <p><img src="<?php echo "<img src= '{$_userImg["img"]} '>" ?>"><input type="text" id="comentar" placeholder="escribe un comentario"></p>
    </div>
</article>
<?php require 'footer.php';?>
