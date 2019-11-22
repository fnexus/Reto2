$(document).ready(function () {

    let boton = $('#dar_quitar_like');
    let conteo = $('#likes_count');
    let id_anuncio = $('#vista_anuncio_id_anuncio').val();
    let persona_id = $('#vista_anuncio_persona_id').val();
    let urlBasica = "../PHP/acceso_a_datos/funciones_like_JS.php";
    let status = document.getElementById("logged").value;

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
        if (ifLike > "0") {

            boton.prop("disabled", false);
            //boton.text("Quitar Like");
            // quitarle el like
            if (boton.val() == "1") {
                // quitar like
                dissLike();
                //boton.text("Dar Like");
            }
        } else if (ifLike == "0") {
            boton.prop("disabled", false);
            //boton.text("Dar Like");
            // sumarle like
            if (boton.val() == "1") {
                //dar like
                like();
                //boton.text("Quitar Like");
            }
        } else {
            boton.on('click', function () {
                alert(status)
                if(status==""){
                    alert("Debes iniciar sesion antes");

                    /*let p = document.createElement('p');
                    p.setAttribute('class','formError');
                    let svg = document.createElement('svg');
                    svg.setAttribute('aria-hidden','true');
                    svg.setAttribute('class','stUf5b qpSchb');
                    svg.setAttribute('fill','currentColor');
                    svg.setAttribute('focusable','false');
                    svg.setAttribute('width','16px');
                    svg.setAttribute('height','16px');
                    svg.setAttribute('viewBox','0 0 24 24');
                    svg.setAttribute('xmlns','https://www.w3.org/2000/svg');
                    let path = document.createElement('path');
                    path.setAttribute('d','M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z');
                    svg.appendChild(path);
                    p.appendChild(svg);
                    let texto = document.createTextNode("Debes iniciar sesion antes");
                    p.appendChild(texto);
                    alert(p);
                    document.body.appendChild(p);*/
                }
                    });
            boton.text();
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
                conteo.text(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                conteo.text(xhr.status + " - error");
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