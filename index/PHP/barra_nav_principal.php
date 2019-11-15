<nav id="nav_container">
    <a href="index.php" id="logo_container">
        <img id="logo">
        <span>FNEXUS</span>
    </a>

    <form id="search_container" action="index.php">
        <label>Titulo<input type="text" name="search_titulo" id="search_titulo"> </label>
        <label>Categoria<select name="search_categoria" id="search_categoria">
                <option value="">Selecciona</option>
                <?= add_categorias_bar("option") ?>
            </select></label>
        <button type="submit" id="search_button">Buscar</button>
    </form>
    <input type="button" name="signIn" id="signIn" value="Registrarse" onclick="signIn()">
    <input type="button" name="logIn" id="logIn" value="Iniciar Sesion" onclick="logIn()">

    <a href="vista_perfil.php?persona_id=<?= $_SESSION['userId'] ?>" id="profile" style="display: none">Mi perfil</a>


    <form>
    <input type="submit" name="action" id="logOut" value="Cerrar_Sesion" style="display: none">
    </form>
    <input type="button" name="logged" id="logged" value="<?= $_SESSION["logged"] ?>" style="display: none">

    <div id="contenedor-formulario">
    </div>
</nav>

