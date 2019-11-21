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
                deploymenu_event.value="abierto";
            if(deploymenu_event.value=="cerrado"){

                deploymenu.style.transform="rotate(90deg)";
                deploymenu.style.paddingLeft="3%"

                let contbuscar=document.getElementById("search_container");
                let navcont=document.getElementById("nav_container");
                let tagscont=document.getElementById("tags_container")


                contbuscar.style.display="flex";
                navcont.style.height="160px";
                navcont.style.gridTemplateRows="37% 63%";
                tagscont.style.marginTop="50px";
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
                tagscont.style.marginTop="-10%";

                deploymenu_event.value="cerrado";
            }
        });
};



