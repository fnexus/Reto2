<?php

/**
 * Añadir anuncios de la persona dada
 * @param $persona_id
 */
function add_adsByUser($persona_id)
{
    // conectar a base de datos
    $db = connection();

    $query = "SELECT * FROM ANUNCIO WHERE 1=1 AND persona_id = $persona_id";
    $stmt = $db->prepare($query);
    $stmt->execute();

    // recorrer el objeto fetch y crear contenedores dom de anuncios
    while ($anuncio = $stmt->fetchObject()) {
        echo "<div class='ad'>
                <a href='vista_anuncio.php?id_anuncio={$anuncio->id}'  class='ad_enlacePagina'>                
                    <p class='ad_titulo'>{$anuncio->titulo}</p>
                    <img src='{$anuncio->imagen}' class='ad_imagen'>                    
                </a>
            </div>";
    }
    closeConnection($db);
}

/**
 * @param $persona_id
 * @return objeto con los datos de la persona
 */
function getPersonaById($persona_id)
{
    // array asociativo para la query
    $persona = array("id" => $persona_id);
    // conectar a base de datos
    $db = connection();
    $stmt = $db->prepare("SELECT * FROM PERSONA WHERE id = :id ");
    $stmt->execute($persona);
    // devolver un objeto
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
}

/**
 * @param $persona
 * @param $queLlenar
 */
function fillPerfil($persona, $queLlenar)
{
    switch ($queLlenar) {
        case "imagen":
            echo $persona->foto_perfil;
            break;
        case "nickname":
            echo $persona->nickname;
            break;
        case "nombre_apellidos":
            echo $persona->nombre . " " . $persona->apellidos;
            break;
        case "email":
            echo $persona->email;
            break;
        case "contacto":
            echo $persona->pagina_contacto;
            break;
        case "banner":
            echo "background-image: url({$persona->imagen_banner});";
            break;
    }
}

function updateUser($idUser, $nickname, $password, $paginaContacto){
    $db = connection();
    print_r($idUser);
    print_r($nickname);
    print_r($password);
    print_r($paginaContacto);

    //columna => clave
    $data = ['id' => $idUser, 'nickname' => $nickname, 'password' => $password, 'pagina_contacto' => $paginaContacto];
    $stmt = $db->prepare('UPDATE PERSONA SET nickname = :nickname, password = :password, pagina_contacto = :pagina_contacto WHERE id = :id');
    $stmt->execute($data);
    print_r($db->errorInfo());
    return $stmt->rowCount();
}