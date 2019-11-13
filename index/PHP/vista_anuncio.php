<?php require 'head.php'; ?>
<div class="main_container vista-anuncio-container">
    <div id="anuncio-container">
        <?php
        //se han enviado los valores del comentario
        if(isset($_GET['id_user']) && isset($_GET['id_anuncio']) && isset($_GET['comment'])){
            $idAnuncio = $_GET['id_anuncio'];
            insertComment($_GET['id_user'], $_GET['id_anuncio'], $_GET['comment']);
        }
        //entrada a vista del anuncio
        else if(isset($_GET['id_anuncio'])){
            $idAnuncio = $_GET['id_anuncio'];
        }
        else{
            $idAnuncio = "ERROR";
        }
        $image = getImage(connection(), $idAnuncio);
        echo '<img src="' . $image . '">';
        ?>
    </div>
    <div id="anuncio-details-container">
        <?php
        $arrayAssocAnuncio = getAdvertisementData(connection(), $idAnuncio);
        $arrayAssocUser = getUserData(connection(), $arrayAssocAnuncio[0]['persona_id']);
        $arrayAssocComments = addComments(connection(), $idAnuncio);

        //echo datos usuario
        echo '<h1>DATOS USUARIO<h1>';
        echo '<img src="' . $arrayAssocUser[0]['foto_perfil'] . '">';
        echo '<br>';
        echo $arrayAssocUser[0]['nickname'];
        echo '<br><br>';

        //echo datos anuncio
        echo '<h1>DATOS ANUNCIO<h1>';
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
            echo '<h1>DATOS COMENTARIOS<h1>';
            echo $arrayAssocComments[0]['nickname'];
            echo '<br>';
            echo $arrayAssocComments[0]['descripcion'];
            echo '<br>';
            echo $arrayAssocComments[0]['fecha_creacion'];
            echo '<br>';
            //print_r($arrayAssocComments);
            ?>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>



