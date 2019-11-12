<?php

//TODO al crearse la barra tener en cuenta si ya hay una categoria
//seleccionada y no ponerla al crear la barra con las categorias
// disponibles
function add_categorias_bar($tipoDOM)
{
    // conectar a base de datos
    $db = connection();
    $stmt = $db->prepare("SELECT * FROM CATEGORIA WHERE 1=1");
    $stmt->execute();
    $stmt->setFetchMode(2);

    while ($row = $stmt->fetch()) {
        if ($tipoDOM == "barra") {
            echo "<div class='tags_child'>    
                <a class='tag' href='index.php?search_titulo=&search_categoria={$row['id']}'>
                {$row['nombre']}</a>                
            </div>";
        } else {
            echo "<option class='option' value='{$row['id']}'>    
                {$row['nombre']}            
            </option>";
        }
    }
    $db = null;
}

/**
 * Obtiene de base de datos todos los anuncios y luego los añade
 * en el contenedor de ads dependiendo del buscador
 */
function add_ads()
{
    // conectar a base de datos
    $db = connection();

    $titulo = "";
    $categoria = "";
    $ads = null;
    // Si hay cosas en el buscador
    if (isset($_GET['search_titulo'], $_GET['search_categoria'])) {

        if ($_GET['search_titulo'] != "") {
            $titulo = $_GET['search_titulo'];
        }
        if ($_GET['search_categoria'] != "") {
            $categoria = $_GET['search_categoria'];
        }
    }

    if ($titulo != "" || $categoria != "") {
        $ads = selectAds($db, $titulo, $categoria);
    } else {
        $ads = selectAllAds($db);
    }

    // recorrer el objeto fetch y crear contenedores dom de anuncios
    while ($anuncio = $ads->fetchObject()) {
        echo "<div class='ad'>
                <a href='../vista_anuncio.php?id_anuncio={$anuncio->id}' target='_blank' class='ad_enlacePagina'>                
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

function selectAds($connection, $titulo, $categoria)
{
    $query = "SELECT * FROM ANUNCIO WHERE 1=1";

    if ($titulo != "") {
        $query .= " AND titulo like '%$titulo%'";
    }
    if ($categoria != "") {
        $query .= " AND categoria_id = " . $categoria;
    }

    $stmt = $connection->prepare($query);
    $stmt->execute();
    return $stmt;
}