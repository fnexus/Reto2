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
        //TODO cambiar el ?buscar por lo que pongamos para buscar
        echo "<div class='tags_child'>    
                <a class='tag' href='../index.php?buscar={$row['nombre']}'>{$row['nombre']}</a>                
            </div>";
    }
    $db = null;
}


function add_ads()
{
    // conectar a base de datos
    $db = connection();
    $ads = selectAllAds($db);

    // recorrer el objeto fetch y crear contenedores dom de anuncios
    while ($anuncio = $ads->fetchObject()) {
        /**
         * TODO poner que el enlace lleve a la pagina web de anuncion vista completa
         * TODO con la informacion de este anuncio
         * TODO quizas abrir un enlace pasandole la ID en e enlace
         */
        echo "<div class='ad'>
                <a href='../anuncion.php?id={$anuncio->id}' target='_blank' class='ad_enlacePagina'>                
                    <p class='ad_titulo'>{$anuncio->titulo}</p>
                    <img src='{$anuncio->imagen}' class='ad_imagen'>
                    
                </a>
            </div>";
    }
    /**
     * <section class='ad_descripcion'>{$anuncio->descripcion}</section>
    <div class=''>
    <a>Contacto: {$anuncio->datos_contacto}</a>
    <a>Empresa: {$anuncio->nombre_empresa}</a>
    <span>{$anuncio->fecha_creacion}</span>
    </div>
     */
    $db = null;
}

/**
 * @param $connection
 * @return objeto con los datos de la tabla Anuncio
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