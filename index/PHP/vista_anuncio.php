<?php require 'head.php'; ?>
<div class="main_container">
    <div id="adv-container">
        <?php
        $image = getImage(connection(), isset($_GET['id_anuncio']) ? $_GET['id_anuncio'] : "ERROR");
        echo '<img src="' . $image . '">';
        ?>
    </div>
    <div id="navbar-right-container">
        <?php
        $arrayAssocAnuncio = getAdvertisementData(connection(), isset($_GET['id_anuncio']) ? $_GET['id_anuncio'] : "ERROR");
        echo
        $arrayAssocUser = getUserData(connection(), $arrayAssocAnuncio[0]['persona_id']);
        addComments(connection(), isset($_GET['id_anuncio']) ? $_GET['id_anuncio'] : "ERROR");
        ?>
    </div>
</div>
<?php require 'footer.php'; ?>



