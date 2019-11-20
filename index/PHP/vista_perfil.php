<?php require 'head.php';
//recibimos datos del editar perfil y los mandamos a DB
if (isset($_POST['nickname']) && isset($_POST['password']) && isset($_POST['pagina-contacto'])) {
    $updatedRows = updateUser($_SESSION["userId"], $_POST['nickname'], $_POST['password'], $_POST['pagina-contacto']);
}

if (isset($_POST["adTitle"], $_POST["adDescription"], $_POST["companyName"], $_POST["tags"])) {
    insertAd($_SESSION["userId"], $_POST["adTitle"], $_POST["adDescription"], $_POST["companyName"], $_POST["tags"]);
}
// control de perfil, si es el propio usuario u otro
$persona = null;
if (isset($_GET['anunciante_id']) && $_GET['anunciante_id'] != "") {
    if ($_GET['anunciante_id'] != $_SESSION['userId']) {
        $persona = getPersonaById($_GET['anunciante_id']);
        // desactivar añadir add y editar perfil
        echo "<script src='../JS/control_ver_perfil_ajeno.js'></script>";
    } else {
        $persona = getPersonaById($_GET['persona_id']);
    }
} else {
    $persona = getPersonaById($_SESSION['userId']);
}
?>

    <div class="main_container">
        <div class="contenedor-formulario">
            <?php include 'edit_user.php';
            include 'publicar_anuncio.php';
            ?>
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
        </div>
        <main id="ads_container">
            <!-- Pasarle el id persona para buscar sus anuncios-->
            <?php
            if (isset($_GET['anunciante_id'])) {
                if (isset($_GET['persona_id'])) {
                    if ($_GET['persona_id'] == $_GET['anunciante_id']) {
                        add_adsByUser($_GET['persona_id']);
                    } elseif ($_GET['anunciante_id'] != "") {
                            add_adsByUser($_GET['anunciante_id']);
                    } elseif ($_GET['persona_id'] != "") {
                        add_adsByUser($_GET['persona_id']);
                    }
                }
            } else {
                add_adsByUser($_GET['persona_id']);
            }
            ?>

            <div class='ad'>
                <a href='#publicateAd' class='ad_enlacePagina efectoFade' rel="modal:open">
                    <div style='background-image: url("../img/boton_añadir.png")' class='ad_imagen anyadir_add'></div>
                </a>
            </div>
        </main>
    </div>

<?php require 'footer.php'; ?>