<nav id="nav_container">
    <a href="index.php" id="logo_container">
        <img id="logo" src="../img/favicon2.png">
        <span>FNEXUS</span>
    </a>

    <form id="search_container" action="index.php">
        <label>Titulo<input type="text" name="search_titulo" id="search_titulo"> </label>
        <label>Categoria<select name="search_categoria" id="search_categoria">
                <option value="">Selecciona</option>
                <?php add_categorias_bar("option") ?>
            </select></label>
        <button type="submit" id="search_button">Buscar</button>
    </form>
    <!--Este input manda el valor de la sesion -->
    <input type="button" name="logged" id="logged" value="<?= $_SESSION["logged"] ?>">

    <!--Botones iniciales-->
    <a href="#loginForm" id="logIn-button" class="efectoFade" rel="modal:open">Iniciar Sesion</a>
    <a href="#registerForm" id="signIn-button" class="efectoFade" rel="modal:open">Registrarse</a>

    <!--Botones cuando estas logeado-->
    <a href="vista_perfil.php?persona_id=<?= $_SESSION['userId'] ?>" id="profile">Mi perfil</a>
    <!-- cuando pulsamos en cerrar sesion queremos que se recargue la pagina por lo que metemos el boton en un form. El action default del form es la pagina actual -->
    <form>
        <input type="submit" name="action" id="logOut" value="Cerrar Sesion">
    </form>


    <div class="contenedor-formulario">
        <?php include 'loginForm.html'; ?>
        <?php include 'registerForm.html'; ?>
    </div>
</nav>

