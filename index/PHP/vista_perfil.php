<?php require 'head.php';

//recibimos datos del editar perfil y los mandamos a DB
if (isset($_POST['nickname']) && isset($_POST['password']) && isset($_POST['pagina-contacto'])) {
    $updatedRows = updateUser($_SESSION["userId"], $_POST['nickname'], $_POST['password'], $_POST['pagina-contacto']);
}

if (isset($_POST["adImg"], $_POST["adTitle"], $_POST["adDescription"], $_POST["companyName"], $_POST["tags"])) {
    insertAd();
}

$persona = getPersonaById($_SESSION['userId']);

?>


    <div class="main_container">
        <div class="contenedor-formulario">
            <?php include 'edit_user.php'; ?>
            <?php include 'publicar_anuncio.php'; ?>
        </div>
        <div id="cabecera_perfil" class="banner_perfil" style='<?= fillPerfil($persona, "banner") ?>; height: auto'>
            <div class="foto_perfil">
                <div class="imagen_perfil" alt="Imagen_perfil" style='<?= fillPerfil($persona, "imagen") ?>'></div>
            </div>
            <div class="info_perfil">
                <h3 class="nickname_perfil"><?= fillPerfil($persona, "nickname") ?></h3>
                <p class="nombre_apellidos_perfil"><?= fillPerfil($persona, "nombre_apellidos") ?></p>
                <p class="email_perfil"><?= fillPerfil($persona, "email") ?></p>
                <a class="contacto_perfil" href="http://<?= fillPerfil($persona, 'contacto') ?>">
                    <?php fillPerfil($persona, 'contacto'); ?>
                    <i class="fas fa-external-link-alt icono"></i>
                </a>
                <br>
                <a href="#edit-profile" class="efectoFade" rel="modal:open">Editar perfil</a>
            </div>
        </div>
        <main id="ads_container">
            <!-- Pasarle el id persona para buscar sus anuncios-->
            <?= add_adsByUser(isset($_GET['persona_id']) ? $_GET['persona_id'] : "ERROR ID persona") ?>
            <div class='ad'>
                <a href="#publicateAd" class="efectoFade" rel="modal:open">ADD +</a></p>
            </div>
        </main>
    </div>

<?php require 'footer.php'; ?>