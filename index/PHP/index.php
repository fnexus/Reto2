<?php require 'head.php';?>
<nav>
    <img src="logo.png">
    <input type="text" name="search" id="search">
    <input type="button" name="signIn" id="signIn" value="Registrarse" onclick="SignIn()">
    <input type="button" name="logIn" id="logIn" value="Iniciar Sesion" onclick="LogIn()">
</nav>
<?php
    if(isset($_GET["action"])) {
        $action = $_GET["action"];
    }
    switch($action){
        case "Registrarse":
            insertUser();
        break;
        case "Iniciar Sesion":
            loginUser();
            break;
    }

function insertUser(){
    $dbh = connect();

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
            $stmt->execute();
        }
    }
    close();

}
function loginUser(){
    $dbh = connect();
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
            echo $row->nickname . $row->password . $row->nombre;
            $_userNickname["nickname"] = $row->nickname;
            $_userName["name"] = $row->nombre;
            $_userSurname["surname"] = $row->apellidos;
            $_userEmail["email"] = $row->email;
            $_userPage["contactPage"] = $row->pagina_contacto;
        }
    }
    close();
}
?>
<div id="contenedor-formulario"></div>
<article id="tags">

</article>
<main id="ads">

</main>
<?php require 'footer.php';?>