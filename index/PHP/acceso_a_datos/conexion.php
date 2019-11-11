<?php

/**
 * @return PDO La conexion hecha con la base de datos
 */
function connection()
{
    $serverName = "mysql:host=127.0.0.1";
    $userName = "fnexus";
    $database = "FNEXUS";
    $password = "fn3xu5";

    // Crea una nueva conexion a MySQL usando PDO
    try {
        $dbh = new PDO(
            "$serverName;dbname=$database",
            $userName, $password,
            // poner en charset UTF-8 lo que venga de la BBDD
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );

        // Comprobar conexión
        if ($dbh->connect_error) {
            die("Connection failed: " . $dbh->connect_error);
        } else {
            return $dbh;
        }
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}

function closeConnection($connection)
{
    $connection = null;
}