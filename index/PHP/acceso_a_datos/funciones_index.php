<?php

//TODO al crearse la barra tener en cuenta si ya hay una categoria
//seleccionada y no ponerla al crear la barra con las categorias
// disponibles
function add_categorias_bar($categoriasUsadas = null)
{
    // conectar a base de datos
    $db = connection();
    $stmt = $db->prepare("SELECT * FROM CATEGORIA WHERE 1=1");
    $stmt->execute();
    $stmt->setFetchMode(2);

    while ($row = $stmt->fetch()) {
        echo "<div class='tags_child'>    
                <a class='tag' href='../index.php?search={$row['id']}'>{$row['nombre']}</a>                
            </div>";
    }
    $db = null;
}

/**
 * Obtiene de base de datos todos los anuncios y luego los añade
 * en el contenedor de ads
 */
function add_ads()
{
    // conectar a base de datos
    $db = connection();
    $ads = selectAllAds($db);

    // recorrer el objeto fetch y crear contenedores dom de anuncios
    while ($anuncio = $ads->fetchObject()) {
        echo "<div class='ad'>
                <a href='vista_anuncio.php?id_anuncio={$anuncio->id}' target='_blank' class='ad_enlacePagina'>                
                    <p class='ad_titulo'>{$anuncio->titulo}</p>
                    <img src='{$anuncio->imagen}' class='ad_imagen'>                    
                </a>
            </div>";
    }
    /**
     * Por si se necesitan poner mas campos para que se vean en anuncios
     * <section class='ad_descripcion'>{$anuncio->descripcion}</section>
     * <div class=''>
     * <a>Contacto: {$anuncio->datos_contacto}</a>
     * <a>Empresa: {$anuncio->nombre_empresa}</a>
     * <span>{$anuncio->fecha_creacion}</span>
     * </div>
     */
    $db = null;
}

/**
 * @param $connection
 * @return objeto con los datos de la tabla Categoria
 */
function selectAllTags($connection)
{
    $stmt = $connection->prepare("SELECT * FROM CATEGORIA WHERE 1=1");
    $stmt->execute();
    return $stmt;
}

/**
 * @param $connection
 * @return objeto con los datos de la tabla Anuncio
 */
function selectAllAds($connection)
{
    $stmt = $connection->prepare("SELECT * FROM ANUNCIO WHERE 1=1");
    $stmt->execute();
    return $stmt;
}