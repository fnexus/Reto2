<form action="vista_perfil.php?persona_id=<?=$_SESSION['userId']?>" method="post" id="publicateAd" class="modal">
    <div>
        <label for="adImg">Añadir imagen</label>
        <input type="file" name="adImg" id="adImg">
    </div>

    <div>
        <label for="adTitle">Titulo</label>
        <input type="text" name="adTitle" id="adTitle">
    </div>
    <div>
        <label for="adDescription">Descripción</label>
        <input type="text" name="adDescription" id="adDescription">
    </div>
    <div>
        <label for="companyName">Nombre de la empresa</label>
        <input type="text" name="companyName" id="companyName">
    </div>
    <div>
        <label for="tags">Categoria</label>
        <select name="tags" id="tags">
            <option value="">Selecciona</option>
            <?= add_categorias_bar("option") ?>
        </select>
    </div>
    <div>
        <button id="insertAd">Guardar</button>
    </div>
</form>