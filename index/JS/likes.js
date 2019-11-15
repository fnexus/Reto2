$(document).ready(function () {

    let boton = $('#dar_quitar_like');
    let conteo = $('#likes_count');
    let id_anuncio = $('#vista_anuncio_id_anuncio').val();
    let persona_id = $('#vista_anuncio_persona_id').val();
    let urlBasica = "../PHP/acceso_a_datos/funciones_like_JS.php";

    // listener de click del boton de dar o quitar like
    boton.bind("click", function () {
        boton.val("1");
        verBotonLikes();
        mostrarLikes();
    });

    // al abrir ejecutar esto por primera vez
    verBotonLikes();
    mostrarLikes();

    /**
     *
     */
    function verBotonLikes() {
        var ifLike = comprobarSiHeHechoLike();
        if (ifLike > 0) {
            boton.prop("disabled", false);
            boton.text("Quitar Like");
            // quitarle el like
            if (boton.val() == "1") {
                // quitar like
                dissLike();
                boton.text("Dar Like");
            }
        } else if (ifLike == 0) {
            boton.prop("disabled", false);
            boton.text("Dar Like");
            // sumarle like
            if (boton.val() == "1") {
                //dar like
                like();
                boton.text("Quitar Like");
            }
        } else {
            boton.text("Dar Like");
            boton.prop("disabled", true);
        }
    }

    /**
     *
     */
    function like() {
        $.ajax({
            // llamar al php con un id anuncio y me devuelva el count de likes de ese anuncio
            url: urlBasica + "?id_anuncio=" + id_anuncio + "&persona_id=" + persona_id + "&modo=dar",
            type: "GET",
            async: false
        });
    }

    /**
     *
     */
    function dissLike() {
        $.ajax({
            // llamar al php con un id anuncio y me devuelva el count de likes de ese anuncio
            url: urlBasica + "?id_anuncio=" + id_anuncio + "&persona_id=" + persona_id + "&modo=quitar",
            type: "GET",
            async: false
        });
    }

    /**
     *
     */
    function mostrarLikes() {
        $.ajax({
            // llamar al php con un id anuncio y me devuelva el count de likes de ese anuncio
            url: urlBasica + "?id_anuncio=" + id_anuncio + "&modo=anuncio",
            type: "GET",
            async: false,
            success: function (result) {
                conteo.text("❤️" + " " + result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                conteo.text("❤️" + xhr.status + " - error");
            }
        });
    }

    /**
     *
     * @returns {number}
     */
    function comprobarSiHeHechoLike() {
        let variable = -1;
        $.ajax({
            // llamar al php con un id anuncio y me devuelva el count de likes de ese anuncio
            url: urlBasica + "?id_anuncio=" + id_anuncio + "&persona_id=" + persona_id + "&modo=persona",
            type: "GET",
            async: false,
            success: function (result) {
                variable = result;
            }
        });
        return variable;
    }
});