<?php

function getImage($db, $id)
{
    $stmt = $db->prepare("SELECT imagen FROM ANUNCIO WHERE id = :id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam (":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch();
    return $row['imagen'];
}

function getAdvertisementData($db, $idAnuncio)
{
    $stmt = $db->prepare("SELECT * FROM ANUNCIO WHERE id = :id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam (":id", $idAnuncio, PDO::PARAM_INT);
    $stmt->execute();

    // En este caso $resultado será un array asociativo con todos los datos de la base de datos
    $resultado = $stmt->fetchAll();
    return $resultado;
}

function getUserData($db, $idPersona)
{
    $stmt = $db->prepare("SELECT * FROM PERSONA WHERE id = :id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam (":id", $idPersona, PDO::PARAM_INT);
    $stmt->execute();

    $resultado = $stmt->fetchAll();
    print_r($resultado);

    return $resultado;
}


function connect($host, $dbname, $user, $pass)
{
    try {
        # MySQL
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        return $db;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function close()
{
    /**
     * Una conexión a base de datos con PDO
     * permanecerá abierta mientras exista
     * el objeto PDO creado
     * */
    $db = null;
}


if(isset($_GET['id_anuncio'])){
    $idAnuncio = $_GET['id_anuncio'];
    //$db = connect('127.0.0.1', 'FNEXUS', 'fnexus', 'fn3xu5');
    $db = connection();
    //closeConnection($db);
    /*
    $userName = "fnexus";
    $database = "FNEXUS";
    $password = "fn3xu5";*/
}

?>

<?php require 'head.php'; ?>
<div id="adv-container">
    <?php
    $image = getImage($db, $idAnuncio);
    echo '<img src="'.$image.'">';
    ?>
</div>
<div id="navbar-right-container">
    <?php
    $arrayAssocAnuncio = getAdvertisementData($db, $idAnuncio);
    $arrayAssocUser = getUserData($db, $arrayAssocAnuncio[0]['persona_id']);
    ?>
</div>
<?php require 'footer.php'; ?>



