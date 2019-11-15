let divExist =false;


function signIn(){
    let contenedorFormulario = $('#contenedor-formulario');
    contenedorFormulario.load("../PHP/registerForm.html");

    if(divExist==false){
        let div = document.createElement("div");
        div.setAttribute("id","bodyOnForms")
        document.body.appendChild(div);
        divExist=true;
    }
}

function logIn() {
    let contenedorFormulario = $('#contenedor-formulario');
    contenedorFormulario.load("../PHP/loginForm.html");

    if(divExist==false){
        let div = document.createElement("div");
        div.setAttribute("id","bodyOnForms")
        document.body.appendChild(div);
        divExist=true;
    }
}

window.onload = function() {

    let status = document.getElementById("logged").value;
    if(status=="true"){
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


    $('#button-edit-perfil').on('click', function () {
        $('#edit-user-form').css('display', 'block');
    });


    $('#showAd').on('click', function () {
        $('#publicateAd').css('display', 'block');
    });

};

