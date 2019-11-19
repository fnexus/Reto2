<form action="vista_perfil.php?persona_id=<?=$_SESSION['userId']?>" method="post" id="publicateAd" class="modal">
    <div>
        <input type="file" name="adImg" id="adImg" class="fileInputs">
        <label for="adImg">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
            <span>Selecciona una imagen</span>
        </label>
    </div>

    <div>
        <label for="adTitle" class="inp">
            <input type="text" name="adTitle" id="adTitle" class="input" placeholder="&nbsp;" required>
            <span class="label">Añadir titulo</span>
            <span class="border"></span>
        </label>
    </div>
    <div>
        <label for="adDescription" class="inp">
            <input type="text" name="adDescription" id="adDescription" class="input" placeholder="&nbsp;" required>
            <span class="label">Añadir descripcion</span>
            <span class="border"></span>
        </label>
    </div>
    <div>
        <label for="companyName" class="inp">
            <input type="text" name="companyName" id="companyName" class="input" placeholder="&nbsp;" required>
            <span class="label">Añadir Nombre de compañia</span>
            <span class="border"></span>
        </label>
    </div>
    <div id="cont_guardar">
        <select name="tags" id="tags">
            <option value="">Selecciona la categoria</option>
            <?= add_categorias_bar("option") ?>
        </select>
        <button id="insertAd">Guardar</button>
    </div>
</form>