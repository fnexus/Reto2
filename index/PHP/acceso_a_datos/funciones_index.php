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
    $stmt = selectAll("CATEGORIA");
    $stmt->setFetchMode(2);

    while ($row = $stmt->fetch()) {
        if ($tipoDOM == "barra") {
            echo "<a class='tags_child' href='index.php?search_titulo=&search_categoria={$row['id']}'>    
                        <span class='tag'>{$row['nombre']}</span>                
                  </a>";
        } else {
            echo "<option class='option' value='{$row['id']}'>    
                    {$row['nombre']}            
                  </option>";
        }
    }
}

/**
 * Obtiene de base de datos todos los anuncios y luego los añade
 * en el contenedor de ads dependiendo del buscador
 */
function add_ads()
{
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
        $ads = selectAds($titulo, $categoria,"ANUNCIO","PERSONA");
    } else {
        $ads = selectAll("ANUNCIO");
    }

    // recorrer el objeto fetch y crear contenedores dom de anuncios
    while ($anuncio = $ads->fetchObject()) {
        echo "<div class='ad'>
                <a href='vista_anuncio.php?id_anuncio={$anuncio->id}'  class='ad_enlacePagina'>                
                    <!--<p class='ad_titulo'>{$anuncio->titulo}</p>-->
                    <div style='background-image: url({$anuncio->imagen})' class='ad_imagen'>
                        <div class='ad_hover'>
                            <div class='ad_information'>
                                <img class='ad_user_img' src='{$anuncio->foto_perfil}'>
                                <div class='user_information'>
                                    <p class='ad_titulo'>{$anuncio->titulo}</p>
                                    <p class='ad_user_nickname'>{$anuncio->nickname}</p>
                                </div>
                            </div>
                        </div>
                    </div>                       
                </a>
            </div>";
    }
}

/**
 * @param $tabla
 * @return bool|PDOStatement
 */
function selectAll($tabla1,$tabla2 = "PERSONA")
{
    if($tabla1=="ANUNCIO") {
        $db = connection();
        $stmt = $db->prepare("SELECT a.id, a.titulo, a.imagen, p.foto_perfil, p.nickname FROM $tabla1 a, $tabla2 p WHERE 1=1 AND a.persona_id = p.id");
        $stmt->execute();
        closeConnection($db);
        return $stmt;
    }
    else {
        $db = connection();
        $stmt = $db->prepare("SELECT * FROM $tabla1 WHERE 1=1");
        $stmt->execute();
        closeConnection($db);
        return $stmt;
    }
}


/**
 * Select compuesta de WHERE que se va creando dependiendo de los parametros de busqueda
 * @param $titulo
 * @param $categoria
 * @return bool|PDOStatement
 */
function selectAds($titulo, $categoria,$tabla1,$tabla2)
{
    $db = connection();
    $query = "SELECT a.id, a.titulo, a.imagen, p.foto_perfil, p.nickname FROM $tabla1 a, $tabla2 p WHERE 1=1 AND a.persona_id = p.id";
    if ($titulo != "") {
        $query .= " AND a.titulo like '%$titulo%'";
    }
    if ($categoria != "") {
        $query .= " AND a.categoria_id = " . $categoria;
    }
    $stmt = $db->prepare($query);
    $stmt->execute();
    closeConnection($db);
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
            $stmt->execute();
        } else {
            echo "<p class='formError'>Las contraseñas no coinciden</p>";
        }
    }
    closeConnection($db);

}


//inicio de sesion de un usuario, y introducion de los datos de ese usuario en sesiones
function loginUser()
{
    $dbh = connection();
    if (isset($_GET["nickname"], $_GET["password"])) {
        $nickname = $_GET["nickname"];
        $password = $_GET["password"];
        $data = array('nickname' => $nickname, 'password' => $password);
        $stmt = $dbh->prepare("
         SELECT *
         FROM PERSONA
         WHERE nickname = :nickname AND password = :password");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute($data);
        if($_GET["nickname"]==""||$_GET["password"]==""){
            echo "<p class='formError'>El usuario o la contraseña introducidas no son correctas</p>";
        } else {
            if ($row = $stmt->fetch()) {
                $_SESSION["userId"] = $row->id;
                $_SESSION["nickname"] = $row->nickname;
                $_SESSION["name"] = $row->nombre;
                $_SESSION["surname"] = $row->apellidos;
                $_SESSION["email"] = $row->email;
                $_SESSION["contactPage"] = $row->pagina_contacto;
                $_SESSION["profileImg"] = $row->foto_perfil;
                $_SESSION["bannerImg"] = $row->imagen_banner;

                $_SESSION["logged"] = "true";
            }
            else{
                echo "<p class='formError'>El usuario o la contraseña introducidas no son correctas</p>";
            }

        }
    }
    closeConnection($dbh);
}

function logoutUser()
{
    $dbh = connection();

    unset($_SESSION["userId"]);
    unset($_SESSION["nickname"]);
    unset($_SESSION["name"]);
    unset($_SESSION["surname"]);
    unset($_SESSION["email"]);
    unset($_SESSION["contactPage"]);
    unset($_SESSION["profileImg"]);
    unset($_SESSION["bannerImg"]);

    $_SESSION["logged"] = "false";

    session_destroy();

    closeConnection($dbh);
}