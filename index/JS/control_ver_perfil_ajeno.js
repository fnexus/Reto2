window.onload = function () {

    $(document).ready(function () {
        $('.editar_perfil').css('display', 'none');
        $('.anyadir_add').css('display', 'none');

        // apaño porque no carga misteriosamente el main.js, pero si lo carga.
        let status = document.getElementById("logged").value;
        console.log("control-editar_perfil");

        if (status == "true") {
            $('#signIn-button').css('display', 'none');
            $('#logIn-button').css('display', 'none');

            $('#profile').css('display', 'inline-block');
            $('#logOut').css('display', 'inline-block');
        }
    });
};