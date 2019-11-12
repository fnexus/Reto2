<nav id="nav_container">
    <img src="../img/FNEXUS-logo.jpg" id="logo">
    <form id="search_container">
        <label>Titulo<input type="text" name="search_titulo" id="search_titulo"> </label>
        <label>Categoria<select name="search_categoria" id="search_categoria">
                <option value="">Selecciona</option>
                <?= add_categorias_bar("option") ?>
            </select></label>
        <button type="submit" id="search_button">Buscar</button>
    </form>
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
?>
