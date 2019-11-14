window.onload = function() {

    function logged(){
        let status = document.getElementById("logged").value;
        if(status=="true"){
            console.log("escondo los botones porque me logeo");
            document.getElementById("signIn").style.display="none";
            document.getElementById("logIn").style.display="none";

            document.getElementById("profile").style.display="inline-block";
            document.getElementById("logOut").style.display="inline-block";
        }
        else{

            document.getElementById("signIn").style.display="inline-block";
            document.getElementById("logIn").style.display="inline-block";

            document.getElementById("profile").style.display="none";
            document.getElementById("logOut").style.display="none";
        }
    }

    function signIn(){
        /*$.ajax({
            url: "../PHP/registerForm.html",
            type:'GET',
            dataType: 'html',
            success: function(data){
                console.log(typeof data)
                div.appendChild(data);
            }
        });*/
        let contenedorFormulario = $('#contenedor-formulario');
        contenedorFormulario.load("../PHP/registerForm.html");

    }

    function logIn(){
        let contenedorFormulario = $('#contenedor-formulario');
        contenedorFormulario.load("../PHP/loginForm.html");

    }

    $('#button-edit-perfil').on('click', function () {
        $('#edit-user-form').css('display', 'block');
    });

};
