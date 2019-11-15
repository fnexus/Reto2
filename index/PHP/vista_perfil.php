<?php require 'head.php';

//recibimos datos del editar perfil y los mandamos a DB
if(isset($_POST['nickname']) && isset($_POST['password']) && isset($_POST['pagina-contacto'])){
    $updatedRows = updateUser($_SESSION["userId"], $_POST['nickname'], $_POST['password'], $_POST['pagina-contacto']);
}


if (isset($_POST["adImg"], $_POST["adTitle"], $_POST["adDescription"], $_POST["companyName"], $_POST["tags"])) {
    insertAd();
}


// TODO el id persona estara guardado en session
$persona_id = isset($_GET['persona_id']) ? $_GET['persona_id'] : "ERROR ID perona";
$persona = getPersonaById($persona_id);

?>

    <div class="main_container">
        <div id="contenedor_editar_perfil">
            <?php include 'edit_user.php'; ?>
        </div>
        <button id="button-edit-perfil" type='button'>Editar Perfil</button>
        <div id="cabecera_perfil" class="banner_perfil" style='<?= fillPerfil($persona, "banner") ?>'>
            <div class="foto_perfil">
                <div class="imagen_perfil" alt="Imagen_perfil" style='<?= fillPerfil($persona, "imagen") ?>'></div>
            </div>
            <div class="info_perfil">
                <h3 class="nickname_perfil"><?= fillPerfil($persona, "nickname") ?></h3>
                <p class="nombre_apellidos_perfil"><?= fillPerfil($persona, "nombre_apellidos") ?></p>
                <p class="email_perfil"><?= fillPerfil($persona, "email") ?></p>
                <a class="contacto_perfil" href="http://<?= fillPerfil($persona, 'contacto') ?>">Página de
                    contacto</a>
            </div>
        </div>
        <main id="ads_container">
            <!-- Pasarle el id persona para buscar sus anuncios-->
            <?= add_adsByUser(isset($_GET['persona_id']) ? $_GET['persona_id'] : "ERROR ID persona") ?>
            <div class='ad'>
                <input type="button" name="showAd" id="showAd" value="+">
                <?php include 'publicar_anuncio.php'; ?>
            </div>
        </main>
    </div>

<?php require 'footer.php'; ?>