$(document).ready(function () {
    //variables
    let contenedorComentarios = $('#anuncio_lista_comentarios');
    let comentarioTextArea = $('#anuncio_comentario_text_area');
    let comentarioIdAnuncio = $('#anuncio_comentario_id_anuncio');
    let comentarioIdUser = $('#anuncio_comentario_id_user');
    let comentarioBoton = $('#anuncio_comentario_boton_enviar');

    //valores
    let id_anuncio = $('#vista_anuncio_id_anuncio').val();
    let persona_id = $('#vista_anuncio_persona_id').val();

    let urlBasica = "../PHP/acceso_a_datos/funciones_comentarios_JS.php";

    // listener de click del boton añadir comentario
    comentarioBoton.bind("click", function () {
        if(comentarioTextArea.val()){
            insertarComentario();
            mostrarComentariosDelAnuncio();
        }
        comentarioTextArea.val("");
    });

    // al abrir ejecutar esto por primera vez
    mostrarComentariosDelAnuncio();
    if (persona_id == "") {
        comentarioTextArea.prop("disabled", true);
        comentarioBoton.prop("disabled", true);
    }

    /**
     *
     */
    function mostrarComentariosDelAnuncio() {
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
        crearYAnyadirComentarios(JSON.parse(objetoJSON));
    }

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
     */
    function crearYAnyadirComentarios(objetoJSON) {
        let div = document.createElement("div");
        // borrar anteriores comentarios y refrescarlos

        contenedorComentarios.empty();

        for (let i = 0; i < objetoJSON.length; i++) {
            // nickname
            let nombre = document.createElement("h4");
            let nombre2 = document.createTextNode(objetoJSON[i]['nickname']);
            nombre.appendChild(nombre2);
            div.appendChild(nombre);
            //descripcion
            let desc = document.createElement("p");
            let desc2 = document.createTextNode(objetoJSON[i]['descripcion']);
            desc.appendChild(desc2);
            div.appendChild(desc);
            //fecha creacion
            let f = document.createElement("p");
            let f2 = document.createTextNode(objetoJSON[i]['fecha_creacion']);
            f.appendChild(f2);
            div.appendChild(f);
        }
        contenedorComentarios.append(div);
    }
});