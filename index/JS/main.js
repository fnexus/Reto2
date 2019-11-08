window.onload = function(){

    let inicioSesion = $('#logIn');
    inicioSesion.on('click', LogIn());
    let registro = $('#signIn');
    registro.on('click', SignIn());


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

    }
}

