<?php require 'head.php'; ?>
    <div class="main_container">
        <div id="contenedor-formulario">
        </div>
        <article id="tags_container">
            <?= add_categorias_bar("barra") ?>
        </article>
        <main id="ads_container">
            <?= add_ads() ?>
            <div class='ad'>
                <input type="button" name="showAd" id="showAd" value="+" onclick="showAd()">
            </div>
        </main>
    </div>
<?php require 'footer.php'; ?>