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
        <div id="cabecera_perfil" class="banner_perfil" style='<?php fillPerfil($persona, "banner") ?>'>
            <div class="foto_perfil">
                <img class="imagen_perfil" alt="Imagen_perfil" src='<?php fillPerfil($persona, "imagen") ?>'>
            </div>
            <div class="info_perfil">
                <h3 class="nickname_perfil"><?php fillPerfil($persona, "nickname") ?></h3>
                <p class="nombre_apellidos_perfil"><?php fillPerfil($persona, "nombre_apellidos") ?></p>
                <p class="email_perfil"><?php fillPerfil($persona, "email") ?></p>
                <a class="contacto_perfil" href="http://<?php fillPerfil($persona, 'contacto') ?>">
                    <?php fillPerfil($persona, 'contacto'); ?>
                    <i class="fas fa-external-link-alt icono"></i>
                </a>
                <a href="#edit-profile" class="efectoFade editar_perfil" rel="modal:open">Editar perfil</a>
            </div>
            <main id="ads_container">
                <!-- Pasarle el id persona para buscar sus anuncios-->
                <?php add_adsByUser(isset($_GET['persona_id']) ? $_GET['persona_id'] : "ERROR ID persona") ?>
                <div class='ad'>
                    <a href="#publicateAd" class="efectoFade" rel="modal:open">ADD +</a>
                </div>
            </main>
        </div>
        <main id="ads_container">
            <!-- Pasarle el id persona para buscar sus anuncios-->
            <?php add_adsByUser(isset($_GET['persona_id']) ? $_GET['persona_id'] : "ERROR ID persona") ?>
            <div class='ad'>
                <a href="#publicateAd" class="efectoFade" rel="modal:open">ADD +</a>
            </div>
        </main>
    </div>

<?php require 'footer.php'; ?>