<?php require 'head.php'; ?>
    <div class="main_container">
        <div id="contenedor-formulario">
        </div>
        <article id="tags_container">
            <?= add_categorias_bar("barra") ?>
        </article>
        <main id="ads_container">
            <?= add_ads() ?>
        </main>
    </div>
<?php require 'footer.php'; ?>