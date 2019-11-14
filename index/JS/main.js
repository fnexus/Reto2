function logged(){
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

function showAd(){
    let contenedorFormulario = $('#contenedor-formulario');
    $("#search_categoria option").bind("click", function() {
        let hol=$(this).attr('value');
        let formContent ="action=getlink&link="+hol;
        contenedorFormulario.load('myserv.php',formContent)
    });

}





