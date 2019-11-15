<form action="vista_perfil.php?persona_id=<?=$_SESSION['userId']?>" method="post" id="publicateAd" style="display: none">
    <div>
        <div>
            <input type="button"><input type="text" name="adImg" id="adImg" placeholder="Añade aqui el enlace de la imagen"><input type="button">
        </div>
    </div>
    <p><input type="text" name="adTitle" id="adTitle" placeholder="Titulo del anuncio"></p>
    <p><input type="text" name="adDescription" id="adDescription"placeholder="Descripcion del anuncio"></p>
    <p><input type="text" name="companyName" id="companyName" placeholder="Nombre de la compañia"></p>
    <p>
        <label>
            Categoria<select name="tags" id="tags">
                <option value="">Selecciona</option>
                <?= add_categorias_bar("option") ?>
            </select>
        </label>
        <button id="insertAd">Guardar</button>
    </p>
</form>