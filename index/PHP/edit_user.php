<?php
    $arrayUser = getUserData($_SESSION["userId"]);
?>
<form action="vista_perfil.php?persona_id=<?= $_SESSION["userId"] ?>" method="post" id="edit-user-form">
    <div><img src="<?= $arrayUser[0]['imagen_banner'] ?>" alt="banner"></div>
    <img src="<?= $arrayUser[0]['foto_perfil'] ?>" alt="foto-perfil">
    <p>
        <label for="edit-nickname">Nickname</label>
        <input type="text" name="nickname" id="edit-nickname" value="<?= $arrayUser[0]['nickname'] ?>">
    </p>
    <p>
        <label for="edit-password">Password</label>
        <input type="password" name="password" id="edit-password" value="<?= $arrayUser[0]['password'] ?>">
    </p>
    <p>
        <label for="edit-contacto">Website</label>
        <input type="text" name="pagina-contacto" id="edit-contacto" value="<?= $arrayUser[0]['pagina_contacto'] ?>">
    </p>
    <button>Guardar Datos</button>
</form>