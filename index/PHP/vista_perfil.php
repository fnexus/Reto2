<?php require 'head.php';

// TODO el id persona estara guardado en session
$persona_id = isset($_GET['persona_id']) ? $_GET['persona_id'] : "ERROR ID persona";
$persona = getPersonaById($persona_id);

?>

    <div class="main_container">
        <div id="contenedor_editar_perfil">
        </div>
        <div id="cabecera_perfil" class="banner_perfil" style='<?= fillPerfil($persona, "banner") ?>'>
            <div class="foto_perfil">
                <div class="imagen_perfil" style='<?= fillPerfil($persona, "imagen") ?>'></div>
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
        </main>
    </div>

<?php require 'footer.php'; ?>