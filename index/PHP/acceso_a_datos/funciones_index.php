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

//registrar un usuario y posteriormente iniciar sesion con el nickname y la contraseña otorgadas
function insertUser(){
    $dbh = connection();

    if(isset($_GET["nickname"],$_GET["email"], $_GET["password"], $_GET["repeatPassword"], $_GET["name"], $_GET["surname"], $_GET["contactPage"])){
        $nickname = $_GET["nickname"];
        $email = $_GET["email"];
        $password = $_GET["password"];
        $repeatpassword = $_GET["repeatPassword"];
        $name = $_GET["name"];
        $surname = $_GET["surname"];
        $contactPage = $_GET["contactPage"];
        if($password == $repeatpassword){
            $stmt = $dbh->prepare(
                "INSERT INTO PERSONA(nickname,email,password,nombre,apellidos,pagina_contacto)
                                VALUES('$nickname', '$email', '$password', '$name', '$surname', '$contactPage');");
            loginUser($nickname,$password);
            $stmt->execute();
        }
    }
    closeConnection($dbh);

}
//inicio de sesion de un usuario, y introducion de los datos de ese usuario en sesiones
function loginUser($userNickname,$userPassword){
    $dbh = connection();
    if(isset($_GET["nickname"], $_GET["password"])){
        $nickname=$_GET["nickname"];
        $password=$_GET["password"];
        $data = array( 'nickname' => $nickname, 'password' => $password );
        $stmt = $dbh->prepare("
         SELECT *
         FROM PERSONA
         WHERE nickname = :nickname AND password = :password" );
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute($data);

        while($row = $stmt->fetch()) {
            $_userNickname["nickname"] = $row->nickname;
            $_userName["name"] = $row->nombre;
            $_userSurname["surname"] = $row->apellidos;
            $_userEmail["email"] = $row->email;
            $_userPage["contactPage"] = $row->pagina_contacto;
        }
    }
    else{
        $data = array( 'nickname' => $userNickname, 'password' => $userPassword );
        $stmt = $dbh->prepare("
         SELECT *
         FROM PERSONA
         WHERE nickname = :nickname AND password = :password" );
        $stmt->execute($data);
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        while($row = $stmt->fetch()) {
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

function addComments(){
    // conectar a base de datos
    $dbh = connection();
    $stmt = $dbh->prepare("SELECT p.foto_perfil, c.fecha_creacion, p.id, p.nickname, c.descripcion FROM COMENTARIO c, PERSONA p WHERE p.id=c.persona_id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    /*$row = $stmt->fetchAll();
    print_r($row);*/

    while ($row = $stmt->fetch()) {
        //rellenar caja con los comentarios que hay en la base de datos
        echo "<div class='comment'>    
                <img src=$row->foto_perfil>
                <p>$row->nickname</p>       
                <p>$row->descripcion</p>    
                <p>$row->fecha_creacion</p>  
            </div>";
    }
    //cerrar la conexion a base de datos
    closeConnection($dbh);
}
/*function calculateLikes(){
    // conectar a base de datos
    $dbh = connection();
    $stmt = $dbh->prepare("SELECT COUNT(*) FROM LIKES WHERE P.ID=C.PERSONA_ID");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_OBJ);

    while ($row = $stmt->fetch()) {
        //rellenar caja con los comentarios que hay en la base de datos
        echo "<div class='comment'>
                <img src=$row->foto_perfil><p>$row->nickname</p>
                <p>$row->descripcion</p>
                <p>$row->fecha_creacion</p>
            </div>";
    }
    //cerrar la conexion a base de datos
    closeConnection($dbh);
}*/
