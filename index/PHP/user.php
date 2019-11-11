<?php require 'head.php';?>
<nav>
    <img src="logo.png">
    <input type="text" name="search" id="search">
    <input type="button" name="signIn" id="signIn" value="Registrarse">
    <input type="button" name="logIn" id="logIn" value="Iniciar Sesion">
</nav>
<article id="profile">
    <img src="<?php $userimg ?>">
    <p id="nickname"><?php $username ?></p>
    <p id="userUrl"><?php $userURL ?></p>
</article>
<main id="ownAds">

</main>
<?php require 'footer.php';?>