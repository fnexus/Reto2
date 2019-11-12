<?php
if(isset($GET_['id_anuncio'])){

}

$dbh = connect('127.0.0.1', 'FNEXUS', 'root', '');



function getImage($dbh, $id)
{
    //$data = ['id' => $id];
    $stmt = $dbh->prepare("SELECT imagen FROM ANUNCIO WHERE id = :id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam (":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch();
    echo '<img src="'.$row['imagen'].'">';
    
}

function getAdvertisementData($dbh, $idAnuncio)
{
    //$data = ['id' => $id];
    $stmt = $dbh->prepare("SELECT * FROM ANUNCIO WHERE id = :id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam (":id", $idAnuncio, PDO::PARAM_INT);
    $stmt->execute();

    $arrayAssocAnuncio = [];


    while($row = $stmt->fetch()){
        array_push($arrayAssocAnuncio, $row['id'], $row['persona_id'], $row['categoria_id'], $row['titulo'], $row['descripcion'], $row['datos_contacto'], $row['imagen'], $row['nombre_empresa'], $row['fecha_creacion']);
    };

    return $arrayAssocAnuncio;
}

function getUserData($dbh, $idPersona)
{
    //$data = ['id' => $id];
    $stmt = $dbh->prepare("SELECT * FROM PERSONA WHERE id_persona = :id");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam (":id", $idPersona, PDO::PARAM_INT);
    $stmt->execute();

}


function connect($host, $dbname, $user, $pass)
{
    try {
        # MySQL
        $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        return $dbh;
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
    $dbh = null;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div id="adv-container">
        <?php getImage($dbh, 1);?>
    </div>
    <div id="navbar-right-container">
        <?php
        getAdvertisementData($dbh, 1);
        getUserData($dbh, ?);
        ?>
    </div>
</body>
</html>

<?php
close();

