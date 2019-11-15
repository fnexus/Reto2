<?php require 'head.php'; ?>
<!-- importar script para likes -->
<script src="../JS/likes.js"></script>

<div class="main_container vista-anuncio-container">
    <div id="anuncio-container">
        <div class="imagen_container">
        <?php
        //se han enviado los valores del comentario
        if(isset($_GET['id_user']) && isset($_GET['id_anuncio']) && isset($_GET['comment'])){
            $idAnuncio = $_GET['id_anuncio'];
            insertComment($_SESSION['userId'], $_GET['id_anuncio'], $_GET['comment']);
        }
        //entrada a vista del anuncio
        else if(isset($_GET['id_anuncio'])){
            $idAnuncio = $_GET['id_anuncio'];
        }
        else{
            $idAnuncio = "ERROR";
        }

        $image = getImage($idAnuncio);
        echo '<input type="text" value="' . $idAnuncio . '" id="vista_anuncio_id_anuncio" name="id_anuncio" hidden>';
        echo '<img src="' . $image . '">';
        ?>
        </div>
        <div class="likes_container">
            <button type="button" value="0" id="dar_quitar_like"></button>
            <div id="likes_count">❤️</div>
        </div>
    </div>
    <div id="anuncio-details-container">
        <?php
        $arrayAssocAnuncio = getAdvertisementData($idAnuncio);
        $arrayAssocUser = getUserData($arrayAssocAnuncio[0]['persona_id']);
        $arrayAssocComments = getComments($idAnuncio);

        //valor del id_usuario  COGER EL ID USUARIO NO DEL DEL PROPIO ANUNCIO, sino del SESSION id del usuario conectado
        echo '<input type="text" value="' . $_SESSION['userId'] . '" id="vista_anuncio_persona_id" name="persona_id" hidden>';

        //echo datos usuario
        echo '<p>DATOS USUARIO<p>';
        echo '<img src="' . $arrayAssocUser[0]['foto_perfil'] . '">';
        echo '<br>';
        echo $arrayAssocUser[0]['nickname'];
        echo '<br><br>';

        //echo datos anuncio
        echo '<p>DATOS ANUNCIO<p>';
        echo $arrayAssocAnuncio[0]['titulo'];
        echo '<br>';
        echo $arrayAssocAnuncio[0]['descripcion'];
        echo '<br>';
        echo $arrayAssocAnuncio[0]['nombre_empresa'];
        echo '<br>';
        echo $arrayAssocAnuncio[0]['fecha_creacion'];
        echo '<br><br>';

        ?>

        <div id="comments-container">
            <form action="vista_anuncio.php"><!--podriamos utilizar ajax-->
                <label for="add-comment">Añade un comentario</label>
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                <input type="hidden" name="id_anuncio" value="<?= $idAnuncio ?>">
                <input type="hidden" name="id_user" value="<?= $arrayAssocUser[0]['id'] ?>">
                <button>Enviar</button>
            </form>
            <?php
            //echo datos comentarios
            echo '<p>DATOS COMENTARIOS<p>';
            for($i = 0; $i < count($arrayAssocComments); $i++){
                echo $arrayAssocComments[$i]['nickname'];
                echo '<br>';
                echo $arrayAssocComments[$i]['descripcion'];
                echo '<br>';
                echo $arrayAssocComments[$i]['fecha_creacion'];
                echo '<br>';
            }

            //print_r($arrayAssocComments);
            ?>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>



