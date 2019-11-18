$(document).ready(function () {
    //variables
    let contenedorComentarios = $('#anuncio_lista_comentarios');
    let comentarioTextArea = $('#anuncio_comentario_text_area');
    let comentarioBoton = $('#anuncio_comentario_boton_enviar');

    //valores
    let id_anuncio = $('#vista_anuncio_id_anuncio').val();
    let persona_id = $('#vista_anuncio_persona_id').val();

    let urlBasica = "../PHP/acceso_a_datos/funciones_comentarios_JS.php";

    // listener de click del boton añadir comentario
    comentarioBoton.bind("click", function () {
        if (comentarioTextArea.val()) {
            insertarComentario();
            mostrarComentariosDelAnuncio(persona_id);
        }
        comentarioTextArea.val("");
    });

    // al abrir ejecutar esto por primera vez
    mostrarComentariosDelAnuncio(persona_id);
    if (persona_id == "") {
        comentarioTextArea.prop("disabled", true);
        comentarioBoton.prop("disabled", true);
    }

    /**
     *
     * @param idPersonaSesion
     */
    function mostrarComentariosDelAnuncio(idPersonaSesion) {
        var objetoJSON = null;
        $.ajax({
            // llamar al php con un id anuncio y me devuelva el count de likes de ese anuncio
            url: urlBasica + "?id_anuncio=" + id_anuncio + "&modo=comentarios",
            type: "GET",
            async: false,
            success: function (result) {
                objetoJSON = result;
            },
            error: function (xhr, ajaxOptions, thrownError) {
            }
        });
        // le paso el json y crea los bloques comentarios y los añade a la lista o contenedor para que se vean
        crearYAnyadirComentarios(JSON.parse(objetoJSON), idPersonaSesion);
    }

    /**
     *
     */
    function insertarComentario() {
        $.ajax({
            // llamar al php con un id anuncio y me devuelva el count de likes de ese anuncio
            url: urlBasica + "?id_anuncio=" + id_anuncio + "&modo=insertar_comentario" + "&comentario=" + comentarioTextArea.val() + "&persona_id=" + persona_id,
            type: "GET",
            async: false,
            success: function (result) {
                console.log(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(thrownError);
            }
        });
    }

    /**
     *
     * @param objetoJSON
     * @param idPersonaSesion
     */
    function crearYAnyadirComentarios(objetoJSON, idPersonaSesion) {
        let div = document.createElement("div");

        // borrar anteriores comentarios y refrescarlos
        contenedorComentarios.empty();

        for (let i = 0; i < objetoJSON.length; i++) {
            // nickname
            div.appendChild(addComment("h4", objetoJSON[i]['nickname']));

            // descripcion
            div.appendChild(addComment("p", objetoJSON[i]['descripcion']));

            // fecha creacion
            div.appendChild(addComment("p", objetoJSON[i]['fecha_creacion']));

            // boton borrar anuncio si es el dueño del comentario
            if (idPersonaSesion == objetoJSON[i]['persona_id']) {
                div.appendChild(deleteComentarioButton(objetoJSON[i]['id']), idPersonaSesion);
            }
        }
        contenedorComentarios.append(div);
    }

    /**
     *
     * @param tagName
     * @param textNode
     * @returns {any} element
     */
    function addComment(tagName, textNode) {
        let element = document.createElement(tagName);
        let textnode = document.createTextNode(textNode);
        element.appendChild(textnode);
        return element;
    }

    function deleteComentarioButton(idComentario, idPersonaSesion) {
        let element = document.createElement("button");
        let textnode = document.createTextNode("X - eliminar mi comentario");
        element.appendChild(textnode);
        element.addEventListener("click", function () {
            // borrar este comentario
            $.ajax({
                url: urlBasica + "?modo=borrar_comentario" + "&id_comentario=" + idComentario,
                type: "GET",
                async: false,
                success: function (result) {
                    console.log("borrar " + result);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(thrownError);
                }
            });
            // una vez borrado, volver a cargar los comentarios actualizados
            mostrarComentariosDelAnuncio(persona_id);
        });
        return element;
    }
});