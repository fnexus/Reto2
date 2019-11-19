<nav id="nav_container">
    <!-- Contenedor con el logo y/o nombre -->
    <a href="index.php" id="logo_container">
        <img id="logo" src="../img/favicon2.png">
        <span>FNEXUS</span>
    </a>

    <!-- Contenedor con el buscador por titulo y/o categoria -->
    <form id="search_container" action="index.php">
        <select name="search_categoria" id="search_categoria">
            <option class="option" value="">Categoria</option>
            <?php add_categorias_bar("option") ?>
        </select>
        <input type="text" name="search_titulo" id="search_titulo" placeholder='Inserte un "Titulo" de anuncio'>
        <button type="submit" id="search_button"><i class="fa fa-search"></i></button>
    </form>

    <div id="sesion_container">
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
    </div>
    <!-- Contenedor de los formularios de registrarse e iniciar sesion -->
    <div class="contenedor-formulario">
        <?php include 'loginForm.html'; ?>
        <?php include 'registerForm.html'; ?>
    </div>
</nav>

