<?php require 'head.php'; ?>
<?php

$idAnuncio = isset($_GET['id_anuncio']) ? $_GET['id_anuncio'] : "ERROR id_anuncio";
$anuncio = getAnuncioById($idAnuncio);
$personaQueCreoElAnuncio = getPersonaByIdFromAnuncio($idAnuncio);


//valor del id_usuario  COGER EL ID USUARIO NO DEL DEL PROPIO ANUNCIO, sino del SESSION id del usuario conectado PARA JS
echo '<input type="text" value="' . $_SESSION['userId'] . '" id="vista_anuncio_persona_id" name="persona_id" hidden>';
// guardar el id anuncio en un input hidden para usarse en los likes PARA JS
echo '<input type="text" value="' . $idAnuncio . '" id="vista_anuncio_id_anuncio" name="id_anuncio" hidden>';
?>

<!-- importar script para likes -->
<script src="../JS/likes.js"></script>
<!-- importar script para comentarios -->
<script src="../JS/comentarios.js"></script>


<div class="main_container vista-anuncio-container">
    <div id="anuncio-container">
        <div class="imagen_container">
            <img src="<?php fillAnuncio($anuncio, "anuncio_imagen"); ?>">
        </div>
        <div class="likes_container">
            <button type="button" value="0" id="dar_quitar_like"></button>
            <div id="likes_count">❤️</div>
        </div>
        <input id="anuncio_comentario_publisher_nickname" type="hidden" name="publisher_nickname" value="<?php fillAnuncio($personaQueCreoElAnuncio, "persona_nickname"); ?>">
        <input id="anuncio_comentario_user_nickname" type="hidden" name="user_nickname" value="<?= $_SESSION['nickname'] ?>">
    </div>
    <div id="anuncio-details-container">
        <div id="anuncio_datos_usuario">
            <h3>DATOS USUARIO</h3>
            <a href='<?php fillAnuncio($personaQueCreoElAnuncio, "enlace_a_su_perfil") ?>'>
                <img id="anuncio_usuario_foto_perfil"
                     src="<?php fillAnuncio($personaQueCreoElAnuncio, "persona_imagen"); ?>">
                <p id="anuncio_usuario_nickname"><?php fillAnuncio($personaQueCreoElAnuncio, "persona_nickname"); ?></p>
            </a>
        </div>
        <div id="anuncio_datos_anuncio">
            <h3>DATOS ANUNCIO</h3>
            <h4 id="anuncio_titulo"><?php fillAnuncio($anuncio, "anuncio_titulo"); ?></h4>
            <p id="anuncio_descripcion"><?php fillAnuncio($anuncio, "anuncio_descripcion"); ?></p>
            <p id="anuncio_nombre_empresa"><?php fillAnuncio($anuncio, "anuncio_nombre_empresa"); ?></p>
            <p id="anuncio_fecha_creacion"><?php fillAnuncio($anuncio, "anuncio_fecha"); ?></p>
        </div>

        <div id="comments-container">
            <form action="vista_anuncio.php"><!--podriamos utilizar ajax-->
                <label for="add-comment">Añade un comentario</label>
                <textarea id="anuncio_comentario_text_area" name="comment" id="comment" cols="30" rows="10" required
                          placeholder="Escribe aqui tu comentario"></textarea>
                <input id="anuncio_comentario_id_anuncio" type="hidden" name="id_anuncio" value="<?= $idAnuncio ?>">
                <input id="anuncio_comentario_id_user" type="hidden" name="id_user" value="<?= $_SESSION['userId'] ?>">
                <button id="anuncio_comentario_boton_enviar" type="button">Enviar</button>
            </form>
            <div id="anuncio_lista_comentarios">
                <!-- Se insertan comentarios por JS-->
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>



