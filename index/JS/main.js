window.onload = function () {

    $('#navbar-cross').on('click', function () {
        $('.error-container').remove();
    });

    let status = document.getElementById("logged").value;

    if (status == "true") {
        $('#signIn-button').css('display', 'none');
        $('#logIn-button').css('display', 'none');

        $('#profile').css('display', 'inline-block');
        $('#logOut').css('display', 'inline-block');
    }

    $('.efectoFade').on('click', function (event) {
        $(this).modal({
            fadeDuration: 400,
            fadeDelay: 0
        });
        return false;
    });
    let deploymenu_event =  document.getElementById("deploymenu_event");
    let deploymenu = document.getElementById("deploymenu");


        deploymenu.addEventListener("click", function () {
            // mostrar barra buscadora
            if(deploymenu_event.value=="cerrado"){
                deploymenu_event.value="abierto";

                deploymenu.style.transform="rotate(90deg)";
                deploymenu.style.paddingLeft="3%"

                let contbuscar=document.getElementById("search_container");
                let navcont=document.getElementById("nav_container");
                let tagscont=document.getElementById("tags_container")


                contbuscar.style.display="flex";
                navcont.style.gridTemplateRows="37% 63%";
                navcont.style.height="160px";
            }
            else{
                // ocultar barra buscadora
                deploymenu.style.transform="rotate(0deg)";
                deploymenu.style.paddingLeft="0%"

                let contbuscar=document.getElementById("search_container");
                let navcont=document.getElementById("nav_container");
                let tagscont=document.getElementById("tags_container")


                contbuscar.style.display="none";
                navcont.style.gridTemplateRows="100% 0";
                navcont.style.height="60px";

                deploymenu_event.value="cerrado";
            }
        });
    //No lee correctamente los eventos en las lineas de codigo posteriores a este error
    let idAnuncio =  document.getElementById("anuncio_comentario_id_anuncio").value;
    let urlBasica = "../PHP/actions.php";

    let detallesAnuncio=document.getElementById("anuncio-details-container");
    let deleteButton = document.createElement("button");
    let textnode = document.createTextNode("Borrar esta publicacion");
    deleteButton.appendChild(textnode);
    detallesAnuncio.appendChild(deleteButton);

    let user_nickname= document.getElementById("anuncio_comentario_user_nickname").value;
    let publisher_nickname = document.getElementById("anuncio_comentario_publisher_nickname").value;

    if(user_nickname==publisher_nickname){
        deleteButton.style.display="block";
    }
    else{
        deleteButton.style.display="none";
    }

    deleteButton.addEventListener("click", function () {
        // borrar este anuncio
        let confirmacion =confirm("¿Estas seguro de que quieres eliminar este anuncio?")

        if(confirmacion==true){
        $.ajax({

            url: urlBasica + "?id_anuncio=" + idAnuncio + "&action=Borrar",
            type: "GET",
            async: true,
            success: function (result) {
                console.log("borrar " + result);

            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(thrownError);
            }
        });
        location.href ="http://localhost:8765/index/PHP/index.php";
        }
    });
};



