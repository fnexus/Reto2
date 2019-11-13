    function SignIn(){
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

    function LogIn(){
        let contenedorFormulario = $('#contenedor-formulario');
        contenedorFormulario.load("../PHP/loginForm.html");
    }

    function Logged(){
        document.getElementById("signIn").style.display="none";
        document.getElementById("logIn").style.display="none";
        document.getElementById("logout").style.display="inline-block";
        document.getElementById("profile").style.display="inline-block";
    }

