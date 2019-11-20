<?php
$arrayUser = getUserData($_SESSION["userId"]);
echo "<p>{$arrayUser[0]['imagen_banner']}</p>"
?>

<form action="vista_perfil.php?persona_id=<?= $_SESSION["userId"] ?>" method="post" id="edit-profile" class="modal"
      enctype="multipart/form-data">
    <div class="changecont">
        <img src="<?php if($arrayUser[0]['imagen_banner']==""){

        } ?>" alt="banner" class="editImg">

        <input type="file" name="subida_imagen_banner" accept="image/*" id="nuevo_fondo" class="fileInputs">
        <label for="nuevo_fondo">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
            <span>Cambia de banner</span>
        </label>
    </div>
    <div class="changecont">
        <img src="<?= $arrayUser[0]['foto_perfil'] ?>" alt="foto-perfil" class="editImg">

        <input type="file" name="subida_foto_perfil" accept="image/*" id="nueva_foto" class="fileInputs">
        <label for="nueva_foto">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
            <span>Cambia de imagen</span>
        </label>
    </div>
    <div>
        <label for="edit-nickname" class="inp">
            <input type="text" name="nickname" id="edit-nickname" class="input" value="<?= $arrayUser[0]['nickname'] ?>">
            <span class="label">EDITAR NOMBRE</span>
            <span class="border"></span>
        </label>
    </div>
    <div>
        <label for="edit-password" class="inp">
            <input type="password" name="password" id="edit-password" class="input" value="<?= $arrayUser[0]['password'] ?>">
            <span class="label"> EDITAR CONTRASEÑA</span>
            <span class="border"></span>
        </label>
    </div>
    <div>
        <label for="edit-contacto" class="inp">
            <input type="text" name="pagina-contacto" id="edit-contacto" class="input" value="<?= $arrayUser[0]['pagina_contacto'] ?>">
            <span class="label">PAGINA DE CONTACTO</span>
            <span class="border"></span>
        </label>
    </div>
    <button class="button">Guardar Datos</button>
</form>