<?php

/**
 * Funcion para añadir al la barra con las categorias o el select con las option
 * de categorias, etc;
 *
 * @param $tipoDOM para distinguir que crear (minimo lo llamo 2 veces)
 */
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
    closeConnection($db);
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

    // si al menos uno esta lleno, buscar con filtro, sino buscar todos
    if ($titulo != "" || $categoria != "") {
        $ads = selectAds($db, $titulo, $categoria);
    } else {
        $ads = selectAllAds($db);
    }

    // recorrer el objeto fetch y crear contenedores dom de anuncios
    while ($anuncio = $ads->fetchObject()) {
        echo "<div class='ad'>
                <a href='vista_anuncio.php?id_anuncio={$anuncio->id}' target='_blank' class='ad_enlacePagina'>                
                    <p class='ad_titulo'>{$anuncio->titulo}</p>
                    <img src='{$anuncio->imagen}' class='ad_imagen'>                    
                </a>
            </div>";
    }
    closeConnection($db);
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

/**
 * @param $connection
 * @param $titulo
 * @param $categoria
 * @return objeto con los datos de la tabla Anuncio
 */
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

//registrar un usuario y posteriormente iniciar sesion con el nickname y la contraseña otorgadas
function insertUser()
{
    $db = connection();

    if (isset($_GET["nickname"], $_GET["email"], $_GET["password"], $_GET["repeatPassword"], $_GET["name"], $_GET["surname"], $_GET["contactPage"])) {
        $nickname = $_GET["nickname"];
        $email = $_GET["email"];
        $password = $_GET["password"];
        $repeatpassword = $_GET["repeatPassword"];
        $name = $_GET["name"];
        $surname = $_GET["surname"];
        $contactPage = $_GET["contactPage"];
        if ($password == $repeatpassword) {
            $stmt = $db->prepare(
                "INSERT INTO PERSONA(nickname,email,password,nombre,apellidos,pagina_contacto)
                                VALUES('$nickname', '$email', '$password', '$name', '$surname', '$contactPage');");
            loginUser($nickname, $password);
            $stmt->execute();
        }
    }
    closeConnection($db);

}

function insertComment($idUser, $idAnuncio, $comment){
    $dbh = connection();

    $data = array('anuncio_id' => $idAnuncio, 'persona_id' => $idUser, 'descripcion' => $comment);
    $stmt = $dbh->prepare("INSERT INTO COMENTARIO (anuncio_id, persona_id, descripcion) VALUES (:anuncio_id, :persona_id, :descripcion)");
    $stmt->execute($data);

    closeConnection($dbh);
}

//inicio de sesion de un usuario, y introducion de los datos de ese usuario en sesiones
function loginUser($userNickname, $userPassword)
{
    $db = connection();
    if (isset($_GET["nickname"], $_GET["password"])) {
        $nickname = $_GET["nickname"];
        $password = $_GET["password"];
        $data = array('nickname' => $nickname, 'password' => $password);
        $stmt = $db->prepare("
         SELECT *
         FROM PERSONA
         WHERE nickname = :nickname AND password = :password");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute($data);

        while($row = $stmt->fetch()) {
            $_userID["id"] = $row->id;
            $_userNickname["nickname"] = $row->nickname;
            $_userName["name"] = $row->nombre;
            $_userSurname["surname"] = $row->apellidos;
            $_userEmail["email"] = $row->email;
            $_userPage["contactPage"] = $row->pagina_contacto;
        }
    } else {
        $data = array('nickname' => $userNickname, 'password' => $userPassword);
        $stmt = $db->prepare("
         SELECT *
         FROM PERSONA
         WHERE nickname = :nickname AND password = :password");
        $stmt->execute($data);
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        while($row = $stmt->fetch()) {
            $_userID["id"] = $row->id;
            $_userImg["img"] = $row->foto_perfil;
            $_userNickname["nickname"] = $row->nickname;
            $_userName["name"] = $row->nombre;
            $_userSurname["surname"] = $row->apellidos;
            $_userEmail["email"] = $row->email;
            $_userPage["contactPage"] = $row->pagina_contacto;
        }
    }

    closeConnection($dbh);
}

/*function calculateLikes(){
    // conectar a base de datos
    $dbh = connection();
    $stmt = $dbh->prepare("SELECT COUNT(*) FROM LIKES WHERE P.ID=C.PERSONA_ID");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_OBJ);


