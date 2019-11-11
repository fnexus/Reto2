<?php
function connect(){
    $host = "localhost";
    $dbname = "FNEXUS";
    $user ="fnexus";
    $pass = "fn3xu5";
    try{
        $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

        return $dbh;
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
}
function close(){
    $dbh = null;
}

