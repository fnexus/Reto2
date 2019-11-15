let divExist =false;

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
        document.getElementById("logOut").style.display="none";;
    }
  
    function closeForm(){
        let contenedorFormulario = document.getElementsByClassName("contenedor-formulario")
        let form=contenedorFormulario[0].firstChild;
        console.log(form);
        contenedorFormulario[0].removeChild(form);
        let div = document.getElementById("bodyOnForms");
        document.body.removeChild(div);
        divExist = false;
    }


    $('#button-edit-perfil').on('click', function () {
        $('#edit-user-form').css('display', 'block');
    });


    $('#showAd').on('click', function () {
        $('#publicateAd').css('display', 'block');
    });

    $('#signIn').on('click', function () {
        let contenedorFormulario = $('.contenedor-formulario');
        contenedorFormulario.load("../PHP/registerForm.html");

        if(divExist==false) {
            let div = document.createElement("div");
            div.setAttribute("id", "bodyOnForms")
            document.body.appendChild(div);
            divExist = true;
        }
    });

    $('#logIn').on('click', function () {
        let contenedorFormulario = $('.contenedor-formulario');
        contenedorFormulario.load("../PHP/loginForm.html");

        if(divExist==false){
            let div = document.createElement("div");
            div.setAttribute("id","bodyOnForms")
            document.body.appendChild(div);
            divExist=true;
        }
    });

};

