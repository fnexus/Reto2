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
        <label for="edit-password">Password</label>
        <input type="password" name="password" id="edit-password" value="<?= $arrayUser[0]['password'] ?>">
    </div>
    <div>
        <label for="edit-contacto">Website</label>
        <input type="text" name="pagina-contacto" id="edit-contacto" value="<?= $arrayUser[0]['pagina_contacto'] ?>">
    </div>

    <button>Guardar Datos</button>
</form>