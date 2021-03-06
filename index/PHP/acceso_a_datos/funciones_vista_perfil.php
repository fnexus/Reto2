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
                    <!--<p class='ad_titulo'>{$anuncio->titulo}</p>-->
                    <div style='background-image: url({$anuncio->imagen})' class='ad_imagen'>
                        <div class='ad_hover'>
                            <div class='ad_information'>
                                    <p class='ad_titulo'>{$anuncio->titulo}</p>
                            </div>
                        </div>
                    </div>                       
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
            if ($persona->foto_perfil == "") {
                echo "../img/imagenes_usuarios/defaultFoto.png";
            } else {
                echo $persona->foto_perfil;
            }
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
            if ($persona->imagen_banner == null) {
                echo "background-image: url(../img/imagenes_usuarios/defaultBanner.png);";
            } else {
                echo "background-image: url({$persona->imagen_banner});";
            }
            break;
    }
}

function updateUser($idUser, $nickname, $password, $paginaContacto)
{
    $db = connection();
    $url_basica = "../img/imagenes_usuarios/";

    $url_banner = null;
    if (isset($_FILES) && isset($_FILES['subida_imagen_banner']) && !empty($_FILES['subida_imagen_banner']['name'] && !empty($_FILES['subida_imagen_banner']['tmp_name']))) {
        $url_banner = validateAndUploadImage($url_basica, $idUser, "subida_imagen_banner", "Banner");
        echo "BANNER--";
    }

    $url_imagen = null;
    if (isset($_FILES) && isset($_FILES['subida_foto_perfil']) && !empty($_FILES['subida_foto_perfil']['name'] && !empty($_FILES['subida_foto_perfil']['tmp_name']))) {
        $url_imagen = validateAndUploadImage($url_basica, $idUser, "subida_foto_perfil", "Foto");
    }

    //columna => clave
    $data = array('id' => $idUser, 'nickname' => $nickname, 'password' => $password, 'pagina_contacto' => $paginaContacto);
    $update = "UPDATE PERSONA SET nickname = :nickname, password = :password, pagina_contacto = :pagina_contacto ";
    $where = " WHERE id = :id";

    // si si ha añadido nueva imagen de banner y/o foto, añadirlo, sino conservar la antigua
    if ($url_imagen != null) {
        $update = $update . ", foto_perfil = :foto_perfil";
        $data += ["foto_perfil" => $url_imagen];
    }
    if ($url_banner != null) {
        $update = $update . ", imagen_banner = :imagen_banner";
        $data += ["imagen_banner" => $url_banner];
    }

    $stmt = $db->prepare($update . $where);
    $stmt->execute($data);
    //print_r($db->errorInfo());
    return $stmt->rowCount();
}

function validateAndUploadImage($url, $idUsuario, $queImagen, $siFotoOBanner, $extra = "")
{
    $destination = $url . $idUsuario . $siFotoOBanner . $extra . ".png";

    // borrar la existente
    if (file_exists($destination)) {
        unlink($destination);
    }

    //Hemos recibido el fichero TODO cambiar como se muestran los errores
    //Comprobamos que es un fichero subido por PHP, y no hay inyección por otros medios
    if (!is_uploaded_file($_FILES[$queImagen]['tmp_name'])) {

        echo ' <p class="formError"><svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z\\"></path></svg>Error: El fichero encontrado no fue procesado por la subida correctamente</p>';
        exit;
    }
    $source = $_FILES[$queImagen]['tmp_name'];

    if (is_file($destination)) {
        echo ' <p class="formError"><svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z\\"></path></svg>Error: Ya existe almacenado un fichero con ese nombre</p>';
        @unlink(ini_get('upload_tmp_dir') . $_FILES[$queImagen]['tmp_name']);
        exit;
    }

    if (!@move_uploaded_file($source, $destination)) {
        echo ' <p class="formError"><svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z\\"></path></svg>Error: No se ha podido mover el fichero enviado a la carpeta de destino</p>';
        echo "<br>  $destination";
        @unlink(ini_get('upload_tmp_dir') . $_FILES[$queImagen]['tmp_name']);
        exit;
    }
    //  echo "Fichero subido correctamente a: " . $destination;
    //  echo " <br> Ultimo echo " . file_get_contents($_FILES["userfile"]["tmp_name"]);
    return $destination;
}
