<?php
    $arrayUser = getUserData($_SESSION["userId"]);
?>

<form action="vista_perfil.php?persona_id=<?= $_SESSION["userId"] ?>" method="post" id="edit-profile" class="modal">
    <div>
        <div><img src="<?= $arrayUser[0]['imagen_banner'] ?>" alt="banner"></div>
        <img src="<?= $arrayUser[0]['foto_perfil'] ?>" alt="foto-perfil">
    </div>
    <div>
        <label for="edit-nickname" class="inp">
            <input type="text" name="nickname" id="edit-nickname" class="input" placeholder="&nbsp;">

            <span class="label"><p>NICKNAME</p><?= $arrayUser[0]['nickname'] ?></span>
            <span class="border"></span>
        </label>
    </div>
    <div>
        <label for="edit-password" class="inp">
            <input type="password" name="password" id="edit-password" class="input" placeholder="&nbsp;">
            <span class="label"><p>CONTRASEÑA</p><?= $arrayUser[0]['password'] ?></span>
            <span class="border"></span>
        </label>
    </div>
    <div>
        <label for="edit-contacto" class="inp">
            <input type="text" name="pagina-contacto" id="edit-contacto" class="input" placeholder="&nbsp;">
            <span class="label"><p>PAGINA DE CONTACTO</p><?= $arrayUser[0]['pagina_contacto'] ?></span>
            <span class="border"></span>
        </label>
    </div>
    <button class="button">Guardar Datos</button>
</form>