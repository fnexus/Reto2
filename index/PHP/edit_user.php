<?php
$arrayUser = getUserData($_SESSION["userId"]);
?>

<form action="vista_perfil.php?persona_id=<?= $_SESSION["userId"] ?>" method="post" id="edit-profile" class="modal"
      enctype="multipart/form-data">
    <div>
        <img src="<?= $arrayUser[0]['imagen_banner'] ?>" alt="banner">
        <p>Cambiar fondo de perfil </p>
        <input type="file" name="subida_imagen_banner" accept="image/*" id="nuevo_fondo">
    </div>
    <div>
        <img src="<?= $arrayUser[0]['foto_perfil'] ?>" alt="foto-perfil">
        <p>Cambiar foto de perfil </p>
        <input type="file" name="subida_foto_perfil" accept="image/*" id="nueva_foto">
    </div>
    <div>
        <label for="edit-nickname">Nickname</label>
        <input type="text" name="nickname" id="edit-nickname" value="<?= $arrayUser[0]['nickname'] ?>">
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